<?php

class AdminController{


    public $UserModel;

    public function __construct() {
        require_once __DIR__ . '\..\..\Models\UserModel.php';

        $this->UserModel = new UserModel;
    }

    public function index(){

        // require __DIR__ . '\..\..\views\admin\dashboard.php';
        echo "<script>window.location.href='".json_decode(file_get_contents('env.json'))->base_url.'/admin/product'."';</script>";
        exit;
    }

    public function user(){
        
        $data = $this->UserModel->get();
        require __DIR__ . '\..\..\views\admin\user.php';
    }

    public function userCreate($request){
        $data = $this->UserModel->create($_POST['fullname'], $_POST['password'], $_POST['email'], $_POST['password'], $_POST['role']);
        
        if ($data) {
            $_SESSION['success'] = 'User successfully added';
        }

        echo "<script>window.location.href='".json_decode(file_get_contents('env.json'))->base_url.'/admin/user'."';</script>";
        exit;
    }

    public function userDelete($request){
        $data = $this->UserModel->delete($_GET['id']);
        
        if ($data) {
            $_SESSION['success'] = 'User successfully deleted';
        }

        echo "<script>window.location.href='".json_decode(file_get_contents('env.json'))->base_url.'/admin/user'."';</script>";
        exit;
    }

    public function userUpdate($request){
        $data = $this->UserModel->update($_POST['id'], $_POST['fullname'], $_POST['username'], $_POST['email'],);
        
        if ($data) {
            $_SESSION['success'] = 'User succesfully updated';
        }

        echo "<script>window.location.href='".json_decode(file_get_contents('env.json'))->base_url.'/admin/user'."';</script>";
        exit;
    }

    public function getUserById($request){
        $data = $this->UserModel->getUserById($_GET['id']);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function default(){
        echo "<script>window.location.href='".json_decode(file_get_contents('env.json'))->base_url.'/admin/dashboard'."';</script>";
        exit;
    }

}
?>
