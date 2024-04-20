<?php

use FastRoute\RouteCollector;

return function(RouteCollector $router) {
    // Define routes
    $router->addRoute('POST', '/api/post', ['controller\PostController', 'createPostAction']);
    $router->addRoute('GET', '/api/post/{id}', ['controller\PostController', 'getPostAction']);
    $router->addRoute('POST', '/api/movies', ['controller\MovieController', 'createMovieAction']);
    $router->addRoute('GET', '/api/movies/{id}', ['controller\MovieController', 'getMovieAction']);
    $router->addRoute('GET', '/api/movies', ['controller\MovieController', 'getMoviesAction']);
    // Add more routes as needed
};