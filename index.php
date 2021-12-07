<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Daftar Lagu
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="./assets/dashboard/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/dashboard/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/dashboard/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">

  <?php
  define("ALLOWED", true);
  require_once "libraries/koneksi.php";
  require_once "libraries/fungsi.php";
  ?>



  <?php if (isset($_SESSION['is_logged_in'])) { ?>
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
      <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <p class="navbar-brand text-center">
          <span class="ms-1 font-weight-bold text-white">Dashboard Musik</span>
          </>
      </div>
      <hr class="horizontal light mt-0 mb-2">
      <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white" href="?page=genre_list">
              <i class="material-icons opacity-10">dashboard</i>
              <span class="nav-link-text ms-1">Genre Lagu</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="#">
              <i class="material-icons opacity-10">table_view</i>
              <span class="nav-link-text ms-1">Tables</span>
            </a>
          </li>
        </ul>
      </div>
    </aside>
  <?php }; ?>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 justify-content-end" id="navbar">
        <?php if (isset($_SESSION['is_logged_in'])) { ?>
          <a href="?page=logout" class="nav-link text-body font-weight-bold pr-2">
            <i class="fa fa-user me-sm-1"></i>
            <span class="d-sm-inline d-none">Logout</span>
          </a>
        <?php } ?>
      </div>
    </nav>
    <!-- End Navbar -->



    <?php

    if (isset($_GET['page']) == false) {
      // tidak ada page
      $halaman = 'home';
      // exit;
    } else {
      // ada page
      $halaman = $_GET['page'];
      // var_dump($halaman);die;
      // cek apakah halaman tersedia
      if (file_exists("pages/" . $halaman . ".php") == false) {


        $halaman = '404';
      }
    }

    $page_public = ['login', 'login_proses'];

    // pengecekan auth
    if (in_array($halaman, $page_public) == false) {
      // harus diproteksi (harus login)
      if (isset($_SESSION['is_logged_in']) == false) {
        // belum login nih
        redirect('?page=login&err=2');
      }
    }



    require_once "pages/" . $halaman . ".php"
    ?>



    </div>
    </div>
    </div>
    </div>
    <footer class="footer py-4  ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              ©
              <script>
                document.write(new Date().getFullYear())
              </script>,
              made with <i class="fa fa-heart"></i> by
              <span class="font-weight-bold">Solo Lord</span>
              for a better semester.
            </div>
          </div>
        </div>
      </div>
    </footer>


  </main>
  <!--   Core JS Files   -->
  <script src="./assets/dashboard/js/core/popper.min.js"></script>
  <script src="./assets/dashboard/js/core/bootstrap.min.js"></script>
  <script src="./assets/dashboard/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/dashboard/js/plugins/smooth-scrollbar.min.js"></script>
  <!-- <script src="./assets/dashboard/js/plugins/chartjs.min.js"></script> -->

  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/dashboard/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>