<?php

use DI\Container;
use repository\MovieRepository;
use repository\PostRepository;

// Include all PHP files in the repository directory
foreach (glob(__DIR__ . '/../src/repository/*.php') as $filename) {
    require_once $filename;
}

// Create a new DI container instance
$app = new Container();

require __DIR__ . '/db.php';

// Define the 'repository.post' service
$app->set('repository.post', function (Container $app) {
    return new PostRepository($app->get('database'));
});

// Define the 'repository.movie' service
$app->set('repository.movie', function (Container $app) {
    return new MovieRepository($app->get('database'));
});


// Return the DI container
return $app;
