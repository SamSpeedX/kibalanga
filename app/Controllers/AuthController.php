<?php
namespace Kibalanga\App\Controllers;

use Kibalanga\Core\Controller;
use Kibalanga\App\Models\UserModel;
use Kibalanga\Core\Session;

class AuthController extends Controller
{
    // Display the registration form
    public function showRegisterForm()
    {
        $this->render('auth/register');
    }

    // Handle user registration
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get data from the POST request
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Validate input
            if (empty($name) || empty($email) || empty($password)) {
                echo "All fields are required!";
                return;
            }

            // Create a new UserModel instance
            $userModel = new UserModel();
            $userId = $userModel->register($name, $email, $password);

            if ($userId) {
                // Set a session variable for the logged-in user
                Session::set('user_id', $userId);
                echo "Registration successful!";
                header('Location: /dashboard');  // Redirect to the dashboard
            } else {
                echo "Registration failed!";
            }
        }
    }

    // Display the login form
    public function showLoginForm()
    {
        $this->render('auth/login');
    }

    // Handle user login
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Validate input
            if (empty($email) || empty($password)) {
                echo "Email and password are required!";
                return;
            }

            // Create a new UserModel instance
            $userModel = new UserModel();
            $user = $userModel->login($email, $password);

            if ($user) {
                // Set the session variable for the logged-in user
                Session::set('user_id', $user['id']);
                header('Location: /dashboard');  // Redirect to the dashboard
            } else {
                echo "Invalid credentials!";
            }
        }
    }

    // Handle user logout
    public function logout()
    {
        session_destroy();
        header('Location: /login');  // Redirect to the login page
    }
}
