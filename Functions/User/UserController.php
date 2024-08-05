<?php

class UserController {
    public $CartModel;
    public $BannerModel;
    public $ProductModel;

    public function __construct() {
        require_once __DIR__ . '/../../Models/CartModel.php';
        $this->CartModel = new CartModel;
        require_once __DIR__ . '/../../Models/BannerModel.php';
        $this->BannerModel = new BannerModel;
        require_once __DIR__ . '/../../Models/ProductModel.php';
        $this->ProductModel = new ProductModel;
    }

    public function index() {
        $count = $this->CartModel->find();
        $data = $this->BannerModel->getBanner();
        $product = $this->ProductModel->getProducts();
        $popular = $this->ProductModel->getProductRandom();

        if ($_SESSION['user'] ?? null) {
            require __DIR__ . '/../../views/user/index.php';
        } else {
            require __DIR__ . '/../../views/public/index.php';
        }
    }

    public function cart() {
        $count = $this->CartModel->find();
        $data = $this->CartModel->get();
        if ($_SESSION['user'] ?? null) {
            require __DIR__ . '/../../views/user/cart.php';
        } else {
            require __DIR__ . '/../../views/public/index.php';
        }
    }

    public function detail() {
        $count = $this->CartModel->find();
        $data = $this->ProductModel->getProductById($_GET['id']);
        if ($_SESSION['user'] ?? null) {
            require __DIR__ . '/../../views/user/detail.php';
        } else {
            require __DIR__ . '/../../views/public/detail.php';
        }
    }

    public function login() {
        require __DIR__ . '/../../views/public/login.php';
    }

    public function logout() {
        session_destroy();
        echo "<script>window.location.href='" . json_decode(file_get_contents('env.json'))->base_url . "';</script>";
        exit;
    }

    public function default() {
        echo "<script>window.location.href='" . json_decode(file_get_contents('env.json'))->base_url . "';</script>";
        exit;
    }
}
