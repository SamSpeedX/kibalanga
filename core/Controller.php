<?php
namespace Kibalanga\Core;

class Controller
{
    public function render($view, $data = [])
    {
        $viewPath = __DIR__ . "/../app/Views/{$view}.sam.php";
        if (file_exists($viewPath)) {
            extract($data);
            require $viewPath;
        } else {
            echo "View not found!";
        }
    }
}
