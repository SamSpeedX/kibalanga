<?php
require_once __DIR__ . '/vendor/autoload.php';  // Autoload Composer dependencies

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
