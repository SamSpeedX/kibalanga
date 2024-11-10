<?php
namespace Kibalanga\App\Models;

use Kibalanga\Core\Database;
use PDO;

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Register a new user
    public function register($name, $email, $password)
    {
        $pdo = $this->db->getConnection();
        
        // Hash the password before saving
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        
        // Insert user into the database
        $stmt = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        $stmt->execute(['name' => $name, 'email' => $email, 'password' => $hashedPassword]);

        return $pdo->lastInsertId();  // Return the inserted user ID
    }

    // Log a user in
    public function login($email, $password)
    {
        $pdo = $this->db->getConnection();
        
        // Fetch the user by email
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Check if the user exists and verify the password
        if ($user && password_verify($password, $user['password'])) {
            return $user;  // Return the user data if login is successful
        }
        
        return false;  // Return false if login fails
    }
}
