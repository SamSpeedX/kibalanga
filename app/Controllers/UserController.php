<?php
namespace Kibalanga\App\Controllers;

use Kibalanga\Core\Controller;
use Kibalanga\App\Models\UserModel;

class UserController extends Controller
{
    public function show($email)
    {
        // Create an instance of the UserModel
        $userModel = new UserModel();
        
        // Fetch the user by email
        $user = $userModel->getUserByEmail($email);
        
        if ($user) {
            // Render the user profile view and pass the user data
            $this->render('userProfile', ['user' => $user]);
        } else {
            echo "User not found.";
        }
    }
}
