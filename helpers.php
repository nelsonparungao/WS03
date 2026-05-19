<?php
    function basePath(string $path): string {
        return BASE_PATH . '/' . $path;
    }

    function loadPartial($name, $data = []) {
    // Try both App and app folders
    $partialPath = basePath('App/Views/Partials/' . $name . '.php');
    if (!file_exists($partialPath)) {
        $partialPath = basePath('app/Views/Partials/' . $name . '.php');
    }
    if (file_exists($partialPath)) {
        extract($data);
        require $partialPath;
    } else {
        die("Partial not found: " . $name . " at " . $partialPath);
    }
}

function loadView($name, $data = []) {
    // Try both App and app folders
    $viewPath = basePath('App/Views/' . $name . '.view.php');
    if (!file_exists($viewPath)) {
        $viewPath = basePath('app/Views/' . $name . '.view.php');
    }
    if (file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        die("View not found: " . $name . " at " . $viewPath);
    }
}

    function inspect($value) {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
    }

    function inspectAndDie($value) {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
        die();
    }

    function formatSalary($salary) {
        return '$' . number_format((float)$salary, 2, '.', ',');
    }

    function sanitize($dirty) {
        return filter_var(trim($dirty), FILTER_SANITIZE_SPECIAL_CHARS);
    }

    function redirect($url) {
    // If it's a full URL or starts with http, redirect directly
    if (strpos($url, 'http') === 0) {
        header("Location: {$url}");
    } else {
        // Make sure it starts with /WS03/
        if (strpos($url, '/WS03/') !== 0) {
            $url = '/WS03/' . ltrim($url, '/');
        }
        header("Location: {$url}");
    }
    exit();
}

        // helpers.php - add these functions

    function baseUrl($path = '') {
        // Remove leading slash if present
        $path = ltrim($path, '/');
        return '/WS03/' . $path;
    }

    function url($path = '') {
        return baseUrl($path);
    }
?>