<?php

class CartController{

    public $CartModel;

    public function __construct() {
        require_once __DIR__ . '\..\..\Models\CartModel.php';
        $this->CartModel = new CartModel;
    }
    public function index(){
        $data = $this->CartModel->getStatus();
        // var_dump(mysqli_fetch_assoc($data));die;
        require __DIR__ . '\..\..\views\admin\order.php';
    }
    public function create($request){
        $data = $this->CartModel->create($request['qty'], $request['id']);
        if ($data) {
            return true;
        }else{
            return false;
        }
    }
    public function checkout(){
        $data = $this->CartModel->checkout();
        
        echo $data;
    }
    public function plus($request){
        $data = $this->CartModel->plus($request['id']);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);

        if ($data) {
            return true;
        }else{
            return false;
        }
    }
    public function min($request){
        $data = $this->CartModel->min($request['id']);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
        if ($data) {
            return true;
        }else{
            return false;
        }
    }
    public function confirmation(){
        $data = $this->CartModel->confirmed($_GET['id']);
        echo "<script>window.location.href='" . json_decode(file_get_contents('env.json'))->base_url . "/admin/order';</script>";
        exit;
    }
    public function delete(){
        $data = $this->CartModel->delete($_GET['id']);
        if ($data) {
            return true;
        }else{
            return false;
        }
    }
    
    

}
