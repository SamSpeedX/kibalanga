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
            case 'clear:cache':
                $this->clearCache();
                break;
            default:
                echo "Available commands: serve, migrate, make:model, make:controller, clear:cache\n";
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

    // Additional methods for creating models and controllers...
}
