<?php
namespace Kibalanga\Core;

class Router
{
    protected $routes = [];

    public function add($path, $callback)
    {
        $this->routes[$path] = $callback;
    }

    public function resolve($path)
    {
        if (isset($this->routes[$path])) {
            call_user_func($this->routes[$path]);
        } else {
            echo "404 Not Found";
        }
    }
}
