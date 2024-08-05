<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Atlantis Lite Bootstrap Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <link rel="icon" href="../assets/admin/img/icon.ico" type="image/x-icon" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <link  href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">

    <script src="../assets/admin/js/plugin/webfont/webfont.min.js"></script>
    <script>
    WebFont.load({
        google: {
            "families": ["Lato:300,400,700,900"]
        },
        custom: {
            "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                "simple-line-icons"
            ],
            urls: ['../assets/admin/css/fonts.min.css']
        },
        active: function() {
            sessionStorage.fonts = true;
        }
    });
    </script>

    <link rel="stylesheet" href="../assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/admin/css/atlantis.min.css">
    <link href="../assets/styles.css" rel="stylesheet" />
    <link href="../assets/prism.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="wrapper">
        <div class="main-header">
            <div class="logo-header" data-background-color="light-blue2">
                <h1 class="m-0 display-5 font-weight-semi-bold text-white navbar-brand">Dapoer Syafira</h1>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
            </div>
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="light-blue2">
                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item">
                            <a href="<?=json_decode(file_get_contents('env.json'))->base_url ?>/logout" class="nav-link btn btn-danger">
                                <i class="fas fa-arrow-right-from-bracket "></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="sidebar sidebar-style-2">
            <div class="sidebar-background"></div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-info">
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a href="<?=json_decode(file_get_contents('env.json'))->base_url ?>/admin/product">
                                <span class="letter-icon"><i class="fas fa-boxes"></i></span>
                                <p>Product Manage</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=json_decode(file_get_contents('env.json'))->base_url ?>/admin/banner">
                                <span class="letter-icon"><i class="fas fa-sliders"></i></span>
                                <p>Banner Manage</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=json_decode(file_get_contents('env.json'))->base_url ?>/admin/user">
                                <span class="letter-icon"><i class="fas fa-users"></i></span>
                                <p>User Manage</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=json_decode(file_get_contents('env.json'))->base_url ?>/admin/order">
                                <span class="letter-icon"><i class="fas fa-credit-card"></i></span>
                                <p>Order Manage</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="main-panel">
            <div class="content content-documentation">
				<div class="container-fluid p-5">
