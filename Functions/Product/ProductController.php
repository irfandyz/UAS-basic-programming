<?php

class ProductController{

    public $ProductModel;

    public function __construct() {
        require_once __DIR__ . '\..\..\Models\ProductModel.php';
        $this->ProductModel = new ProductModel;
    }

    public function index(){
        $data = $this->ProductModel->getProducts();
        require __DIR__ . '\..\..\views\admin\product.php';
    }

    public function create($request){
        $data = $this->ProductModel->create($_POST['name'], $_FILES['image'], $_POST['price'], $_POST['short_description'], $_POST['description']);
        if ($data) {
            $_SESSION['success'] = 'Product successfully added';
        } else {
            $_SESSION['error'] = 'Failed to add product';
        }

        echo "<script>window.location.href='".json_decode(file_get_contents('env.json'))->base_url.'/admin/product'."';</script>";
        exit;
    }

    public function delete($request){
        $data = $this->ProductModel->getProductById($_GET['id']);
        if ($data) {
            $file = __DIR__ . '\..\..\assets\image\product\\' . $data['image'];
            if (file_exists($file)) {
                unlink($file);
            }
            $delete = $this->ProductModel->delete($_GET['id']);
            if ($delete) {
                $_SESSION['success'] = 'Product successfully deleted';
            } else {
                $_SESSION['error'] = 'Failed to delete product';
            }
        } else {
            $_SESSION['error'] = 'Product not found';
        }

        echo "<script>window.location.href='".json_decode(file_get_contents('env.json'))->base_url.'/admin/product'."';</script>";
        exit;
    }

    public function update($request){
        $id = $_POST['id'];
        $data = $this->ProductModel->getProductById($id);
        if ($data) {
            $update = $this->ProductModel->update($id, $_POST['name'], $_FILES['image'], $_POST['price'], $_POST['short_description'], $_POST['description']);
            if ($update) {
                $_SESSION['success'] = 'Product successfully updated';
            } else {
                $_SESSION['error'] = 'Failed to update product';
            }
        }
            

        echo "<script>window.location.href='".json_decode(file_get_contents('env.json'))->base_url.'/admin/product'."';</script>";
        exit;
    }

    public function getProductById($request){
        $data = $this->ProductModel->getProductById($_GET['id']);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function default(){
        echo "<script>window.location.href='".json_decode(file_get_contents('env.json'))->base_url.'/admin/dashboard'."';</script>";
        exit;
    }
}
?>
