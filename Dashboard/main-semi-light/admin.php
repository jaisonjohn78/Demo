<?php
include '../../config.php';
include '../../function.php';


if(!isset($_SESSION["id"])){
  header("Location: ../../index/login.php");
}

$id = $_SESSION['id'];

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
                    <a
                      href="#"
                      class="waves-effect waves-light dropdown-toggle btn-primary-light"
                      data-bs-toggle="dropdown"
                      title="User"
                    >
                      <i data-feather="user"></i>
                    </a>
                    <ul class="dropdown-menu animated flipInX">
                      <li class="user-body">
                        <a class="dropdown-item" href="#"
                          ><i class="ti-user text-muted me-2"></i> Profile</a
                        >
                        <a class="dropdown-item" href="#"
                          ><i class="ti-wallet text-muted me-2"></i> My Wallet</a
                        >
                        <a class="dropdown-item" href="#"
                          ><i class="ti-settings text-muted me-2"></i> Settings</a
                        >
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php"
                          ><i class="ti-lock text-muted me-2"></i> Logout</a
                        >
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
                            <li class="active">
                                <a href="admin.php">
                                    <i data-feather="monitor"></i>
                                    <span>Dashboard</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#">
                                    <i data-feather="bar-chart-2"></i>
                                    <span>Transactions</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#">
                                <i data-feather="share-2" ></i>
                                    <span>Reference</span>
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
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="d-flex top_box">
                                        <h3 class="m-0">Total Amount</h3>

                                    </div>
                                </div>
                                <div class="col-xl-6 text-center my-2">

                                    <h1 class="fw-500 m-0">$56,456.11<i
                                            class="mx-3 mdi mdi-checkbox-marked-circle btn-rounded btn-success down_box">
                                        </i></h1>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-55">
                            <div class="col-xl-12">
                               <div class="row">
                                   <div class="col-xl-12">
                                    <div class="card vh-auto">
                                        <div class="card-header">
                                            <h1 class="card-title text-dark fw-500">Deposits</h1>
                                        </div>
                                        <div class="card-body">
                                            <div class="">
                                                <!-- no border table  -->
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover" width="100vw !important">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>User id</th>
                                                                <th>Image</th>
                                                                <th>Amount</th>
                                                                <th>Transition Detail</th>
                                                                <th>Timestamp</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        // $user_id= $_SESSION["user_id"];
                                                        $res=mysqli_query($con,"SELECT * FROM deposite");                                    // die();
                                                        $i=1;
                                                        while($row=mysqli_fetch_assoc($res)){
                                                        
                                                    ?>
                                                            <tr>
                                                            <td><?php echo $i++ ?></td>
                                                            <td><?php echo $row['user_id']?></td>
                                                            <?php $link = 'uploads/'.$row["image_path"] ?>
                                                            <td><a style="font-size: 11px" href="<?php echo $link ?>">Open Image</a></td>
                                                            <td><?php echo $row['d_amount']?></td>
                                                            <td><?php echo $row['status']?></td>
                                                            <td><?php echo $row['timestamp']?></td>
                                                                <td>
                                                                  <?php
                                                                    echo "<a href='./update_status.php?id=".$row['user_id']."' class='btn btn-primary btn-md'>
                                                                        <i class='fa fa-pencil'></i>
                                                                    </a>";
                                                                    echo "<a href='#' class='btn btn-danger btn-md'>
                                                                        <i class='fa fa-trash'></i>
                                                                    </a>"
                                                                  ?>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                            </div>
                                            
                                
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-xl-12">
                                    <div class="card vh-auto">
                                        <div class="card-header">
                                            <h1 class="card-title text-dark fw-500">Withdrawals</h1>
                                        </div>
                                        <div class="card-body">
                                            
                                            <div class="">
                                            <div class="table-responsive">
                                                    <table id="example" class="table table-striped table-bordered table-hover" width="100vw !important">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Date</th>
                                                                <th>Amount</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>01/01/2019</td>
                                                                <td>$56,456.11</td>
                                                                <td>Pending</td>
                                                                <td>
                                                                    <a href="#" class="btn btn-primary btn-md">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </a>
                                                                    <a href="#" class="btn btn-danger btn-md">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                            </div>
                                            </div>
                                            

                
                                        </div>
                                    </div>
                                    
                                   </div>
                               </div>
                            </div>
                </section>
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
        <script>
            var loadFile = function(event) {
              var output = document.getElementById('output');
              output.src = URL.createObjectURL(event.target.files[0]);
              output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
              }
            };
        </script>
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