<?php

class BannerModel {

    public function __construct() {
        include "connection.php";
        $this->conn = $conn;
    }

    public function create($name, $image, $price, $short_description, $description) {
        $image_path = $this->uploadImage($image);

        if (!$image_path) {
            return false;
        }

        $query = "INSERT INTO `banners`(`image`) VALUES ('$image_path')";
        $result = $this->query($query);

        return $result;
    }

    public function update($id, $image) {
        $id = intval($id);

        $banner = $this->getBannerById($id);
        if (!$banner) {
            return false;
        }

        $image_path = $banner['image'];
        $target_file = "assets/image/banner/". $image_path;
        if ($image['name']) {
            $this->deleteImage($target_file);
            $image_path = $this->uploadImage($image);
        }

        if (!$image_path) {
            return false;
        }

        $query = "UPDATE `banners` SET `image` = '$image_path' WHERE `id` = $id";
        $result = $this->query($query);

        return $result;
    }

    public function delete($id) {
        $id = intval($id);
        $banner = $this->getBannertById($id);

        if ($banner) {
            $this->deleteImage($banner['image']);
            $query = "DELETE FROM `banners` WHERE `id` = $id";
            $result = $this->query($query);

            return $result;
        }

        return false;
    }

    public function getBannerById($id) {
        $id = intval($id);
        $query = "SELECT * FROM `banners` WHERE `id` = $id";
        $result = $this->query($query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        } else {
            return null;
        }
    }

    public function getBanner() {
        $query = "SELECT * FROM `banners`";
        $result = $this->query($query);
    
        $banners = [];
        $basePath = json_decode(file_get_contents('env.json'))->base_url . '/assets/image/banner/';
    
        while ($row = mysqli_fetch_assoc($result)) {
            $row['image'] = $basePath . $row['image'];
            $banners[] = $row;
        }
    
        return $banners;
    }

    private function uploadImage($image) {
        $target_dir = "assets/image/banner/";
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
