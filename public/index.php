<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Kibalanga\Core\Kibalanga;

$config = require __DIR__ . '/../config/config.php';
$app = new Kibalanga($config);

// Define routes
$app->router->add('/', [new \Kibalanga\App\Controllers\HomeController(), 'index']);

// Run the application
$app->run();
