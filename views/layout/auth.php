<?php
use app\core\Application;
?>
<!--
=========================================================
* Material Kit 3 - v3.1.0
=========================================================

* Product Page:  https://www.creative-tim.com/product/material-kit
* Copyright 2024 Creative Tim (https://www.creative-tim.com)
* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <link rel="stylesheet" href="../assets/js/plugins/toastr/toastr.min.css">
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/js/plugins/toastr/toastr.min.js"></script>
    <script src="../assets/js/plugins/toastr/toastr-options.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->

  <!-- Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- CSS Files -->

  <link id="pagestyle" href="../assets/css/material-kit.css?v=3.1.0" rel="stylesheet" />
</head>

<body class="sign-in-basic">
<?php
Application::$app->session->showSuccessNotification();
Application::$app->session->showErrorNotification();

?>
  <!-- Navbar Transparent -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">
    <div class="container">
        <?php

        if(Application::$app->session->get('user')){
            echo '
             <a href="../" class="navbar-brand  text-white ">
                                <span>Home</span>
                            </a>
            ';
            echo '<a class = "navbar-brand  text-white " href ="/processLogout">log out</a> ';
        }
        else{
            echo '<a class = "navbar-brand  text-white " href ="/login">sign in</a> ';
        }
        ?>


      </div>

  </nav>
  <!-- End Navbar -->
  <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');" loading="lazy">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">

            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">

                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">  {{ RENDER_SECTION }}  </h4>
                <div class="row mt-3">
                  <div class="col-2 text-center ms-auto">
                    <a class="btn btn-link px-3" href="javascript:;">
                      <i class="fa fa-facebook text-white text-lg"></i>
                    </a>
                  </div>
                  <div class="col-2 text-center px-1">
                    <a class="btn btn-link px-3" href="javascript:;">
                      <i class="fa fa-github text-white text-lg"></i>
                    </a>
                  </div>
                  <div class="col-2 text-center me-auto">
                    <a class="btn btn-link px-3" href="javascript:;">
                      <i class="fa fa-google text-white text-lg"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>


                </p>
              </form>
            </div>
          </div>
        </div>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="../assets/js/material-kit.min.js?v=3.1.0" type="text/javascript"></script>
</body>

</html>