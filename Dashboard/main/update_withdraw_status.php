<?php
include '../../config.php';
include '../../function.php';


if(!isset($_SESSION["id"])){
  header("Location: ../../index/login.php");
}

                  


$error = "";
$id = $_SESSION['id'];


if(isset($_GET['id']) && $_GET['id'] != ''){
    $user_id= mysqli_real_escape_string($con,$_GET['id']);
    $res=mysqli_query($con,"SELECT * FROM withdraw WHERE user_id='$user_id'");
    $check=mysqli_num_rows($res);
    if($check>0){
     
        $row=mysqli_fetch_assoc($res);
        $amount = $row['w_amount'];
        $status = $row['status'];
        $metamaskid = $row['metamaskID'];
        $time = $row['timestamp'];
        $user_rid = $row['user_id'];
                  $sql_rid = "SELECT * FROM users WHERE id = '$user_rid'";
                  $res_rid = mysqli_query($con,$sql_rid);
                  $row_rid = mysqli_fetch_row($res_rid);
                  $new_username = $user_rid." - " . $row_rid[1];
    }else {
      $error = "<h2 class='text-warning'>Something went wrong <br> Please go back and try again</h2>";
  }
} 

if(isset($_POST['submit'])){
    $new_amount = mysqli_real_escape_string($con, $_POST["amount"]);
    $new_status = mysqli_real_escape_string($con, $_POST["status"]);

    $user_id= mysqli_real_escape_string($con,$_GET['id']);
    $sql = "UPDATE withdraw SET w_amount= '$new_amount',status = '$new_status' WHERE user_id = $user_id";
    $result = mysqli_query($con, $sql);
            if ($result) {
                header('location: ./admin.php');
                
            } else {
               alert("Opps Something went wrong, Unable to update... Try again later");
            }

    if($new_status == 'confirm') {

        $user_sql = mysqli_query($con,"UPDATE `users` SET `withdraw`= withdraw + $new_amount  WHERE id = $user_id");
    
        // unlink("uploads/$img");
        $admin_sql = mysqli_query($con,"DELETE FROM `withdraw` WHERE user_id = $user_id");
        alert("Deposite has been confirmed");
        $history_sql = mysqli_query($con,"INSERT INTO `history` (`user_id`,`user`, `metamaskid`,`timestamp`, `status`,`withdraw` ) VALUES ('$user_rid','$row_rid[1]', '$metamaskid','$time', '$new_status','$new_amount')");
    }elseif($new_status == 'Reject'){
        $admin_sql = mysqli_query($con,"DELETE FROM `withdraw` WHERE user_id = $user_id");
        alert("Deposite has been confirmed");
        $history_sql = mysqli_query($con,"INSERT INTO `history` (`user_id`,`user`, `metamaskid`,`timestamp`, `status`,`withdraw` ) VALUES ('$user_rid','$row_rid[1]', '$metamaskid','$time', '$new_status','$new_amount')");
    } else {
        
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
                                <a href="index.php">
                                    <i data-feather="monitor"></i>
                                    <span>Dashboard</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="#">
                                    <i data-feather="bar-chart-2"></i>
                                    <span>Transactions</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="">
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
                                    Invest your Savings
                                </h4>
                                <span class="fs-12 d-block mb-3 text-black-50">Check out the best packages for you with high returns </span>
                                <a href="index.php#price"><button type="button" class="waves-effect waves-light btn btn-sm btn-primary mb-5">
                                    Select Package
                                </button></a>
                            </div>
                            <div class="copyright text-center m-25">
                                <p>
                                    <strong class="d-block"> Comapny Name</strong> ©
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
            <div class="container">
                <h2 class="title text-center my-50">Update Transaction Detail and Status <br> ( 
                  <?php
                  
                  echo $new_username;

                  ?>
                  
                  )</h2>
                <?php echo $error; ?>
                <hr>
                <!-- Main content -->
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Amount:</label>
                        <input type="text" name="amount" class="form-control" id="exampleInputEmail1" placeholder="Amount" required>
                    </div>
                    <div class="form-group">
                        <select name="status" style="width:72vw;padding:7px;border-radius:5px;border:1px solid #86a4c3;" required>
                            <option selected disabled value="">Pending</option>
                            <option>Reject</option>
                            <option>confirm</option>
                        </select>
                    </div>
                    <div class="d-flex mx-5 bg-light rounded justify-content-center">
                        <img src="uploads/<?php echo $img  ?>" width="500">
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary btn-lg mx-5 mt-5 mb-0">Submit</button>
                    
                  </form>
                  <a href="admin.php"><button name="cancel" class="btn btn-secondary btn-lg mx-5 mt-1 mt-0">Cancel</button></a>
                  
                
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