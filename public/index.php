<?php
require_once __DIR__ . '/../bootstrap.php';

use Kibalanga\Core\Route;
use Kibalanga\Core\Session;
use Kibalanga\Core\Router;

// Start the session securely
session_start();

// Sanitize global input to prevent injection attacks
$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

$router = new Router();

$router->get('/', 'WelcomeController@index');

$router->get('/user/{email}', 'UserController@show');

$router->dispatch();  // Dispatch the request to the controller
