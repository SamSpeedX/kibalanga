<?php
// core/ErrorHandler.php
namespace Kibalanga\Core;

class ErrorHandler
{
    public static function handle($errno, $errstr, $errfile, $errline)
    {
        $error = "[Error $errno] $errstr - $errfile:$errline\n";
        file_put_contents(__DIR__ . '/../logs/error.log', $error, FILE_APPEND);
        echo "An error occurred. Check logs for details.\n";
    }
}

set_error_handler([ErrorHandler::class, 'handle']);
