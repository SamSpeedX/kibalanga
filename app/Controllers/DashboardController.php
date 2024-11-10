<?php
namespace Kibalanga\App\Controllers;

use Kibalanga\Core\Controller;
use Kibalanga\Core\Session;

class DashboardController extends Controller
{
    public function index()
    {
        // Check if the user is logged in
        if (Session::get('user_id')) {
            $this->render('dashboard');
        } else {
            header('Location: /login');  // Redirect to login if not logged in
        }
    }
}
