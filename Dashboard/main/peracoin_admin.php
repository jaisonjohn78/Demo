<?php
include '../../config.php';
include '../../function.php';

$fetch_chart = mysqli_query($con, "SELECT * FROM peracoin");
$timestamp = time();
$msg = "";

if(isset($_POST['price'])) {
  $open = $_POST['open'];
  $high = $_POST['high'];
  $low = $_POST['low'];
  $close = $_POST['close'];

  $price = $_POST['current'];

  // UPDATE `price` SET `price` = '5' WHERE `price`.`id` = 1; 
  $insert_chart = mysqli_query($con, "INSERT INTO peracoin (timestamp, open, high, low, close) VALUES ('$timestamp', '$open', '$high', '$low', '$close')");
  if($insert_chart) {
    $msg = "<div style='color: green;'>successfuly inserted</div>";
    
  $data = array(
    floatval($timestamp),
    floatval($high),
    floatval($open),
    floatval($close),
    floatval($low)
  );

$inp = file_get_contents('results.json');
$tempArray = json_decode($inp);
array_push($tempArray, $data);
$jsonData = json_encode($tempArray);
file_put_contents('results.json', $jsonData);
  } else {
    $msg = "<div style='color: red;'>Oops Something went wrong !!<div>";
  }

  
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>
        Admin Panel
    </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="css/vendors_css.css" />
    <!--amcharts -->
    <link href="https://www.amcharts.com/lib/3/plugins/export/export.css" rel="stylesheet" type="text/css" />

    <!-- Style-->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/skin_color.css" />
    <link rel="stylesheet" href="css/custom2.css" />
</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
    <div class="wrapper">
        <div id="loader"></div>

        <header class="main-header">
        <div class="d-flex align-items-center logo-box justify-content-start">
          <!-- Logo -->
          <a href="index.php" class="logo" style="text-decoration: none;">
            <!-- logo-->
            <div class="logo-mini w-40 m-auto">
              <span class="light-logo"
                ><img src="../images/logo.png" alt="logo"
              /></span>
              <span class="dark-logo"
                ><img src="../images/logo.png" alt="logo"
              /></span>
            </div>
            <div class="logo-lg align-items-center m-auto ">
              <h3 class="title text-bold text-center" style="color: white; font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">Peradot Admin</h3>
            </div>
          </a>
        </div>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
              <!-- Sidebar toggle button-->
              <div class="app-menu">
                <ul class="header-megamenu nav">
                  <li class="btn-group nav-item">
                    <a
                      href="#"
                      class="waves-effect waves-light nav-link push-btn btn-primary-light"
                      data-toggle="push-menu"
                      role="button"
                    >
                      <i data-feather="align-left"></i>
                    </a>
                  </li>
                  <li class="btn-group nav-item d-none d-xl-inline-block">
                    <a
                      href=""
                      class="waves-effect waves-light nav-link svg-bt-icon btn-primary-light"
                      title="Mailbox"
                    >
                      <i data-feather="at-sign"></i>
                    </a>
                  </li>
                </ul>
              </div>
    
              <div class="navbar-custom-menu r-side">
                <ul class="nav navbar-nav">
                  
                  <li class="btn-group nav-item d-lg-inline-flex d-none">
                    <a
                      href="#"
                      data-provide="fullscreen"
                      class="waves-effect waves-light nav-link full-screen btn-primary-light"
                      title="Full Screen"
                    >
                      <i data-feather="maximize"></i>
                    </a>
                  </li>
        
    
                  <!-- User Account-->
                  <li class="dropdown user user-menu">
                            <a href="#" class="waves-effect waves-light dropdown-toggle btn-primary-light"
                                data-bs-toggle="dropdown" title="User">
                                <i data-feather="user"></i>
                            </a>
                            <ul class="dropdown-menu animated flipInX">
                                <li class="user-body">
                                    <a class="dropdown-item" href="../../index.html"><i class="ti-home text-muted me-2"></i>
                                        Home</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php"><i class="ti-lock text-muted me-2"></i>
                                        Logout</a>
                                </li>
                            </ul>
                        </li>
    
      
                </ul>
              </div>
            </nav>
          </header>

        <aside class="main-sidebar">
            <!-- sidebar-->
            <section class="sidebar position-relative">
                <div class="multinav">
                    <div class="multinav-scroll" style="height: 100%">
                        <!-- sidebar menu-->
                        <ul class="sidebar-menu" data-widget="tree">
                            <li class="">
                                <a href="admin.php">
                                    <i data-feather="monitor"></i>
                                    <span>Dashboard</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="">
                                <a href="user.php">
                                    <i data-feather="user-check"></i>
                                    <span>Users</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="">
                                <a href="history.php">
                                <i data-feather="clock" ></i>
                                    <span>History</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="active">
                                <a>
                                <i data-feather="dollar-sign" ></i>
                                    <span>Peracoin</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>

                        
                    </div>
                </div>
            </section>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Main content -->
                <section class="content">
                  <div class="row">
                              
                              <div class="col-12 text-center my-2">

                                  <h1 class="fw-500 m-0 text-center"><i
                                          class="mx-3 mdi mdi-currency-usd btn-rounded btn-info down_box">
                                      </i> Peracoin Rates</h1>
                                      <h1><?php echo $msg; ?></h1>
                              </div>
                          </div>
                    <div class="row">

                        <div class="row mt-5">
                            <div class="col-xl-12">
                               <div class="row">
                                   <div class="col-xl-12">
                                    <div class="card vh-auto">
                                        <div class="card-header">
                                            <h1 class="card-title text-dark fw-500">Peracoin </h1>
                                            <h2>Current Price : $5.16 </h2>
                                        </div>
                                        <form method="POST">
                                        <div class="card-body">
                                          



                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend ms-3">
                                              <span class="input-group-text">$</span>
                                          </div>
                                          <input type="text" class="form-control" name="high" aria-label="Amount (to the nearest dollar)" required>
                                          <div class="input-group-append">
                                            <span class="input-group-text bg-success">High Price</span>
                                          </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend ms-3">
                                              <span class="input-group-text">$</span>
                                          </div>
                                          <input type="text" class="form-control" name="close" aria-label="Amount (to the nearest dollar)" required>
                                          <div class="input-group-append">
                                            <span class="input-group-text bg-danger">Close Price</span>
                                          </div>
                                        </div>



                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend ms-3">
                                              <span class="input-group-text">$</span>
                                          </div>
                                          <input type="text" class="form-control" name="low" aria-label="Amount (to the nearest dollar)" required>
                                          <div class="input-group-append">
                                            <span class="input-group-text bg-success">Open Price</span>
                                          </div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend ms-3">
                                              <span class="input-group-text">$</span>
                                          </div>
                                          <input type="text" class="form-control" name="open" aria-label="Amount (to the nearest dollar)" required>
                                          <div class="input-group-append">
                                            <span class="input-group-text bg-danger">low Price</span>
                                          </div>
                                        </div>


                                        

                                        <div class="input-group mb-3 ">
                                            <div class="input-group-prepend ms-3">
                                              <span class="input-group-text">$</span>
                                          </div>
                                          <input type="text" class="form-control" name="current" aria-label="Amount (to the nearest dollar)" required style="font-size: 2.4rem;">
                                          <div class="input-group-append">
                                            <span class="input-group-text bg-info">Current Market Price</span>
                                          </div>
                                        </div>



                                        <center><input type="submit" name="price" class="btn btn-primary btn-lg btn-block" ></center>
                                        </div>
                                        </form>
                                        
                                    </div>
                                    
                               </div>
                            </div>
                            </div>
                <!-- /.content -->
            </div>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right d-none d-sm-inline-block">
                <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" target="_blank">Contact</a>
                    </li>
                </ul>
            </div>
            &copy; 2022
            <a href="">Peradot Pvt Ltd</a>.
            All Rights Reserved.
        </footer>



        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->

        <!-- ./wrapper -->


        <!-- Page Content overlay -->

        <!-- Custom JS -->
        <!-- Vendor JS -->
        <script src="js/vendors.min.js"></script>
        <script src="js/pages/chat-popup.js"></script>
        <script src="../assets/icons/feather-icons/feather.min.js"></script>

        <script src="../assets/vendor_components/Web-Ticker-master/jquery.webticker.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

        <!-- Crypto Admin App -->
        <script src="js/template.js"></script>
        <script src="js/pages/dashboard2.js"></script>
        <script src="js/pages/dashboard2-chart.js"></script>
</body>

</html>