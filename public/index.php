<?php
require_once __DIR__ . '/../bootstrap.php';

use Kibalanga\Core\Route;
use Kibalanga\Core\Router;

$router = new Router();

// Define routes for registration and login
$router->get('/register', 'AuthController@showRegisterForm');
$router->post('/register', 'AuthController@register');
$router->get('/login', 'AuthController@showLoginForm');
$router->post('/login', 'AuthController@login');
$router->get('/logout', 'AuthController@logout');

$router->dispatch();  // Dispatch the request to the controller
