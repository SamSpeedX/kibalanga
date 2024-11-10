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
            default:
                echo "Available commands: serve, migrate, make:model, make:controller\n";
        }
    }

    private function serve()
    {
        echo "Starting server on http://localhost:8000\n";
        shell_exec("php -S localhost:8000 -t public");
    }

    private function runMigrations()
    {
        echo "Running migrations...\n";
        // Migration logic here
    }

    private function createModel($name)
    {
        if (!$name) {
            echo "Please provide a model name.\n";
            return;
        }

        $modelTemplate = "<?php\nnamespace Kibalanga\App\Models;\n\nclass {$name}\n{\n    // Define your model properties and methods here\n}\n";
        $modelPath = __DIR__ . "/../app/Models/{$name}.php";

        if (file_put_contents($modelPath, $modelTemplate) !== false) {
            echo "Model created successfully at app/Models/{$name}.php\n";
        } else {
            echo "Failed to create model.\n";
        }
    }

    private function createController($name)
    {
        if (!$name) {
            echo "Please provide a controller name.\n";
            return;
        }

        $controllerTemplate = "<?php\nnamespace Kibalanga\App\Controllers;\n\nclass {$name}\n{\n    public function index()\n    {\n        echo 'This is the {$name} controller.';\n    }\n}\n";
        $controllerPath = __DIR__ . "/../app/Controllers/{$name}.php";

        if (file_put_contents($controllerPath, $controllerTemplate) !== false) {
            echo "Controller created successfully at app/Controllers/{$name}.php\n";
        } else {
            echo "Failed to create controller.\n";
        }
    }
}
