<?php

namespace Model;

use repository\MovieRepository;
use stdClass;

class MovieModel
{
    private $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function getMovies()
    {
        $movie = [];
        $result = $this->movieRepository->getMovies();

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $redis = new \Redis();
                $redis->set('movies', $row);
                $movie[] = $this->variableCasting($row);
            }
        }

        return $movie;
    }

    public function getMovie($id)
    {
        $movie = new StdClass();
        $result = $this->movieRepository->getMovie($id);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $movie = $this->variableCasting($row);
            }
        }

        return $movie;
    }

    public function variableCasting($row)
    {
        $row['casts'] = json_decode($row['casts']);
        $row['ratings'] = json_decode($row['ratings']);
        return $row;
    }

    public function validateParams($requestBody)
    {
        if (!isset($requestBody['name']) || !isset($requestBody['casts']) || !isset($requestBody['release_date']) || !isset($requestBody['director']) || !isset($requestBody['ratings'])) {
            return false;
        }

        return true;
    }

    public function createMovie()
    {
        $requestBody = file_get_contents("php://input");
        $requestBody = json_decode($requestBody, true);

        if (!$this->validateParams($requestBody)) {
            http_response_code(400);

            // Return JSON response with error message
            $response = [
                'error' => 'Bad Request',
                'message' => 'Missing required parameters. Please provide title, content and author value'
            ];

            // Set Content-Type header to indicate JSON response
            header('Content-Type: application/json');

            // Encode the response data into JSON format and echo it
            return $response;
        }

        /*$redis = new \Redis();

        $redis->set('movie', $requestBody);*/

        $result = $this->movieRepository->createMovie($requestBody);

        return [
            'data' => $result ? 'Movie Created Successfully' : "There was an error while creating movie"
        ];
    }
}