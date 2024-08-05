<?php

class ProductModel {

    public function __construct() {
        include "connection.php";
        $this->conn = $conn;
    }

    public function create($name, $image, $price, $short_description, $description) {
        $name = htmlspecialchars($name);
        $short_description = htmlspecialchars($short_description);
        $description = htmlspecialchars($description);
        $image_path = $this->uploadImage($image);

        if (!$image_path) {
            return false;
        }

        $query = "INSERT INTO `products`(`name`, `image`, `price`, `short_description`, `description`) VALUES ('$name', '$image_path', '$price', '$short_description', '$description')";
        $result = $this->query($query);

        return $result;
    }

    public function update($id, $name, $image, $price, $short_description, $description) {
        $id = intval($id);
        $price = intval($price);
        $name = htmlspecialchars($name);
        $short_description = htmlspecialchars($short_description);
        $description = htmlspecialchars($description);

        $product = $this->getProductById($id);
        if (!$product) {
            return false;
        }

        $image_path = $product['image'];
        $target_file = "assets/image/product/". $image_path;
        if ($image['name']) {
            $this->deleteImage($target_file);
            $image_path = $this->uploadImage($image);
        }

        if (!$image_path) {
            return false;
        }

        $query = "UPDATE `products` SET `name` = '$name', `image` = '$image_path', `price`='$price', `short_description` = '$short_description', `description` = '$description' WHERE `id` = $id";
        $result = $this->query($query);

        return $result;
    }

    public function delete($id) {
        $id = intval($id);
        $product = $this->getProductById($id);

        if ($product) {
            $this->deleteImage($product['image']);
            $query = "DELETE FROM `products` WHERE `id` = $id";
            $result = $this->query($query);

            return $result;
        }

        return false;
    }

    public function getProductById($id) {
        $id = intval($id);
        $query = "SELECT * FROM `products` WHERE `id` = $id";
        $result = $this->query($query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $row['image'] = json_decode(file_get_contents('env.json'))->base_url . '/assets/image/product/'. $row['image'];
            return $row;
        } else {
            return null;
        }
    }

    public function getProducts() {
        $query = "SELECT * FROM `products`";
        $result = $this->query($query);
    
        $products = [];
        $basePath = json_decode(file_get_contents('env.json'))->base_url . '/assets/image/product/';
    
        while ($row = mysqli_fetch_assoc($result)) {
            $row['image'] = $basePath . $row['image'];
            $products[] = $row;
        }
    
        return $products;
    }

    public function getProductRandom() {
        $query = "SELECT * FROM `products` ORDER BY RAND() LIMIT 4";
        $result = $this->query($query);
    
        $products = [];
        $basePath = json_decode(file_get_contents('env.json'))->base_url . '/assets/image/product/';
    
        while ($row = mysqli_fetch_assoc($result)) {
            $row['image'] = $basePath . $row['image'];
            $products[] = $row;
        }
    
        return $products;
    }

    private function uploadImage($image) {
        $target_dir = "assets/image/product/";
        $target_file = $target_dir .'.'. basename($image['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $filename = date('dmYHis').'.'.$imageFileType;
        $target_file = $target_dir . $filename;

        if (file_exists($target_file)) {
            return false;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            return false;
        }

        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            return $filename;
        } else {
            return false;
        }
    }

    private function deleteImage($image_path) {
        if (file_exists($image_path)) {
            unlink($image_path);
        }
    }

    private function query($query) {
        $sql = mysqli_query($this->conn, $query);

        if (!$sql) {
            echo "Error description: " . mysqli_error($this->conn);
            exit();
        }

        return $sql;
    }
}

?>
