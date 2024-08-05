<?php

class CartModel {
    private $conn;

    public function __construct() {
        include "connection.php";
        $this->conn = $conn;
    }

    private function query($query) {
        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            echo "Error description: " . mysqli_error($this->conn);
            exit();
        }

        return $result;
    }

    public function create($qty, $product_id) {
        $user_id = $_SESSION['user']['id'];

        // Check if the product already exists in the cart
        $query = "SELECT * FROM `carts` WHERE `user_id` = '$user_id' AND `product_id` = '$product_id'";
        $result = $this->query($query);

        if ($result && mysqli_num_rows($result) > 0) {
            // If the product exists, update the quantity
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            $qty += $row['qty'];

            $query = "UPDATE `carts` SET `qty` = $qty WHERE `id` = $id";
            return $this->query($query);
        } else {
            // If the product does not exist, add a new entry
            $query = "INSERT INTO `carts` (`qty`, `product_id`, `user_id`) VALUES ('$qty', '$product_id', '$user_id')";
            return $this->query($query);
        }
    }

    public function get() {
        $user_id = $_SESSION['user']['id'];
        $query = "SELECT carts.*, products.name AS product_name, products.price AS product_price 
                  FROM carts 
                  JOIN products ON carts.product_id = products.id 
                  WHERE carts.user_id = $user_id AND `status`='cart'";
        return $this->query($query);
    }

    public function getStatus() {
        $user_id = $_SESSION['user']['id'];
        $query = "SELECT carts.*, products.name AS product_name, products.price AS product_price, users.fullname, products.price
                  FROM carts 
                  JOIN products ON carts.product_id = products.id
                  JOIN users ON carts.user_id = users.id 
                  WHERE `status`='waiting' OR `status`='confirmed'
                  Order By `created_at`";
        $result = $this->query($query);

        return $result;
    }

    public function delete($id) {
        $query = "DELETE FROM `carts` WHERE `id` = $id";
        $result = $this->query($query);

        return $result;
    }

    public function plus($id) {
        $user_id = $_SESSION['user']['id'];

        $query = "SELECT * FROM `carts` WHERE `id` = '$id'";
        $result = $this->query($query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            $qty = $row['qty'] + 1;

            $query = "UPDATE `carts` SET `qty` = $qty WHERE `id` = $id";
            $this->query($query);

            return true;
        }
        return false;
    }

    public function min($id) {
        $user_id = $_SESSION['user']['id'];

        $query = "SELECT * FROM `carts` WHERE `id` = '$id'";
        $result = $this->query($query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            $qty = max(1, $row['qty'] - 1);

            $query = "UPDATE `carts` SET `qty` = $qty WHERE `id` = $id";
            $this->query($query);

            return true;
        }
        return false;
    }
    
    public function confirmed($id) {
        $query = "UPDATE `carts` SET `status` = 'confirmed' WHERE `id` = '$id'";
        $this->query($query);
        return true;
    }

    public function find(){
        $user_id = $_SESSION['user']['id']??null;
        $query = "SELECT * FROM `carts` WHERE `user_id` = '$user_id' AND `status`='cart'";
        $result = $this->query($query);
        $count = mysqli_num_rows($result);

        return $count;
    }

    public function checkout() {
        $user_id = $_SESSION['user']['id'];
    
        $query = "SELECT * FROM `carts` WHERE `user_id` = '$user_id' AND `status` = 'cart'";
        $result = $this->query($query);
    
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $cart_id = $row['id'];
                $update_query = "UPDATE `carts` SET `status` = 'waiting' WHERE `id` = '$cart_id'";
                $this->query($update_query);
            }
            return true; 
        }
        return false;
    }

}