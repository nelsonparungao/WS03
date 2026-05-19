<?php
echo "<h1>Simple Test</h1>";
echo "<p>If you see this, PHP is working.</p>";

// Try to load home view directly
$viewPath = __DIR__ . '/app/Views/home.view.php';
echo "<p>Home view path: " . $viewPath . "</p>";
echo "<p>Home view exists: " . (file_exists($viewPath) ? 'YES' : 'NO') . "</p>";

if (file_exists($viewPath)) {
    echo "<h2>Loading home view directly:</h2>";
    include $viewPath;
}
?>