<?php
namespace Kibalanga\Core;

class Controller
{
    public function render($view, $data = [])
    {
        // Add .sam.php extension automatically
        $viewFile = __DIR__ . "/../app/Views/{$view}.sam.php";

        // Check if the view exists
        if (file_exists($viewFile)) {
            extract($data); // Extract data for use in view
            require $viewFile;
        } else {
            echo "View file not found: {$viewFile}\n";
        }
    }
}
