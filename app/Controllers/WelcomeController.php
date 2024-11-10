<?php
namespace Kibalanga\App\Controllers;

use Kibalanga\Core\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        // Render the welcome view
        $this->render('welcome');
    }
}
