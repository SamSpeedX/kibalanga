<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Kibalanga\Core\Router;
use Kibalanga\App\Controllers\WelcomeController;

$router = new Router();

// Route for the home page
$router->add('GET', '/', [new WelcomeController(), 'index']);

// Handle requests
$router->handle($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
