<?php
namespace Kibalanga\Core;

class Router
{
    protected $routes = [];

    public function get($route, $action)
    {
        $this->routes['GET'][$route] = $action;
    }

    public function post($route, $action)
    {
        $this->routes['POST'][$route] = $action;
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (isset($this->routes[$method][$uri])) {
            $this->callAction($this->routes[$method][$uri]);
        } else {
            echo "404 Not Found";
        }
    }

    protected function callAction($action)
    {
        list($controller, $method) = explode('@', $action);
        $controller = "Kibalanga\\App\\Controllers\\$controller";
        $controller = new $controller();
        $controller->$method();
    }
}
