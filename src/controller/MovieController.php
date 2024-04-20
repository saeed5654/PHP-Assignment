<?php

namespace controller;

use DI\Container;
use Model\MovieModel;

class MovieController
{
    /** @var MovieModel */
    private $movieModel;

    public function __construct(Container $container)
    {
        $this->movieModel = $container->get('model.movie');
    }

    public function getMoviesAction()
    {
        return $this->movieModel->getMovies();
    }


    public function createMovieAction()
    {
        return $this->movieModel->createMovie();
    }

    public function getMovieAction($id)
    {
        return $this->movieModel->getMovie($id);
    }
}