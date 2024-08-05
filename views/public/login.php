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
    .card{
        box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
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
<body class="bg-primary">
    <div class="container-fluid mt-5 pt-5">
    <div class="row">
            <div class="col-lg-4 col-md-3 col-sm-1"></div>
            <div class="col-lg-4 col-md-6 col-sm-10">
                <div class="card border-none p-5 rounded border-black w-100">
                    <div class="d-flex justify-content-between mb-4">
                        <h3 >Login</h3>
                        <a href="<?= json_decode(file_get_contents('env.json'))->base_url?>/register" >Register</a>
                    </div>
                    
                    <?php
                    if (isset($_SESSION['error'])) {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Incorrect Email or Password
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="">
                        <form action="<?=json_decode(file_get_contents('env.json'))->base_url ?>/signin" method="post">
                            <span for="">Email : </span>
                            <input type="text" name="email" id="" class="form-control border-primary rounded mb-3">
                            <span for="">Password :</span>
                            <input type="password" name="password" id="" class="form-control border-primary rounded mb-3">
                            <button type="submit" class="w-100 btn btn-success mb-3">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<body>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="assets/lib/easing/easing.min.js"></script>
    <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/mail/jqBootstrapValidation.min.js"></script>
    <script src="assets/mail/contact.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>

<?php

    if (isset($_SESSION['error'])) {
        unset($_SESSION['error']);
    }

?>