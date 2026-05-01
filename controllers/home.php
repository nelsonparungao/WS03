<?php
    $config = require basePath('config/db.php');
    $db = new Database($config);
    loadView('home');

    $listings = $db->query('SELECT * FROM listings LIMIT 6')->fetchAll();
    inspect($listings);
?>