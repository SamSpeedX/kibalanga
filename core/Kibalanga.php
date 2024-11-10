<?php
namespace Kibalanga\Core;

class Kibalanga
{
    public $router;
    public $db;

    public function __construct($config)
    {
        $this->db = new Database($config['db']);
        $this->router = new Router();
    }

    public function run()
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->router->resolve($path);
    }
}
