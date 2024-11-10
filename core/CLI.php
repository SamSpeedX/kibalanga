<?php
namespace Kibalanga\Core;

class CLI
{
    public function handle($argv)
    {
        $command = $argv[1] ?? null;

        switch ($command) {
            case 'make:model':
                $this->createModel($argv[2]);
                break;
            case 'make:controller':
                $this->createController($argv[2]);
                break;
            case 'make:view':
                $this->createView($argv[2]);
                break;
            default:
                echo "Command not recognized\n";
        }
    }

    protected function createModel($name)
    {
        file_put_contents(__DIR__ . '/../app/Models/' . $name . '.php', "<?php\n\nclass $name {}");
        echo "Model $name created!\n";
    }

    protected function createController($name)
    {
        file_put_contents(__DIR__ . '/../app/Controllers/' . $name . 'Controller.php', "<?php\n\nnamespace Kibalanga\\App\\Controllers;\n\nuse Kibalanga\\Core\\Controller;\n\nclass {$name}Controller extends Controller\n{\n    public function index()\n    {\n        \$this->render('{$name}');\n    }\n}\n");
        echo "Controller $name created!\n";
    }

    protected function createView($name)
    {
        file_put_contents(__DIR__ . '/../app/Views/' . $name . '.sam.php', "<html><body><h1>Welcome to $name View!</h1></body></html>");
        echo "View $name.sam.php created!\n";
    }
}
