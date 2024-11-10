<?php
namespace Kibalanga\Core;

class Controller
{
    public function render($view, $data = [])
    {
        extract($data);
        require __DIR__ . "/../app/Views/{$view}.php";
    }
}
