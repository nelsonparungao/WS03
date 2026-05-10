<?php

$router->get('/', 'controllers/home.php');
$router->get('/listings', 'controllers/listings/index.php');
$router->get('/listings/create', 'controllers/listings/create.php');
// Do NOT add routes for login, register, or listing details - they will 404 naturally

?>