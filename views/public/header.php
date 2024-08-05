<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <style>
        .bg-main {
            background: #006989;
        }
        .text-main {
            color: #006989;
        }

        .bg-second {
            background: #005C78;
        }
    </style>
    <!-- Favicon -->
    <link href="assets/website/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets/website/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/website/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="row align-items-center py-3 px-xl-5 bg-main mb-4">
        <div class="col-lg-3 d-none d-lg-block ">
            <a href="" class="text-decoration-none">
                <h3 class="m-0 display-5 font-weight-semi-bold text-white">Dapoer Syafira</h3>
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">
            
        </div>
        <div class="col-lg-3 col-6 text-right">
            <a href="<?=json_decode(file_get_contents('env.json'))->base_url?>/signin" class="btn btn-primary border text-white">
                <span class="badge">Login</span>
            </a>
            <a href="<?=json_decode(file_get_contents('env.json'))->base_url?>/register" class="btn bg-white text-dark border">
                <span class="badge">Register</span>
            </a>
        </div>
    </div>
    <!-- Topbar End -->