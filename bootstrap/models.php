<?php

use DI\Container;
use Model\MovieModel;
use Model\PostModel;
use repository\PostRepository;

// Create a new DI container instance
$app = new Container();

// Include all PHP files in the model and repository directories
foreach (glob(__DIR__ . '/../src/model/*.php') as $filename) {
    require_once $filename;
}

require __DIR__ . '/repositories.php';

// Define the 'model.post'
$app->set('model.post', function ($app) {
    return new PostModel($app->get('repository.post'));
});

$app->set('model.movie', function ($app) {
    return new MovieModel($app->get('repository.movie'));
});

// Return the DI container
return $app;
