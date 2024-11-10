<?php
namespace Kibalanga\Core;

class CLI
{
    public function handle($argv)
    {
        $command = $argv[1] ?? null;

        switch ($command) {
            case 'migrate':
                $this->runMigrations();
                break;
            case 'serve':
                $this->serve();
                break;
            default:
                echo "Available commands: migrate, serve";
        }
    }

    private function runMigrations()
    {
        echo "Running migrations...\n";
        // Logic to run migrations goes here
    }

    private function serve()
    {
        echo "Starting server on http://localhost:8000\n";
        shell_exec("php -S localhost:8000 -t public");
    }
}
