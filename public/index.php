<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Kibalanga\Core\Router;
use Kibalanga\App\Controllers\HomeController;

$router = new Router();

$router->add('GET', '/', [new HomeController(), 'index']);
$router->add('GET', '/about', [new HomeController(), 'about']);

$router->handle($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
