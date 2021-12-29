<?php error_reporting(0); include 'config/config.php'; session_start(); include'config/key.php'?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Log In | Ajaya   </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="loading auth-fluid-pages pb-0">

    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">

                    <!-- Logo -->
                    <div class="auth-brand text-center text-lg-left">
                        <div class="auth-logo">
                            <a href="index.html" class="logo logo-dark text-center">
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="" height="22">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light text-center">
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="22">
                                </span>
                            </a>
                        </div>
                    </div>

                    <!-- title-->
                    <h4 class="mt-0">Sign In</h4>
                    <p class="text-muted mb-4">Masuk menggunakan username & password yang terdaftar.</p>

                    <!-- form -->
                    <form action="config/cek_login.php" method="POST">
                        <div class="form-group">
                            <label for="emailaddress">Username</label>
                            <input name="username" class="form-control" type="text" id="emailaddress" required="" placeholder="Enter your username">
                        </div>
                        <div class="form-group">
                            <!-- <a href="auth-recoverpw-2.html" class="text-muted float-right"><small>Forgot your password?</small></a> -->
                            <label for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input name="password" type="password" id="password" class="form-control" placeholder="Enter your password">
                                <div class="input-group-append" data-password="false">
                                    <div class="input-group-text">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-center">
                            <button name="login" class="btn btn-success btn-block" type="submit">Log In </button>
                        </div><br>


                        <?php


                        if ($_SESSION['status']=="gagal_login") {

                            ?>
                            <div class="alert alert-danger" role="alert">
                                <i class="mdi mdi-block-helper mr-2"></i> Valid user & Password <strong>Please</strong> Try again!
                            </div>
                            <?php

                        }

                        $_SESSION['status'] ="";

                     
                        echo $_SESSION['status'];
                     ?>


                     <!-- social-->
                            <!-- <div class="text-center mt-4">
                                <p class="text-muted font-16">Sign in with</p>
                                <ul class="social-list list-inline mt-3">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                                    </li>
                                </ul>
                            </div> -->
                        </form>
                        <!-- end form-->

                        <!-- Footer-->
                       <!--  <footer class="footer footer-alt">
                            <p class="text-muted">Don't have an account? <a href="auth-register-2.html" class="text-muted ml-1"><b>Sign Up</b></a></p>
                        </footer> -->

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
            <!-- end auth-fluid-form-box-->

            <!-- Auth fluid right content -->
            <div class="auth-fluid-right text-center">
                <div class="auth-user-testimonial">
                    <!-- <h2 class="mb-3 text-white">Is love the color!</h2> -->
                    <p class="lead"><i class="mdi mdi-format-quote-open"></i> 
                        <?php 

                            $info = mysqli_query($koneksi,"SELECT akun.nama,tbl_info.info FROM akun INNER JOIN tbl_info ON akun.idAkun = tbl_info.idakun ORDER BY id_info DESC LIMIT 1");

                            $arr  = mysqli_fetch_array($info);
                            echo $arr['info'];


                        ?>

                        <i class="mdi mdi-format-quote-close"></i>
                    </p>
                    <h5 class="text-white">
                        - <?php echo $arr['nama']?>
                    </h5>
                </div> <!-- end auth-user-testimonial-->
            </div>
            <!-- end Auth fluid right content -->
        </div>
        <!-- end auth-fluid-->

        <script type="text/javascript">


            window.setTimeout(function(){
                $(".alert").fadeTo(200, 0).slideUp(200, function(){
                    $(this).remove();
                })

            }, 2000);

        </script>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>
    </html>

    