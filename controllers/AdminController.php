<?php

class AdminController
{
    public function adminLogin()
    {
        include '../views/templates/login.php';
        if (isset($_POST['usernameL']) && isset($_POST['passwordL']) && isset($_POST['LogSubmit'])) {
            $username = $_POST['usernameL'];
            $password = $_POST['passwordL'];

            $adminModel = new AdminModel();

            if ($adminModel->authenticate($username,$password)) {
                $_SESSION['isAdmin'] = true;
                header("Location: ../public/index.php?route=first");
            } else {
                echo "Wrong log in or password";
            }
        }
    }

}
