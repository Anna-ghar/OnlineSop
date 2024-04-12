<?php

require_once '../config/db.php';
class AdminModel
{
    public function authenticate($username,$password)
    {

        global $conn;
        $sql = "SELECT * FROM admin WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':username' => $username));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $userPassword = $row['password'];
            if (password_verify($password,$userPassword)) {
                return true;
            } else {
                return false;
            }
        }
    }
}

