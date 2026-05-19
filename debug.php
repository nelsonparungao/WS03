<?php
echo "<h1>DEBUG INFO</h1>";
echo "<p>Request URI: " . $_SERVER['REQUEST_URI'] . "</p>";
echo "<p>After removing /WS03: " . str_replace('/WS03', '', $_SERVER['REQUEST_URI']) . "</p>";
echo "<p>Script name: " . $_SERVER['SCRIPT_NAME'] . "</p>";

// Test if controllers exist
echo "<h2>Controller Check:</h2>";
if (class_exists('App\\Controllers\\HomeController')) {
    echo "<p style='color:green'>✓ HomeController exists</p>";
} else {
    echo "<p style='color:red'>✗ HomeController NOT found</p>";
}

if (class_exists('App\\Controllers\\ListingController')) {
    echo "<p style='color:green'>✓ ListingController exists</p>";
} else {
    echo "<p style='color:red'>✗ ListingController NOT found</p>";
}

// Test the home controller manually
echo "<h2>Testing HomeController:</h2>";
try {
    $test = new App\Controllers\HomeController();
    echo "<p style='color:green'>✓ HomeController instantiated successfully</p>";
} catch (Exception $e) {
    echo "<p style='color:red'>Error: " . $e->getMessage() . "</p>";
}

echo "<h2>Test Links:</h2>";
echo "<ul>";
echo "<li><a href='/WS03/'>/WS03/</a></li>";
echo "<li><a href='/WS03/index.php'>/WS03/index.php</a></li>";
echo "<li><a href='/WS03/index.php/listings'>/WS03/index.php/listings</a></li>";
echo "<li><a href='/WS03/index.php/login'>/WS03/index.php/login</a></li>";
echo "</ul>";
?>