<?php

// Function to create directory if not exists
function createDirectory($path) {
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
        echo "Created directory: {$path}\n";
    } else {
        echo "Directory already exists: {$path}\n";
    }
}

// Step 1: Create necessary folders
createDirectory(__DIR__ . '/app/Controllers');
createDirectory(__DIR__ . '/app/Models');
createDirectory(__DIR__ . '/app/Views');
createDirectory(__DIR__ . '/public/css');
createDirectory(__DIR__ . '/public/js');

// Step 2: Check for config file and create if not exists
$configFile = __DIR__ . '/config/config.php';
if (!file_exists($configFile)) {
    $defaultConfig = "<?php\n\nreturn [\n    'db' => [\n        'host' => 'localhost',\n        'username' => 'root',\n        'password' => '',\n        'database' => 'kibalanga_db',\n    ],\n];";
    file_put_contents($configFile, $defaultConfig);
    echo "Created default configuration file at config/config.php\n";
} else {
    echo "Configuration file already exists.\n";
}

// Step 3: Download Bootstrap
function downloadBootstrap() {
    $cssUrl = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css";
    $jsUrl = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js";

    // CSS
    $cssContent = file_get_contents($cssUrl);
    if ($cssContent) {
        file_put_contents(__DIR__ . '/public/css/bootstrap.min.css', $cssContent);
        echo "Downloaded Bootstrap CSS to public/css/bootstrap.min.css\n";
    } else {
        echo "Failed to download Bootstrap CSS.\n";
    }

    // JS
    $jsContent = file_get_contents($jsUrl);
    if ($jsContent) {
        file_put_contents(__DIR__ . '/public/js/bootstrap.bundle.min.js', $jsContent);
        echo "Downloaded Bootstrap JS to public/js/bootstrap.bundle.min.js\n";
    } else {
        echo "Failed to download Bootstrap JS.\n";
    }
}

downloadBootstrap();

echo "\nInstallation complete! You can now start using the Kibalanga framework.\n";
