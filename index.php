<?php
define('BASE_PATH', __DIR__);

// Simple autoloader - FIXED for App folder
spl_autoload_register(function ($class) {
    // Convert namespace to file path
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $class = str_replace('App/', 'App/', $class);
    
    $file = BASE_PATH . '/' . $class . '.php';
    
    if (file_exists($file)) {
        require $file;
        return true;
    }
    return false;
});

require BASE_PATH . '/helpers.php';

use Framework\Session;
Session::start();

// Get the request URI
$request = $_SERVER['REQUEST_URI'];
$request = str_replace('/WS03', '', $request);
$request = strtok($request, '?');
$request = trim($request, '/');

// SIMPLE ROUTING
if (empty($request)) {
    $controller = new App\Controllers\HomeController();
    $controller->index();
} 
elseif ($request == 'listings') {
    $controller = new App\Controllers\ListingController();
    $controller->index();
}
elseif ($request == 'listings/create') {
    $controller = new App\Controllers\ListingController();
    $controller->create();
}
elseif (preg_match('/^listings\/(\d+)$/', $request, $matches)) {
    $controller = new App\Controllers\ListingController();
    $controller->show(['id' => $matches[1]]);
}
elseif (preg_match('/^listings\/edit\/(\d+)$/', $request, $matches)) {
    $controller = new App\Controllers\ListingController();
    $controller->edit(['id' => $matches[1]]);
}
elseif ($request == 'login') {
    $controller = new App\Controllers\UserController();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $controller->authenticate();
    } else {
        $controller->login();
    }
}
elseif ($request == 'register') {
    $controller = new App\Controllers\UserController();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $controller->store();
    } else {
        $controller->create();
    }
}
elseif ($request == 'logout') {
    $controller = new App\Controllers\UserController();
    $controller->logout();
}
else {
    App\Controllers\ErrorController::notFound();
}
?>