<?php

class UserModel{
    
    public function __construct() {
        include "connection.php";
        $this->conn = $conn;
    }
    
    public function register($fullname, $username, $email, $password, $role='user'){

        $role = htmlspecialchars($role);
        $fullname = htmlspecialchars($fullname);
        $username = htmlspecialchars($username);
        $email = htmlspecialchars($email);
        $password = htmlspecialchars(password_hash($password, PASSWORD_BCRYPT, ['cost'=>12]));

        if ($this->isEmailTaken($email)) {
            $_SESSION['error'] = true;
            return false;
        }

        $query = "INSERT INTO `users`(`fullname`, `username`, `email`, `password`, `role`) VALUES ('$fullname','$username','$email','$password','$role')";
        $data = $this->query($query);

        $query = "SELECT * FROM `users` WHERE `email` = '$email'";
        $result = $this->query($query);
        $row = mysqli_fetch_assoc($result);

        $_SESSION['user'] = $row;

        return true;
    }
    public function create($fullname, $username, $email, $password, $role='user'){

        $role = htmlspecialchars($role);
        $fullname = htmlspecialchars($fullname);
        $username = htmlspecialchars($username);
        $email = htmlspecialchars($email);
        $password = htmlspecialchars(password_hash($password, PASSWORD_BCRYPT, ['cost'=>12]));

        if ($this->isEmailTaken($email)) {
            $_SESSION['error'] = true;
            return false;
        }

        $query = "INSERT INTO `users`(`fullname`, `username`, `email`, `password`, `role`) VALUES ('$fullname','$username','$email','$password','$role')";
        $data = $this->query($query);

        $query = "SELECT * FROM `users` WHERE `email` = '$email'";
        $result = $this->query($query);
        $row = mysqli_fetch_assoc($result);

        return true;
    }

    private function isEmailTaken($email) {
        $query = "SELECT COUNT(*) as count FROM `users` WHERE `email` = '$email'";
        $result = $this->query($query);
        $row = mysqli_fetch_assoc($result);
        if ($row['count'] > 0) {
            return true;
        }
        return false;
    }

    public function login($email, $password) {
        $email = htmlspecialchars($email);
        $query = "SELECT * FROM `users` WHERE `email` = '$email'";
        $result = $this->query($query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $passwordHash = $row['password'];

            if (password_verify($password, $passwordHash)) {
                $_SESSION['user'] = $row;
                return true;
            }
        }
        $_SESSION['error'] = true;
        return false;
    }

    function query($query){
        $sql = mysqli_query($this->conn, $query);

        if (!$sql) {
            echo "Error description: " . mysqli_error($con);
            exit();
        }

        return $sql; 
    }

    public function get(){
        $query = "SELECT * FROM `users`";
        $result = $this->query($query);
        // $row = mysqli_fetch_assoc($result);

        return $result;
    }

    public function delete($id) {
        $id = intval($id);
        $query = "DELETE FROM `users` WHERE `id` = $id";
        $result = $this->query($query);

        return true;
    }

    public function update($id, $fullname, $username, $email) {
        $id = intval($id); // Pastikan ID adalah integer
        $fullname = htmlspecialchars($fullname);
        $username = htmlspecialchars($username);
        $email = htmlspecialchars($email);

        $query = "UPDATE `users` SET `fullname` = '$fullname', `username` = '$username', `email` = '$email' WHERE `id` = $id";
        $result = $this->query($query);

        return true;
    }

    public function getUserById($id) {
        $id = intval($id);
        $query = "SELECT * FROM `users` WHERE `id` = $id";
        $result = $this->query($query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        } else {
            return null;
        }
    }
}
