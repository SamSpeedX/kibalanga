<?php
namespace Kibalanga\App\Controllers;

use Kibalanga\Core\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        $this->render('welcome Kibalanga Php framework');
    }
}
