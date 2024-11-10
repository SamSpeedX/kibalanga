<?php
namespace Kibalanga\App\Models;

use Kibalanga\Core\Database;

class UserModel
{
    private $db;

    public function __construct()
    {
        // Initialize the database connection
        $this->db = new Database();
    }

    public function getUserByEmail($email)
    {
        // Get the PDO connection
        $pdo = $this->db->getConnection();
        
        // Prepare and execute the query securely
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        
        // Fetch the result
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
