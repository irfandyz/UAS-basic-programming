<?php

class AuthController{

    public $UserModel;
    public $base_url = "http://localhost/dapoer";

    public function __construct() {
        require __DIR__ . '\..\..\Models\UserModel.php';

        $this->UserModel = new UserModel;
    }
    public function signin($request){
        $data = $this->UserModel->login($request['email'], $request['password']);
        if ($data) {
            if ($_SESSION['user']['role'] == 'admin') {
                echo "<script>window.location.href='".json_decode(file_get_contents('env.json'))->base_url.'/admin/dashboard'."';</script>";
                exit;
            }else{
                echo "<script>window.location.href='".json_decode(file_get_contents('env.json'))->base_url."';</script>";
                exit;
            }
        }
        echo "<script>window.location.href='".json_decode(file_get_contents('env.json'))->base_url.'/signin'."';</script>";
        exit;
        
    }
    public function register($request){
        $data = $this->UserModel->register($_POST['fullname'], $_POST['password'], $_POST['email'], $_POST['password']);
        if ($data) {
            echo "<script>window.location.href='".json_decode(file_get_contents('env.json'))->base_url."';</script>";
            exit;
        }
        echo "<script>window.location.href='".json_decode(file_get_contents('env.json'))->base_url.'/signin'."';</script>";
        exit;
    }
}
?>