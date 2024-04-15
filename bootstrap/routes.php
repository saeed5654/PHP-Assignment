<?php

use FastRoute\RouteCollector;

return function(RouteCollector $router) {
    // Define routes
    $router->addRoute('POST', '/api/post', ['controller\PostController', 'createPostAction']);
    $router->addRoute('GET', '/api/post/{id}', ['controller\PostController', 'getPostAction']);
    // Add more routes as needed
};