<?php
require 'Functions/User/UserController.php';
require 'Functions/Auth/AuthController.php';
require 'Functions/Admin/AdminController.php';
require 'Functions/Product/ProductController.php';
require 'Functions/Banner/BannerController.php';
require 'Functions/Cart/CartController.php';

$UserController = new UserController;
$AuthController = new AuthController;
$AdminController = new AdminController;
$ProductController = new ProductController;
$BannerController = new BannerController;
$CartController = new CartController;

session_start();

$request = $_SERVER['REQUEST_URI'];

$base_url = "http://localhost/dapoer";

$request = str_replace("/dapoer","",$request);

include 'route.php';

if( ! empty($_SESSION['error_message']))
{
    unset($_SESSION['error_message']);
}
