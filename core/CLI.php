<?php
namespace Kibalanga\Core;

class CLI
{
    public function handle($argv)
    {
        $command = $argv[1] ?? null;
        $name = $argv[2] ?? null;

        switch ($command) {
            case 'serve':
                $this->serve();
                break;
            case 'migrate':
                $this->runMigrations();
                break;
            case 'make:model':
                $this->createModel($name);
                break;
            case 'make:controller':
                $this->createController($name);
                break;
            case 'make:view':
                $this->createView($name);
                break;
            case 'clear:cache':
                $this->clearCache();
                break;
            default:
                echo "Available commands: serve, migrate, make:model, make:controller, make:view, clear:cache\n";
        }
    }

    private function serve()
    {
        echo "Starting server on http://localhost:8000\n";
        shell_exec("php -S localhost:8000 -t public");
    }

    private function clearCache()
    {
        $cachePath = __DIR__ . '/../cache';
        array_map('unlink', glob("$cachePath/*"));
        echo "Cache cleared.\n";
    }

    private function createView($viewName)
    {
        $viewDirectory = __DIR__ . '/../app/Views/';
        $viewFile = $viewDirectory . $viewName . '.sam.php';

        if (file_exists($viewFile)) {
            echo "View file {$viewName}.sam.php already exists.\n";
        } else {
            // Create a simple default view template
            $content = "<!-- View: {$viewName}.sam.php -->\n";
            $content .= "<h1>Hello from {$viewName} view!</h1>\n";
            file_put_contents($viewFile, $content);
            echo "View file created at {$viewFile}\n";
        }
    }
}
