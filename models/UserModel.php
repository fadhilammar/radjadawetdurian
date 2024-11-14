<?php
require_once __DIR__ . '/../config/connection.php';

class UserModel {
    private $conn;

    public function __construct() {
        $this->conn = (new Connection())->openConnection();
    }

    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                return $user;
            } else {
                return false; 
            }
        }
        return null; 
    }
}
?>
