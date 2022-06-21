<?php
include '../../config.php';
include '../../function.php';


if(!isset($_SESSION["id"])){
  header("Location: ../../index/login.php");
}

$id = $_SESSION['id'];
$msg = '';

$user_sql = mysqli_query($con,"SELECT * FROM users WHERE id = $id");
$user_row=mysqli_fetch_assoc($user_sql);

if(isset($_POST['withdraw'])){
  $metamask = $_POST['metamask'];
  $withdraw_amount = $_POST['withdraw_amount'];
  date_default_timezone_set("Asia/Kolkata");
  $today = date("F j, Y, g:i a"); 

  if($user_row['amount'] > $withdraw_amount){
    $meta_insert = $con->query("INSERT into withdraw (user_id,metamaskID,w_amount,timestamp) VALUES ('$id','$metamask','$withdraw_amount','$today')");
    if($meta_insert){
      ?>
      <script>
        alert("Your Withdrawal Request Is Sucessfully Registerd!!!\nPlease Wait For Approval...");
        window.location.href='payment.php';
        </script>
        <?php
    }else{
      ?>
      <script>
        alert("Oops Something Went Wrong. Please Try Again Later!!!");
        window.location.href='payment.php';
        </script>
        <?php
        
    }
  }
  else{
    ?>
    <script>
      alert("Insufficient Withdraw Amount!!!");
      window.location.href = "payment.php";
      </script>
      <?php
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
    body.special:before {
        content: 'Copied to Clipboard!';
        position: sticky;
        left: 0;
        top: 0;
        background: #70b8ff;
        font-weight: bold;
        font-size: medium;
        color: #005f87;
        padding: 1% 6%;
        z-index: 99999;
    }

    @media only screen and (max-width: 525px) {
        input[type="file"] {
            color: transparent;
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
                        <span class="light-logo"><img src="../images/logo.png" alt="logo" /></span>
                        <span class="dark-logo"><img src="../images/logo.png" alt="logo" /></span>
                    </div>
                    <div class="logo-lg align-items-center m-auto ">
                        <h3 class="title text-bold text-center"
                            style="color: white; font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
                            Peradot</h3>
                    </div>
                </a>
            </div>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <div class="app-menu">
                    <ul class="header-megamenu nav">
                        <li class="btn-group nav-item">
                            <a href="#" class="waves-effect waves-light nav-link push-btn btn-primary-light"
                                data-toggle="push-menu" role="button">
                                <i data-feather="align-left"></i>
                            </a>
                        </li>
                        <li class="btn-group nav-item d-none d-xl-inline-block">
                            <a href="" class="waves-effect waves-light nav-link svg-bt-icon btn-primary-light"
                                title="Mailbox">
                                <i data-feather="at-sign"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="navbar-custom-menu r-side">
                    <ul class="nav navbar-nav">

                        <li class="btn-group nav-item d-lg-inline-flex d-none">
                            <a href="#" data-provide="fullscreen"
                                class="waves-effect waves-light nav-link full-screen btn-primary-light"
                                title="Full Screen">
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
                                    <a class="dropdown-item" href="index.php"><i class="ti-user text-muted me-2"></i>
                                        Dashboard</a>
                                    <a class="dropdown-item" href="../../index.html"><i
                                            class="ti-home text-muted me-2"></i>
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
                                    <i data-feather="share-2"></i>
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
                                <span class="fs-12 d-block mb-3 text-black-50">Check out the best packages for you with
                                    high returns </span>
                                <a href="index.php#price"><button type="button"
                                        class="waves-effect waves-light btn btn-sm btn-primary mb-5">
                                        Select Package
                                    </button></a>
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
                                    <div class="d-flex top_box">
                                        <h3 class="my-2">Total Amount</h3>

                                    </div>
                                </div>
                                <div class="col-xl-6 text-center my-2">

                                    <h1 class="fw-500 m-0">
                                        $<?php echo number_format((float)$user_row['amount'], 2, '.', ''); ?><i
                                            class="mx-3 mdi mdi-checkbox-marked-circle btn-rounded btn-success down_box">
                                        </i></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-55">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card vh-auto">
                                        <div class="card-header">
                                            <h1 class="card-title text-dark fw-500">Deposit</h1>
                                        </div>
                                        <div class="card-body mb-5">
                                            <h2>Upload Your Transaction</h2>

                                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                                <div
                                                    class="d-flex justify-content-between bg-light rounded p-20 mx-1 my-10">
                                                    <input type="file" name="file" onchange="loadFile(event)"
                                                        required />
                                                    <input type="submit" class="btn btn-primary" name="submit"
                                                        value="Upload">
                                                </div>
                                            </form>
                                            <h5 class="my-3 text-muted">Upload the Screenshot of your Transaction once
                                                we verify we'll credit the balance into your account</h5>
                                            <img id="output" />
                                            <hr>
                                            <h3 class="text-center">How to find Metamask Address</h3>
                                            <h4 class="text-center">Public Address to Receive (USDT) <br /><br />
                                                <div class="bg-info mx-2 my-5 p-1 bg-light rounded">
                                                    <c1 data-ctc>TPpGx8ghSuzVLxiR28Y6vpW3gx5krVUdjB</c1>
                                                </div>
                                            </h4>
                                            <p class="text-center">

                                                <img class="center mt-50 " src="../images/guide/qrcode.png" width="200">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card vh-auto">
                                        <div class="card-header">
                                            <h1 class="card-title text-dark fw-500">Withdraw</h1>
                                        </div>
                                        <div class="card-body">
                                            <h2>Enter Your Metamask Address</h2>
                                            <h4 class="msg"><?php echo $msg ?></h4>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div
                                                    class="d-flex justify-content-end bg-light rounded p-10 mx-10 my-15">
                                                    <input type="text" class="form-control" name="metamask"
                                                        placeholder="Meta Mask Address" required>
                                                    <input type="button" class="btn btn-primary" value="Withdraw"
                                                        data-toggle="modal" data-target="#exampleModal">
                                                </div>
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Withdraw</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for="">Withdraw Amount :</label>
                                                                <input type="text" class="form-control"
                                                                    name="withdraw_amount"
                                                                    placeholder="Enter Withdraw Amount" required>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary"
                                                                    name="withdraw">Withdraw</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <h3 class="text-center">OR</h3>
                                            <div class="bg-light rounded p-30 mx-10 my-15">
                                                <div class="d-flex justify-center items-center">

                                                    <button id="loginButton" onclick=""
                                                        class="btn mx-auto rounded bg-info p-2 text-white">
                                                        Login with MetaMask
                                                    </button>


                                                </div>
                                                <p id="userWallet" class="text-center fs-20 text-gray-600 my-2"></p>
                                                <p id="userWalletCC" class="text-center text-gray-600 my-2"></p>

                                            </div>
                                            <hr>
                                            <h3 class="text-center">How to find Metamask Address</h3>

                                            <!-- <img src="../images/guide/metamask-02.png" > -->
                                            <img src="../images/guide/metamask-03.png">


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                </section>

                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered " style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User id</th>
                                <th>Image Path</th>
                                <th>MetamaskID</th>
                                <th>Withdraw</th>
                                <th>Deposit</th>
                                <th>Transition Detail</th>
                                <th>Timestamp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                                        // $user_id= $_SESSION["user_id"];
                                                        $res=mysqli_query($con,"SELECT * FROM deposite WHERE user_id = '$id'");
                                                        $res2=mysqli_query($con, "SELECT * FROM withdraw WHERE user_id = '$id'"); 
                                                        $res3=mysqli_query($con, "SELECT * FROM history WHERE user_id = '$id'"); 
                                        
                                                        $i=1;
                                                        while($row=mysqli_fetch_assoc($res)){
                                                        
                                                    ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $user_row['username']?></td>
                                <?php $link = 'uploads/'.$row["image_path"] ?>
                                <td><a style="font-size: 11px" href="<?php echo $link ?>">Open Image</a></td>
                                <td>--</td>
                                <td>--</td>
                                <td><?php echo $row['d_amount']?></td>
                                <td>Deposit <?php echo $row['status']?></td>
                                <td><?php echo $row['timestamp']?></td>
                            </tr>
                            <?php } 
                                                       while($row=mysqli_fetch_assoc($res2)){
                                                        
                                                        ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $user_row['username']?></td>
                                <th>--</th>
                                <!-- <th>--</th> -->
                                <td><?php echo $row['metamaskID']?></td>
                                <td><?php echo $row['w_amount']?></td>
                                <th>--</th>
                                <td>Withdraw <?php echo $row['status'] ?></td>
                                <td><?php echo $row['timestamp']?></td>
                            </tr>
                            <?php }
                                                           
                                                           while($row=mysqli_fetch_assoc($res3)){
                                    
                                                            ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $row['user']?></td>
                                <th>--</th>
                                <td><?php echo $row['metamaskid']?></td>
                                <td><?php echo $row['withdraw'] ?></td>
                                <td><?php echo $row['deposit'] ?></td>
                                <td>Payment <?php echo $row['status'] ?></td>
                                <td><?php echo $row['timestamp']?></td>

                            </tr>

                            <?php
                                                                }?>


                        </tbody>

                    </table>
                </div>
                <!-- /.content -->
            </div>
        </div>

        <!-- /.content-wrapper -->
        <footer class="main-footer mt-5">
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
        <script>
        window.userWalletAddress = null;
        const loginButton = document.getElementById("loginButton");
        const userWallet = document.getElementById("userWallet");
        const userWalletCC = document.getElementById("userWalletCC");

        function toggleButton() {
            if (!window.ethereum) {
                loginButton.innerText = "No Metamask Account Detected... Please Install Metamask to Login !";
                loginButton.classList.remove("bg-info", "text-white");
                loginButton.classList.add(
                    "bg-gray-500",
                    "text-gray-100",
                    "cursor-not-allowed"
                );
                return false;
            }

            loginButton.addEventListener("click", loginWithMetaMask);
        }

        async function loginWithMetaMask() {
            const accounts = await window.ethereum
                .request({
                    method: "eth_requestAccounts"
                })
                .catch((e) => {
                    console.error(e.message);
                    return;
                });
            if (!accounts) {
                return;
            }

            window.userWalletAddress = accounts[0];
            userWallet.innerText = window.userWalletAddress;
            userWalletCC.innerText = "Copy above address in input box";
            loginButton.innerText = "Sign out of MetaMask";

            loginButton.removeEventListener("click", loginWithMetaMask);
            setTimeout(() => {
                loginButton.addEventListener("click", signOutOfMetaMask);
            }, 200);
        }

        function signOutOfMetaMask() {
            window.userWalletAddress = null;
            userWallet.innerText = "";
            loginButton.innerText = "Sign in with MetaMask";

            loginButton.removeEventListener("click", signOutOfMetaMask);
            setTimeout(() => {
                loginButton.addEventListener("click", loginWithMetaMask);
            }, 200);
        }

        window.addEventListener("DOMContentLoaded", () => {
            toggleButton();
        });
        </script>
        <script>
        const selectable = document.querySelector('[data-ctc]');
        selectable.addEventListener('click', ctc);
        selectable.addEventListener('mouseenter', ctc);
        selectable.addEventListener('mouseleave', deSelect);

        //Clean everything that already selected
        function deSelect() {
            document.getSelection().removeAllRanges();
        }

        //Main functionality
        function ctc(event) {
            let selection = window.getSelection();
            let target = document.getElementsByTagName(event.target.tagName);
            if (selection.rangeCount > 0) {
                selection.removeAllRanges();
            }
            for (let i = 0; i < target.length; i++) {
                let range = document.createRange();
                range.selectNode(target[i]);
                selection.addRange(range);
            }
            if (event.type == "click" && event.detail < 2) {
                //Native JS copy to clipboard
                document.execCommand("copy");
                // if single clicked show flash message
                flash();
            }
        }

        //Simple Flash message
        function flash() {
            let body = document.querySelector("body");
            body.classList.add("special");
            setTimeout(() => {
                body.classList.remove("special");
            }, 2000);
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
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
        <script>
        $(document).ready(function() {
            $('#example').DataTable({
                searching: false
            });
        });
        </script>
</body>

</html>