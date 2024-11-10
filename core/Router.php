<?php
namespace Kibalanga\Core;

class Router
{
    private $routes = [];

    public function add($method, $path, $callback)
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'callback' => $callback,
        ];
    }

    public function handle($requestUri, $requestMethod)
    {
        foreach ($this->routes as $route) {
            if ($route['path'] === $requestUri && $route['method'] === $requestMethod) {
                return call_user_func($route['callback']);
            }
        }
        echo "404 Not Found";
    }
}
