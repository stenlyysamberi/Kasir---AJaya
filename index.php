<?php
session_start();

include 'config/config.php';
include 'config/key.php';
include 'config/salam.php';
error_reporting(0);

if ($_SESSION['status']!="sudah_login") {
  // code...
  header("location:login.php");
}




$notif = mysqli_query($koneksi,"SELECT tbl_barcode_barang.qty AS sisa_stok,tbl_barcode_barang.nama_barang,tbl_barcode_barang.img AS gambar_barang,tbl_barang.min_stok AS minimal_stok FROM tbl_barcode_barang INNER JOIN tbl_barang ON tbl_barcode_barang.id_barcode = tbl_barang.id_barcode");

$total = 0;
?>


<!DOCTYPE html>
<html lang="en">
<head>



  <meta charset="utf-8" />
  <title>Home | Ajaya</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="assets/images/favicon.ico">

  <script src="assets/libs/dropify/js/dropify.min.js"></script>



  <!-- Plugins css -->
  <link href="assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />

  <link href="assets/libs/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />

  <!-- App css -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
  <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

  <link href="assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
  <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

  <!-- icons -->
  <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

  <!--  alert style -->
  <link rel="stylesheet" type="text/css" href="assets/libs/sweetalert2/sweetalert2.min.css">
  <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

  <script src="assets/libs/jquery/jquery.min.js"></script>
</head>

<body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

  <!-- Begin page -->
  <div id="wrapper">

    <!-- Topbar Start -->
    <div class="navbar-custom">
      <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">





          <li class="dropdown d-inline-block d-lg-none">
            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
              <i class="fe-search noti-icon"></i>
            </a>
            <div class="dropdown-menu dropdown-lg dropdown-menu-right p-0">
              <form class="p-3">
                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
              </form>
            </div>
          </li>

          <li class="dropdown d-none d-lg-inline-block">
            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
              <i class="fe-maximize noti-icon"></i>
            </a>
          </li>

          <li class="dropdown d-none d-lg-inline-block topbar-dropdown">
            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
              <i class="fe-grid noti-icon"></i>
            </a>
            <div class="dropdown-menu dropdown-lg dropdown-menu-right">

              <div class="p-lg-1">
                <div class="row no-gutters">
                  <div class="col">
                    <a class="dropdown-icon-item" href="#">
                      <img src="assets/images/category/slack.png" alt="slack">
                      <span>Slack</span>
                    </a>
                  </div>
                  <div class="col">
                    <a class="dropdown-icon-item" href="#">
                      <img src="assets/images/category/github.png" alt="Github">
                      <span>GitHub</span>
                    </a>
                  </div>
                  <div class="col">
                    <a class="dropdown-icon-item" href="#">
                      <img src="assets/images/category/dribbble.png" alt="dribbble">
                      <span>Dribbble</span>
                    </a>
                  </div>
                </div>

                <div class="row no-gutters">
                  <div class="col">
                    <a class="dropdown-icon-item" href="#">
                      <img src="assets/images/category/bitbucket.png" alt="bitbucket">
                      <span>Bitbucket</span>
                    </a>
                  </div>
                  <div class="col">
                    <a class="dropdown-icon-item" href="#">
                      <img src="assets/images/category/dropbox.png" alt="dropbox">
                      <span>Dropbox</span>
                    </a>
                  </div>
                  <div class="col">
                    <a class="dropdown-icon-item" href="#">
                      <img src="assets/images/category/g-suite.png" alt="G Suite">
                      <span>G Suite</span>
                    </a>
                  </div>

                </div>
              </div>

            </div>
          </li>





          <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
              <i class="fe-bell noti-icon"></i>
              <span id="jumlah_notif" class="badge badge-danger rounded-circle noti-icon-badge"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-lg">

              <!-- item-->
              <div class="dropdown-item noti-title">
                <h5 class="m-0">
                  <span class="float-right">
                    <a href="" class="text-dark">
                      <small>Clear All</small>
                    </a>
                  </span>Notificationss
                </h5>
              </div>

              <div class="noti-scroll" data-simplebar>

               <?php 

               while ($y = mysqli_fetch_array($notif)) {
              // code...
                if ($y['sisa_stok']<= $y['minimal_stok']) {
                // code...
                  $total++;
                  ?>


                  <a href="javascript:void(0);" class="dropdown-item notify-item active">
                    <div class="notify-icon">
                      <img src="assets/images/products/<?php echo $y['gambar_barang']?>" class="img-fluid rounded-circle" alt="" /> </div>
                      <p class="notify-details"><?php echo $y['nama_barang']?> </p>
                      <p class="text-muted mb-0 user-msg">
                        <small><?php salam();?>? <?php echo $_SESSION['nama']?> Mohon dibantu sisa stok saya akan habis!</small>
                      </p>
                    </a>

                    <?php

                  }

                }



                ?>
                <input hidden id="notif" type="" value="<?php echo $total?>" name="">
                <?php


                ?>











                <!-- All-->
                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                  View all
                  <i class="fe-arrow-right"></i>
                </a>

              </div>
            </li>
            <?php $id = $_SESSION['id'];

            $get = mysqli_query($koneksi,"SELECT * FROM akun WHERE idAkun='$id'");
            $p = mysqli_fetch_array($get);

            ?>
            <li class="dropdown notification-list topbar-dropdown">
              <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="assets/images/akun/<?php echo $p['gambar']?>" alt="user-image" class="rounded-circle">
                <span class="pro-user-name ml-1">
                  <?php echo $p['nama']?> <i class="mdi mdi-chevron-down"></i>
                </span>
              </a>
              <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <a href="#" data-toggle="modal" data-target="#con-profil-edit-modal" class="dropdown-item notify-item">
                  <i class="fe-user"></i>
                  <span>My Account</span>
                </a>

                <!-- item-->
                <a href="#" data-toggle="modal" data-target="#con-sandi-edit-modal" class="dropdown-item notify-item">
                  <i class="fe-settings"></i>
                  <span>Change Password</span>
                </a>

                <!-- item-->
                 <!--  <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-lock"></i>
                    <span>Lock Screen</span>
                  </a> -->

                  <div class="dropdown-divider"></div>

                  <!-- item-->
                  <a href="config/keluar.php" class="dropdown-item notify-item">
                    <i class="fe-log-out"></i>
                    <span>Logout</span>
                  </a>

                </div>
              </li>

              <li class="dropdown notification-list">
                <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                  <i class="fe-settings noti-icon"></i>
                </a>
              </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
              <a href="index.html" class="logo logo-dark text-center">
                <span class="logo-sm">
                  <img src="assets/images/logo-sm.png" alt="" height="22">
                  <!-- <span class="logo-lg-text-light">UBold</span> -->
                </span>
                <span class="logo-lg">
                  <img src="ssets/images/logo-dark.png" alt="" height="20">
                  <!-- <span class="logo-lg-text-light">U</span> -->
                </span>
              </a>

              <a href="index.html" class="logo logo-light text-center">
                <span class="logo-sm">
                  <img src="ssets/images/logo-sm.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                  <img src="assets/images/logo-light.png" alt="" height="20">
                </span>
              </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
              <li>
                <button class="button-menu-mobile waves-effect waves-light">
                  <i class="fe-menu"></i>
                </button>
              </li>

              <li>
                <!-- Mobile menu toggle (Horizontal Layout)-->
                <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                  <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                  </div>
                </a>
                <!-- End mobile menu toggle-->
              </li>



              

            </ul>
            <div class="clearfix"></div>
          </div>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

          <div class="h-100" data-simplebar>

            <!-- User box -->
            <div class="user-box text-center">
              <img src="assets/images/akun/<?php echo $_SESSION['dp']?>" alt="user-img" title="Mat Helme"
              class="rounded-circle avatar-md">
              <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                data-toggle="dropdown"><?php echo $_SESSION['nama']?></a>
                <div class="dropdown-menu user-pro-dropdown">

                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-user mr-1"></i>
                    <span>My Account</span>
                  </a>

                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-settings mr-1"></i>
                    <span>Settings</span>
                  </a>

                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-lock mr-1"></i>
                    <span>Lock Screen</span>
                  </a>

                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-log-out mr-1"></i>
                    <span>Logout</span>
                  </a>

                </div>
              </div>
              <p class="text-muted"><?php echo $_SESSION['level']?></p>
            </div>

            <!--- Sidemenu -->
            <div id="sidebar-menu">

              <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                  <a href="index.php?Home">
                    <i data-feather="airplay"></i>

                    <span> Dashboards </span>
                  </a>

                </li>

                <li class="menu-title mt-2">MENU</li>






                <?php 

                if ($_SESSION['level']=='kasir') {
                 ?>

                 <li>
                  <a href="#sidebarCrm" data-toggle="collapse">
                    <i data-feather="shopping-cart"></i>
                    <span>Kasir</span>
                    <span class="menu-arrow"></span>
                  </a>
                  <div class="collapse" id="sidebarCrm">
                    <ul class="nav-second-level">



                      <li>
                        <a href="index.php?bayar">Payment</a>
                      </li>
                      <li>
                        <a href="index.php?view-produk">Lihat Produk</a>
                      </li>
                    </ul>
                  </div>
                </li>

                <?php
              }else if($_SESSION['level']=='gudang'){
                ?>

                <li>
                  <a href="#sidebarEmail" data-toggle="collapse">
                    <i data-feather="database"></i>
                    <span> Database </span>
                    <span class="menu-arrow"></span>
                  </a>
                  <div class="collapse" id="sidebarEmail">
                    <ul class="nav-second-level">
                      <li>
                        <a href="index.php?gudang=1">Scan Barcode</a>
                      </li>


                      <li>
                        <a href="index.php?add-stok=1">Tamba Stok Barang</a>
                      </li>



                    </ul>
                  </div>
                </li>

                <?php
              }else{
                ?>

                <li>
                  <a href="#sidebarEcommerce" data-toggle="collapse">
                    <i data-feather="users"></i>
                    <span>Owner</span>
                    <span class="menu-arrow"></span>
                  </a>
                  <div class="collapse" id="sidebarEcommerce">
                    <ul class="nav-second-level">

                      <?php

                      $cek = mysqli_query($koneksi,"SELECT COUNT(join_ket) AS total FROM tbl_barcode_barang WHERE join_ket ='Pendding'");
                      $notif = mysqli_fetch_array($cek);

                      if ($notif['total']>0) {
                        ?>

                        <li>
                          <a href="index.php?aproval=1">New Products
                            <span class="badge badge-pink float-right"><?php echo $notif['total']?></span>
                          </a>

                        </li>

                        <?php
                      }else{

                        ?>

                        <li>
                          <a href="index.php?aproval=1">New Products

                          </a>

                        </li>

                        <?php

                      }

                      ?>

                      <li>
                        <a href="index.php?new-satuan">New Items </a>
                      </li>


                      <li>
                        <a href="index.php?detil-produk">Setting Product </a>
                      </li>


                      <li>
                        <a href="index.php?jenis=1">Tamba Jenis Barang</a>
                      </li>

                      <li>
                        <a href="index.php?category=1">Tamba Category</a>
                      </li>
                      <li>
                        <a href="index.php?user=1">Tamba Karyawan</a>
                      </li>

                      <li>
                        <a href="index.php?barang-masuk=1">Barang Masuk</a>
                      </li>


                      <li>
                        <a href="index.php?laporan">Barang Keluar</a>
                      </li>
                    </ul>
                  </div>
                </li>

                <li>
                  <a href="#sidebarCrm" data-toggle="collapse">
                    <i data-feather="shopping-cart"></i>
                    <span>Kasir</span>
                    <span class="menu-arrow"></span>
                  </a>
                  <div class="collapse" id="sidebarCrm">
                    <ul class="nav-second-level">



                      <li>
                        <a href="index.php?bayar">Payment</a>
                      </li>
                      <li>
                        <a href="index.php?view-produk">Lihat Produk</a>
                      </li>
                    </ul>
                  </div>
                </li>

                <li>
                  <a href="#sidebarEmail" data-toggle="collapse">
                    <i data-feather="database"></i>
                    <span> Database </span>
                    <span class="menu-arrow"></span>
                  </a>
                  <div class="collapse" id="sidebarEmail">
                    <ul class="nav-second-level">
                      <li>
                        <a href="index.php?gudang=1">Scan Barcode</a>
                      </li>


                      <li>
                        <a href="index.php?add-stok=1">Tamba Stok Barang</a>
                      </li>



                    </ul>
                  </div>
                </li>




                <li class="menu-title mt-2">Components</li>



                <li>
                  <a href="#sidebarMultilevel" data-toggle="collapse">
                    <i data-feather="smartphone"></i>
                    <span> Setting </span>
                    <span class="menu-arrow"></span>
                  </a>
                  <div class="collapse" id="sidebarMultilevel">
                    <ul class="nav-second-level">
                      <li>
                        <a data-toggle="modal" data-target="#infoModal" href="" id="informasi" data-toggle="collapse">
                          Informasi 
                        </a>


                      </li>



                    </ul>
                  </div>
                </li>


                <?php
              }

              ?>



            </ul>

          </div>
          <!-- End Sidebar -->

          <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

      </div>
      <!-- Left Sidebar End -->

      <!-- ============================================================== -->
      <!-- Start Page Content here -->
      <!-- ============================================================== -->



      <div class="content-page">
        <div class="content">

          <!-- Start Content-->
          <div class="container-fluid">

            <?php include 'controller.php';





            if ($_SESSION['alert']=="Berhasil") {

              echo "<script>


              Swal.fire(
              'Berhasil',
              '".$_SESSION['sub_alert']."',
              'success'
              )


              </script>";

            }if ($_SESSION['alert']=="Gagal") {
              echo "<script>


              Swal.fire(
              'error',
              '".$_SESSION['sub_alert']."',
              'error'
              )
              </script>";
            }
            $_SESSION['alert'] ="";
            $_SESSION['sub_alert'] ="";

            ?>
          </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <script>document.write(new Date().getFullYear())</script> &copy; akupa.id by <a href="">Stenly S</a>
              </div>
              <div class="col-md-6">
                <div class="text-md-right footer-links d-none d-sm-block">
                  <a href="javascript:void(0);">About Us</a>
                  <a href="javascript:void(0);">Help</a>
                  <a href="javascript:void(0);">Contact Us</a>
                </div>
              </div>
            </div>
          </div>
        </footer>
        <!-- end Footer -->

      </div>

      <!-- ============================================================== -->
      <!-- End Page content -->
      <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
      <div data-simplebar class="h-100">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-bordered nav-justified" role="tablist">


          <li class="nav-item">
            <a class="nav-link py-2 active" data-toggle="tab" href="#settings-tab" role="tab">
              <i class="mdi mdi-cog-outline d-block font-22 my-1"></i>
            </a>
          </li>
        </ul>


        <!-- Tab panes -->
        <div class="tab-content pt-0">
          <div class="tab-pane" id="chat-tab" role="tabpanel">

            <form class="search-bar p-3">
              <div class="position-relative">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="mdi mdi-magnify"></span>
              </div>
            </form>

            <h6 class="font-weight-medium px-3 mt-2 text-uppercase">Group Chats</h6>

            <div class="p-2">
              <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-success"></i>
                <span class="mb-0 mt-1">App Development</span>
              </a>

              <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-warning"></i>
                <span class="mb-0 mt-1">Office Work</span>
              </a>

              <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-danger"></i>
                <span class="mb-0 mt-1">Personal Group</span>
              </a>

              <a href="javascript: void(0);" class="text-reset notification-item pl-3 d-block">
                <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>
                <span class="mb-0 mt-1">Freelance</span>
              </a>
            </div>

            <h6 class="font-weight-medium px-3 mt-3 text-uppercase">Favourites <a href="javascript: void(0);" class="font-18 text-danger"><i class="float-right mdi mdi-plus-circle"></i></a></h6>

            <div class="p-2">
              <a href="javascript: void(0);" class="text-reset notification-item">
                <div class="media">
                  <div class="position-relative mr-2">
                    <img src="../assets/images/users/user-10.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                    <i class="mdi mdi-circle user-status online"></i>
                  </div>
                  <div class="media-body overflow-hidden">
                    <h6 class="mt-0 mb-1 font-14">Andrew Mackie</h6>
                    <div class="font-13 text-muted">
                      <p class="mb-0 text-truncate">It will seem like simplified English.</p>
                    </div>
                  </div>
                </div>
              </a>

              <a href="javascript: void(0);" class="text-reset notification-item">
                <div class="media">
                  <div class="position-relative mr-2">
                    <img src="../assets/images/users/user-1.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                    <i class="mdi mdi-circle user-status away"></i>
                  </div>
                  <div class="media-body overflow-hidden">
                    <h6 class="mt-0 mb-1 font-14">Rory Dalyell</h6>
                    <div class="font-13 text-muted">
                      <p class="mb-0 text-truncate">To an English person, it will seem like simplified</p>
                    </div>
                  </div>
                </div>
              </a>

              <a href="javascript: void(0);" class="text-reset notification-item">
                <div class="media">
                  <div class="position-relative mr-2">
                    <img src="../assets/images/users/user-9.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                    <i class="mdi mdi-circle user-status busy"></i>
                  </div>
                  <div class="media-body overflow-hidden">
                    <h6 class="mt-0 mb-1 font-14">Jaxon Dunhill</h6>
                    <div class="font-13 text-muted">
                      <p class="mb-0 text-truncate">To achieve this, it would be necessary.</p>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <h6 class="font-weight-medium px-3 mt-3 text-uppercase">Other Chats <a href="javascript: void(0);" class="font-18 text-danger"><i class="float-right mdi mdi-plus-circle"></i></a></h6>

            <div class="p-2 pb-4">
              <a href="javascript: void(0);" class="text-reset notification-item">
                <div class="media">
                  <div class="position-relative mr-2">
                    <img src="../assets/images/users/user-2.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                    <i class="mdi mdi-circle user-status online"></i>
                  </div>
                  <div class="media-body overflow-hidden">
                    <h6 class="mt-0 mb-1 font-14">Jackson Therry</h6>
                    <div class="font-13 text-muted">
                      <p class="mb-0 text-truncate">Everyone realizes why a new common language.</p>
                    </div>
                  </div>
                </div>
              </a>

              <a href="javascript: void(0);" class="text-reset notification-item">
                <div class="media">
                  <div class="position-relative mr-2">
                    <img src="../assets/images/users/user-4.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                    <i class="mdi mdi-circle user-status away"></i>
                  </div>
                  <div class="media-body overflow-hidden">
                    <h6 class="mt-0 mb-1 font-14">Charles Deakin</h6>
                    <div class="font-13 text-muted">
                      <p class="mb-0 text-truncate">The languages only differ in their grammar.</p>
                    </div>
                  </div>
                </div>
              </a>

              <a href="javascript: void(0);" class="text-reset notification-item">
                <div class="media">
                  <div class="position-relative mr-2">
                    <img src="../assets/images/users/user-5.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                    <i class="mdi mdi-circle user-status online"></i>
                  </div>
                  <div class="media-body overflow-hidden">
                    <h6 class="mt-0 mb-1 font-14">Ryan Salting</h6>
                    <div class="font-13 text-muted">
                      <p class="mb-0 text-truncate">If several languages coalesce the grammar of the resulting.</p>
                    </div>
                  </div>
                </div>
              </a>

              <a href="javascript: void(0);" class="text-reset notification-item">
                <div class="media">
                  <div class="position-relative mr-2">
                    <img src="../assets/images/users/user-6.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                    <i class="mdi mdi-circle user-status online"></i>
                  </div>
                  <div class="media-body overflow-hidden">
                    <h6 class="mt-0 mb-1 font-14">Sean Howse</h6>
                    <div class="font-13 text-muted">
                      <p class="mb-0 text-truncate">It will seem like simplified English.</p>
                    </div>
                  </div>
                </div>
              </a>

              <a href="javascript: void(0);" class="text-reset notification-item">
                <div class="media">
                  <div class="position-relative mr-2">
                    <img src="../assets/images/users/user-7.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                    <i class="mdi mdi-circle user-status busy"></i>
                  </div>
                  <div class="media-body overflow-hidden">
                    <h6 class="mt-0 mb-1 font-14">Dean Coward</h6>
                    <div class="font-13 text-muted">
                      <p class="mb-0 text-truncate">The new common language will be more simple.</p>
                    </div>
                  </div>
                </div>
              </a>

              <a href="javascript: void(0);" class="text-reset notification-item">
                <div class="media">
                  <div class="position-relative mr-2">
                    <img src="../assets/images/users/user-8.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                    <i class="mdi mdi-circle user-status away"></i>
                  </div>
                  <div class="media-body overflow-hidden">
                    <h6 class="mt-0 mb-1 font-14">Hayley East</h6>
                    <div class="font-13 text-muted">
                      <p class="mb-0 text-truncate">One could refuse to pay expensive translators.</p>
                    </div>
                  </div>
                </div>
              </a>

              <div class="text-center mt-3">
                <a href="javascript:void(0);" class="btn btn-sm btn-white">
                  <i class="mdi mdi-spin mdi-loading mr-2"></i>
                  Load more
                </a>
              </div>
            </div>

          </div>

          <div class="tab-pane" id="tasks-tab" role="tabpanel">
            <h6 class="font-weight-medium p-3 m-0 text-uppercase">Working Tasks</h6>
            <div class="px-2">
              <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                <p class="text-muted mb-0">App Development<span class="float-right">75%</span></p>
                <div class="progress mt-2" style="height: 4px;">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </a>

              <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                <p class="text-muted mb-0">Database Repair<span class="float-right">37%</span></p>
                <div class="progress mt-2" style="height: 4px;">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 37%" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </a>

              <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                <p class="text-muted mb-0">Backup Create<span class="float-right">52%</span></p>
                <div class="progress mt-2" style="height: 4px;">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 52%" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </a>
            </div>

            <h6 class="font-weight-medium px-3 mb-0 mt-4 text-uppercase">Upcoming Tasks</h6>

            <div class="p-2">
              <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                <p class="text-muted mb-0">Sales Reporting<span class="float-right">12%</span></p>
                <div class="progress mt-2" style="height: 4px;">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: 12%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </a>

              <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                <p class="text-muted mb-0">Redesign Website<span class="float-right">67%</span></p>
                <div class="progress mt-2" style="height: 4px;">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </a>

              <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                <p class="text-muted mb-0">New Admin Design<span class="float-right">84%</span></p>
                <div class="progress mt-2" style="height: 4px;">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 84%" aria-valuenow="84" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </a>
            </div>

            <div class="p-3 mt-2">
              <a href="javascript: void(0);" class="btn btn-success btn-block waves-effect waves-light">Create Task</a>
            </div>

          </div>
          <div class="tab-pane active" id="settings-tab" role="tabpanel">
            <h6 class="font-weight-medium px-3 m-0 py-2 font-13 text-uppercase bg-light">
              <span class="d-block py-1">Theme Settings</span>
            </h6>

            <div class="p-3">
              <div class="alert alert-warning" role="alert">
                <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
              </div>

              <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Color Scheme</h6>
              <div class="custom-control custom-switch mb-1">
                <input type="radio" class="custom-control-input" name="color-scheme-mode" value="light"
                id="light-mode-check" checked />
                <label class="custom-control-label" for="light-mode-check">Light Mode</label>
              </div>

              <div class="custom-control custom-switch mb-1">
                <input type="radio" class="custom-control-input" name="color-scheme-mode" value="dark"
                id="dark-mode-check" />
                <label class="custom-control-label" for="dark-mode-check">Dark Mode</label>
              </div>

              <!-- Width -->
              <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Width</h6>
              <div class="custom-control custom-switch mb-1">
                <input type="radio" class="custom-control-input" name="width" value="fluid" id="fluid-check" checked />
                <label class="custom-control-label" for="fluid-check">Fluid</label>
              </div>
              <div class="custom-control custom-switch mb-1">
                <input type="radio" class="custom-control-input" name="width" value="boxed" id="boxed-check" />
                <label class="custom-control-label" for="boxed-check">Boxed</label>
              </div>

              <!-- Menu positions -->
              <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Menus (Leftsidebar and Topbar) Positon</h6>

              <div class="custom-control custom-switch mb-1">
                <input type="radio" class="custom-control-input" name="menus-position" value="fixed" id="fixed-check"
                checked />
                <label class="custom-control-label" for="fixed-check">Fixed</label>
              </div>

              <div class="custom-control custom-switch mb-1">
                <input type="radio" class="custom-control-input" name="menus-position" value="scrollable"
                id="scrollable-check" />
                <label class="custom-control-label" for="scrollable-check">Scrollable</label>
              </div>

              <!-- Left Sidebar-->
              <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Color</h6>

              <div class="custom-control custom-switch mb-1">
                <input type="radio" class="custom-control-input" name="leftsidebar-color" value="light" id="light-check" checked />
                <label class="custom-control-label" for="light-check">Light</label>
              </div>

              <div class="custom-control custom-switch mb-1">
                <input type="radio" class="custom-control-input" name="leftsidebar-color" value="dark" id="dark-check" />
                <label class="custom-control-label" for="dark-check">Dark</label>
              </div>

              <div class="custom-control custom-switch mb-1">
                <input type="radio" class="custom-control-input" name="leftsidebar-color" value="brand" id="brand-check" />
                <label class="custom-control-label" for="brand-check">Brand</label>
              </div>

              <div class="custom-control custom-switch mb-3">
                <input type="radio" class="custom-control-input" name="leftsidebar-color" value="gradient" id="gradient-check" />
                <label class="custom-control-label" for="gradient-check">Gradient</label>
              </div>

              <!-- size -->
              <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Size</h6>

              <div class="custom-control custom-switch mb-1">
                <input type="radio" class="custom-control-input" name="leftsidebar-size" value="default"
                id="default-size-check" checked />
                <label class="custom-control-label" for="default-size-check">Default</label>
              </div>

              <div class="custom-control custom-switch mb-1">
                <input type="radio" class="custom-control-input" name="leftsidebar-size" value="condensed"
                id="condensed-check" />
                <label class="custom-control-label" for="condensed-check">Condensed <small>(Extra Small size)</small></label>
              </div>

              <div class="custom-control custom-switch mb-1">
                <input type="radio" class="custom-control-input" name="leftsidebar-size" value="compact"
                id="compact-check" />
                <label class="custom-control-label" for="compact-check">Compact <small>(Small size)</small></label>
              </div>

              <!-- User info -->
              <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Sidebar User Info</h6>

              <div class="custom-control custom-switch mb-1">
                <input type="checkbox" class="custom-control-input" name="leftsidebar-user" value="fixed" id="sidebaruser-check" />
                <label class="custom-control-label" for="sidebaruser-check">Enable</label>
              </div>


              <!-- Topbar -->
              <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Topbar</h6>

              <div class="custom-control custom-switch mb-1">
                <input type="radio" class="custom-control-input" name="topbar-color" value="dark" id="darktopbar-check"
                checked />
                <label class="custom-control-label" for="darktopbar-check">Dark</label>
              </div>

              <div class="custom-control custom-switch mb-1">
                <input type="radio" class="custom-control-input" name="topbar-color" value="light" id="lighttopbar-check" />
                <label class="custom-control-label" for="lighttopbar-check">Light</label>
              </div>


              <button class="btn btn-primary btn-block mt-4" id="resetBtn">Reset to Default</button>

            </div>

          </div>
        </div>

      </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!--  Set Modals -->
    <?php
    include 'modalView/Addakun.php';
    include 'modalView/Edit-akun-perorang.php';
    include 'modalView/modal-edit-password.php';
    include 'modalView/addCategory.php';
    include 'modalView/addJenis.php';
    include 'modalView/AddBarcode.php';
    include 'modalView/EditBarcode.php';
    include 'modalView/AddSatuan.php';
    include 'modalView/info.php';
    ?>

    <script type="text/javascript">

    $(document).keypress(function(event){
        if(event.which == 43){
         $('#addCart').click(); //Menjalankan Tombol add cart
        }else if(event.which == 42){
          $('#saveCart').click();//Menjalankan Tombol Simpan ke keranjang
        }else if(event.which == 45 ){
          $('#bayar').click();//Menjalankan Tombol Bayar
        }else if(event.which == 47){
          $('#bayarCetak').click();
        }
     });    


      window.setTimeout(function(){
        $(".alert").fadeTo(200, 0).slideUp(200, function(){
          $(this).remove();
        })

      }, 3000);

      

    </script>

    <!-- <script src="assets/js/libs/jquery/jquery.min.js"></script> -->







    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>


    <!-- Alert -->
    <!-- <script src="assets/js/pages/sweet-alerts.init.js"></script> -->
    <!-- <script src="assets/libs/jquery/jquery.min.js"></script> -->


    <link rel="stylesheet" type="text/css" href="assets/plugin/datetimepicker/jquery.datetimepicker.css"/>
    <script src="assets/plugin/datetimepicker/jquery.datetimepicker.js"></script>



    <!-- Summernote js -->
    <script src="assets/libs/summernote/summernote-bs4.min.js"></script>
    <!-- Select2 js-->
    <script src="assets/libs/select2/js/select2.min.js"></script>


    <!-- Init js-->
    <script src="assets/js/pages/form-fileuploads.init.js"></script>

    <!-- Init js -->
    <script src="assets/js/pages/add-product.init.js"></script>

    <!-- Plugins js-->
    <script src="assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <script src="assets/libs/selectize/js/standalone/selectize.min.js"></script>

    <!-- doar 1 init js-->
    <script src="assets/js/pages/dashboard-1.init.js"></script>

    <!-- App js-->
    <script src="assets/js/app.min.js"></script>

  <!--
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

  <script>



    $(document).ready(function(){

      $('#bayar').click(function(){
        var cek_cart = $('#tunai').val();
          if (cek_cart == '') {

            alert('Belanjaan Kosong!, mohon diperiksa kembali');
            
          }
      });

      var i = $("#bayar-tampil").val();
      $('#bayar-total').html(i);


       //selesai();

       var notif = $('#notif').val();
       $("#jumlah_notif").html(notif);





       $("#cari").click(function(){
        var from = $("#from").val();
        var to   = $("#to").val();


        if (from =='' || to == '') {
          alert('Paramter tanggal kosong!');
        }else{

          $("#tanggal").html("Tanggal : From :" + " " + from + "-" + "To :" + " " + to);
          cari_laporan();

        }
      });

       $("#simpan-info").click(function(){
        var txt = $('#info-txt').val();

        $.ajax({
          typo  : 'POST',
          url   : 'config/info.php?info=' + txt,
          cache : false,
          success : function(data){
            if (data) {
              alert('Berhasil');

            }
          }
        });
      });

       $("#tampil").load("kasir/tampil.php");
       $("#tampilkan-laporan").load("owner/report/tampil.php");
       $("#tampilkan_laporan_barang_masuk").load("owner/barang_masuk/tampil.php");

      //  $('#tanggal').datetimepicker({
      //    lang:'en',
      //    timepicker:true,
      //    format:'Y-m-d H:i:s'
      //  });


       $("#btn-bayar-cetak").click(function(){

        bayar_cetak();
      });




       $("#bayar").click(function(){
        var b = $("#bayar-tampil").val();
        var c = $("#nota").val();
        var tunai = $("#tunai").val();
        $("#VIEWBAYAR").html(b);
        $("#uangBayar").val(tunai);
        $("#modal-nota").val(c);

      });

      //  $("#btneditkeranjang").click(function(){
      //   editKeranjang();
      // });

       $("#simpanCart").click(function(){

        var jum = $("#jumlah_beli").val();
        var code = $("#kode_barang").val();
       

        if (code !="" && jum !="") {
         tambatampil();
         update();

       }else{
        alert("ID Barcode dan nomilai belanja #tidak boleh kosong");
        code.focus();
      }
    });


       $(document).on('keyup', '#UangCash', function(){
         HitungTotalKembalian();
        //  HitungTotalKembalian_no_rp();
       });


       $(document).on('keyup','#jumlah_beli', function(){

        cekjumlah_beli();
      });

       $('#jumlah_beli').onChange(function(){
        alert('apa');
      });

$(document).on('keyup','change','#jumlah_beli', function(){

  cekjumlah_beli();
});


});


    $("#cetak").click(function(){
     window.location = "kasir/tnx_fix.php?cetak="+$("#no-nota").val();
   });


    $('#btn-edit-car').click(function(){
        alert('sajs');
    });



    $('#btn-edit-car').click(function(){
     EditCart();

   });

    $("#btn-hapus-car").click(function(){

    });

   $('#AddCart').on('shown.bs.modal',function(){
      $('#kode_barang').focus();
    })

    $('#Modelbayar').on('shown.bs.modal',function(){
      $('#UangCash').focus();
    })


       
   

  </script>


</body>
</html>
