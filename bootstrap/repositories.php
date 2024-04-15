<?php

use DI\Container;
use repository\PostRepository;

// Include all PHP files in the repository directory
foreach (glob(__DIR__ . '/../src/repository/*.php') as $filename) {
    require_once $filename;
}

// Create a new DI container instance
$app = new Container();

// Define the 'repository.post' service
$app->set('repository.post', function (Container $app) {
    return new PostRepository($app->get('database'));
});

// Return the DI container
return $app;
