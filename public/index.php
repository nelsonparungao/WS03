<?php

require '../helpers.php';
require basePath('Router.php');
require basePath('Database.php');

//$config = require basePath('config/db.php');

//$db = new Database($config);

$router = new Router();
$routes = require basePath('routes.php'); 
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Remove /Project/public from the URI
$basePath = '/Project/public';
if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}

// If URI is empty, set to /
if (empty($uri) || $uri === false) {
    $uri = '/';
}

// Route the request
$router->route($uri, $method);
?>