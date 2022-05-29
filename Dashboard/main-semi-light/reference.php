<?php 
include '../../config.php';

session_start();

if(!isset($_SESSION["id"])){
  header("Location: ../../index/login.php");
}

$id = $_SESSION['id'];

    $ref_code=mysqli_query($con,"SELECT reference_id from users where id = $id");
    $ref_result =mysqli_fetch_assoc($ref_code);
    $ref_code = $ref_result['reference_id'];
    $msg = '';

    if(isset($_POST['refer'])){
        $reference_code = $_POST['reference_code'];
        $today = date("F j, Y, g:i a"); 

        $sql = mysqli_query($con,"SELECT * from users WHERE reference_id = '$reference_code'");
        $sql1 = mysqli_query($con,"SELECT * from reference WHERE user_id = $id AND reference_id = '$reference_code'");
        if(mysqli_num_rows($sql)){
            if(mysqli_num_rows($sql1) == 0){
              if($reference_code != $ref_code){
                mysqli_query($con,"INSERT INTO `reference`(`user_id`,`reference_id`,`timestamp`) VALUES ('$id','$reference_code','$today')");
              }
              else{
                $msg = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;
                text-align:center;'>You can not use your reference code</p>";
              }
        }
        else{
            $msg = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;
            text-align:center;'>Already exist</p>";
        }
    }
        else{
            $msg ="<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;
            text-align:center;'>Please Enter Valid Reference Code!!!</p>";
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
        Payment
    </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="css/vendors_css.css" />
    <!--amcharts -->
    <link href="https://www.amcharts.com/lib/3/plugins/export/export.css" rel="stylesheet" type="text/css" />

    <!-- Style-->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/skin_color.css" />
    <link rel="stylesheet" href="css/custom2.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <style>
      #code {
        cursor: pointer;
      }
      @media only screen and (max-width: 600px) {

        .row {
          --bs-gutter-x: 0 !important;
          margin-right: -25px !important;
          margin-left: -15px !important;
        }
        
      }
    </style>
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
              <h3 class="title text-bold text-center" style="color: white; font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">Peradot</h3>
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
                            <li class="">
                                <a href="index.php">
                                    <i data-feather="monitor"></i>
                                    <span>Dashboard</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="">
                                <a href="payment.php">
                                    <i data-feather="bar-chart-2"></i>
                                    <span>Transactions</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="active">
                              <a href="reference.php">
                                  <i data-feather="share-2" ></i>
                                  <span>Reference</span>
                                  <span class="pull-right-container">
                                      <i class="fa fa-angle-right pull-right"></i>
                                  </span>
                              </a>
                          </li>
                        </ul>

                        <div class="sidebar-widgets mt-5">
                            <div class="mx-25 mt-30 p-30 text-center bg-primary-light rounded5">
                                <img src="../images/trophy.png" alt="" />
                                <h4 class="my-3 fw-500 text-uppercase text-primary">
                                    Start Trading
                                </h4>
                                <span class="fs-12 d-block mb-3 text-black-50">Offering discounts for better online a
                                    store can loyalty
                                    weapon into driving</span>
                                <button type="button" class="waves-effect waves-light btn btn-sm btn-primary mb-5">
                                    Invest Now
                                </button>
                            </div>
                            <div class="copyright text-center m-25">
                                <p>
                                    <strong class="d-block"> Peradot</strong> ©
                                    2022 All Rights Reserved
                                </p>
                            </div>
                        </div>
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
                                    <div class="d-flex top_box justify-content-center text-center my-2">
                                        <h3 class="m-0">Your Reference Code: </h3>

                                    </div>
                                </div>
                                <div class="col-xl-6 text-center my-2">

                                <h1 class="fw-500 m-0" id="code" ><?php echo $ref_code ?>
                                <i class="mx-3 mdi mdi-checkbox-multiple-blank-outline btn-rounded btn-success down_box">
                                        </i>
                                      
                                </h1>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-55">
                            <div class="col-xl-12 col-sm-12">
                               <div class="row justify-content-center">
                                   <div class="col-xl-6 col-sm-12">
                                   <div class="card vh-auto">
                                        <div class="card-header">
                                            <h1 class="card-title text-dark fw-500">Refered Users</h1>
                                        </div>
                                        <div class="card-body" style="overflow: scroll;">
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>User id</th>
                                                            <th>Reference Code</th>
                                                            <th>Done</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        // $user_id= $_SESSION["user_id"];
                                                        $res=mysqli_query($con,"SELECT * FROM reference WHERE user_id = '$id'");                                    // die();
                                                        $i=1;
                                                        while($row=mysqli_fetch_assoc($res)){
                                                        
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $i++ ?></td>
                                                            <td><?php echo $row['user_id']?></td>
                                                            <td><?php echo $row['reference_id']?></td>
                                                            <td><i
                                            class="mx-3 mdi mdi-checkbox-marked-circle btn-rounded btn-success down_box">
                                        </i></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                  
                                                </table>
                                        </div>
                                        
                                    </div>
                                    </div>
                                    <div class="col-xl-6">
                                    <div class="card vh-auto">
                                    <div class="card-header">
                                            <h1 class="card-title text-dark fw-500">Reference Code </h1>
                                        </div>
                                        <form action="" method = "post">
                                        <div class="card-body">
                                            <h5>Enter referral code</h5>
                                            <h4 class="msg"><?php echo $msg ?></h4>
                                            <div class="d-flex justify-content-end bg-light rounded p-30 mx-10 my-15">
                                                <input type="text" class="form-control" name="reference_code"placeholder="referral code">
                                                <input type="submit" class="btn btn-primary" name="refer" value="submit">
                                            </div>
                                            <hr>

                
                                        </div>
                                        </form>
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
		    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
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
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
    $('#example').DataTable({searching: false});
});
    </script>
</body>

</html>