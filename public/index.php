<?php
    //define('BASE_PATH', 
    //dirname(__DIR__));

    //require basePath('helpers.php');
    //require basePath('views/home.view.php');
    //require './views/home.view.php'; 

    //require './helpers.php';
    //loadView('home');
   

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/helpers.php';   // load helpers first
loadView('home');                     // now safe to use basePath() inside



?>