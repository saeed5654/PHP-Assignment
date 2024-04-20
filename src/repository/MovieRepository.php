<?php

namespace repository;

use mysqli;

class MovieRepository
{
    private $mysqli;

    public function __construct(mysqli $mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function getMovies()
    {
        $query = "SELECT * FROM movies";

        return $this->mysqli->query($query);
    }

    public function getMovie($id)
    {
        $query = "SELECT * FROM movies where id = " . $id;

        return $this->mysqli->query($query);
    }

    public function createMovie($requestBody)
    {
        $query = "INSERT INTO movies (name, release_date, director, casts, ratings) VALUES (?, ?, ?, ? ,?)";
        $statement = $this->mysqli->prepare($query);

        // Bind parameters to the prepared statement
        $statement->bind_param("sssss", $requestBody['name'], $requestBody['release_date'], $requestBody['director'], json_encode($requestBody['casts']), json_encode($requestBody['ratings']));

        // Execute the statement
        return $statement->execute();
    }
}