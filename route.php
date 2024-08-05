<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   switch ($request) {
      case '/signin': $AuthController->signin($_POST); break;
      case '/register': $AuthController->register($_POST); break;
      
      case '/addToCart': $CartController->create($_POST); break;
      case '/plusCart': $CartController->plus($_POST); break;
      case '/minCart': $CartController->min($_POST); break;

      case '/admin/user/create': $AdminController->userCreate($_POST); break;
      case '/admin/user/update': $AdminController->userUpdate($_POST); break;

      case '/admin/product/create': $ProductController->create($_POST); break;
      case '/admin/product/update': $ProductController->update($_POST); break;

      case '/admin/banner/create': $BannerController->create($_POST); break;
      case '/admin/banner/update': $BannerController->update($_POST); break;
   }
}else{
   switch ($request) {
      case '/': $UserController->index(); break;
      case '/detail?id='.(isset($_GET['id'])?$_GET['id']:''): $UserController->detail(); break;
      case '/cart': $UserController->cart(); break;
      case '/cart/delete?id='.(isset($_GET['id'])?$_GET['id']:''): $CartController->delete(); break;
      case '/checkout': $CartController->checkout(); break;
      
      case '/signin': $UserController->login(); break;
      case '/logout': $UserController->logout(); break;
      case '/register': require __DIR__ . '/views/public/register.php'; break;
      
      default:
      if (isset($_SESSION['user'])) {
         if ($_SESSION['user']['role'] == 'admin') {
               switch ($request) {
                  case '/admin': $AdminController->default(); break;
                  case '/admin/dashboard': $AdminController->index(); break;

                  case '/admin/user': $AdminController->user(); break;
                  case '/admin/user/delete?id='.(isset($_GET['id'])?$_GET['id']:''): $AdminController->userDelete($_GET); break;
                  case '/admin/user/get?id='.(isset($_GET['id'])?$_GET['id']:''): $AdminController->getUserById($_GET); break;

                  case '/admin/product': $ProductController->index(); break;
                  case '/admin/product/delete?id='.(isset($_GET['id'])?$_GET['id']:''): $ProductController->delete($_GET); break;
                  case '/admin/product/get?id='.(isset($_GET['id'])?$_GET['id']:''): $ProductController->getProductById($_GET); break;

                  case '/admin/banner': $BannerController->index(); break;
                  case '/admin/banner/delete?id='.(isset($_GET['id'])?$_GET['id']:''): $BannerController->delete($_GET); break;
                  case '/admin/banner/get?id='.(isset($_GET['id'])?$_GET['id']:''): $BannerController->getProductById($_GET); break;

                  case '/admin/order': $CartController->index(); break;
                  case '/admin/order/confirm?id='.(isset($_GET['id'])?$_GET['id']:''): $CartController->confirmation(); break;
                  
                  default: $UserController->default(); break;
               }
               exit;
            }
         }
         $UserController->default(); 
      break;
   }
}