<?php

class BannerController{

    public $BannerModel;

    public function __construct() {
        require_once __DIR__ . '\..\..\Models\BannerModel.php';
        $this->BannerModel = new BannerModel;
    }

    public function index(){
        $data = $this->BannerModel->getBanner();
        require __DIR__ . '\..\..\views\admin\banner.php';
    }

    public function create($request){
        $data = $this->BannerModel->create($_POST['name'], $_FILES['image'], $_POST['price'], $_POST['short_description'], $_POST['description']);
        if ($data) {
            $_SESSION['success'] = 'Banner successfully added';
        } else {
            $_SESSION['error'] = 'Failed to add Banner';
        }

        echo "<script>window.location.href='".json_decode(file_get_contents('env.json'))->base_url.'/admin/banner'."';</script>";
        exit;
    }

    public function delete($request){
        $data = $this->BannerModel->getBannerById($_GET['id']);
        if ($data) {
            $file = __DIR__ . '\..\..\assets\image\banner\\' . $data['image'];
            if (file_exists($file)) {
                unlink($file);
            }
            $delete = $this->BannerModel->delete($_GET['id']);
            if ($delete) {
                $_SESSION['success'] = 'Banner successfully deleted';
            } else {
                $_SESSION['error'] = 'Failed to delete Banner';
            }
        } else {
            $_SESSION['error'] = 'Banner not found';
        }

        echo "<script>window.location.href='".json_decode(file_get_contents('env.json'))->base_url.'/admin/banner'."';</script>";
        exit;
    }

    public function update($request){
        $id = $_POST['id'];
        $data = $this->BannerModel->getBannerById($id);
        if ($data) {
            $update = $this->BannerModel->update($id, $_FILES['image']);
            if ($update) {
                $_SESSION['success'] = 'Banner successfully updated';
            } else {
                $_SESSION['error'] = 'Failed to update Banner';
            }
        }
            

        echo "<script>window.location.href='".json_decode(file_get_contents('env.json'))->base_url.'/admin/banner'."';</script>";
        exit;
    }

    public function getBannerById($request){
        $data = $this->BannerModel->getBannerById($_GET['id']);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function default(){
        echo "<script>window.location.href='".json_decode(file_get_contents('env.json'))->base_url.'/admin/dashboard'."';</script>";
        exit;
    }
}
?>
