<?php
include '../../config.php';

  date_default_timezone_set("Asia/Kolkata");
	$today = date("F j, Y, g:i a"); 


// API from Coinlayer.com 
// $key = "53e1d737e84c49af9a618033520546af";
// $link = "http://api.coinlayer.com/api/live?access_key=".$key;

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $link);

// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $result = curl_exec($ch);
// curl_close($ch);

// $result = json_decode($result, true);

// if(isset($result['success'])) {
  // $btc = $result['rates']['BTC'];
  $btc = 28863.81;
  // $usdt = $result['rates']['USDT'];
  $usdt = 1.027;
  // $eth = $result['rates']['ETH'];
  $eth = 1786.743;
  // $xrp = $result['rates']['XRP'];
  $xrp = 0.3917;
  // $ltc = $result['rates']['LTC'];
  $ltc = 63.235;
  // $adcn = $result['rates']['ADCN'];
  $adcn = 0.00013;
  $sumup = intval($btc) + intval($usdt) + intval($eth) + intval($xrp) + intval($ltc) + intval($adcn);
  $sumup = substr($sumup, 0, 3);
// } 
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
      Panel
    </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="css/vendors_css.css" />
    <!--amcharts -->
    <link
      href="https://www.amcharts.com/lib/3/plugins/export/export.css"
      rel="stylesheet"
      type="text/css"
    />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Style-->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/skin_color.css" />
    <link rel="stylesheet" href="css/custom2.css" />
    <style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}



      </style>
  </head>

  <body class="hold-transition light-skin sidebar-mini theme-primary fixed">
    <div class="wrapper">
      <div id="loader"></div>

      <header class="main-header">
        <div class="d-flex align-items-center logo-box justify-content-start">
          <!-- Logo -->
          <a href="index.php" class="logo">
            <!-- logo-->
            <div class="logo-mini w-50 m-auto">
              <span class="light-logo"
                ><img src="../images/logo.png" alt="logo"
              /></span>
              <span class="dark-logo"
                ><img src="../images/logo.png" alt="logo"
              /></span>
            </div>
            <div class="logo-lg align-items-center m-auto ">
              <h3 class="title text-bold text-center" style="font-family: 'Montserrat' sans-serif !important;">Peradot</h3>
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
                    <a class="dropdown-item" href="#"
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
        <section class="sidebar position-relative">
          <div class="multinav">
            <div class="multinav-scroll" style="height: 100%">
            
              <ul class="sidebar-menu" data-widget="tree">
                <li class="active">
                  <a href="index.html">
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
                    <span>Other Page</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                </li>
                <li class="">
                  <a href="reference.php">
                  <i data-feather="share-2" ></i>
                    <span>Reference Code</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                </li>
              </ul>

              <div class="sidebar-widgets mt-5">
                <div
                  class="mx-25 mt-30 p-30 text-center bg-primary-light rounded5"
                >
                  <img src="../images/trophy.png" alt="" />
                  <h4 class="my-3 fw-500 text-uppercase text-primary">
                    Start Trading
                  </h4>
                  <span class="fs-12 d-block mb-3 text-black-50"
                    >Offering discounts for better online a store can loyalty
                    weapon into driving</span
                  >
                  <button
                    type="button"
                    class="waves-effect waves-light btn btn-sm btn-primary mb-5"
                  >
                    Invest Now
                  </button>
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
        <div class="container-full">
          <!-- Main content -->
          <section class="content">
            <div class="row">
              <div class="col-xl-9">
                <div class="row">
                  <div class="col-xl-6">
                    <div class="d-flex top_box">
                      <h1 class="fw-500 m-0" id="stock-price">$1644.29</h1>
                      
                    </div>
                  </div>
                  <div class="col-xl-6 text-end my-2">
                    <h3 class="m-0">Live Bitcoin Transactions (BTC)</h3>
                  </div>
                </div>
                <div class="col-12">
                    <div class="box">
                      <div class="box-body text-center">
                      
                        <h1 class="text-bold">Claim $60 in ..</h1>

                    <!-- claim button  -->

                        <div>
                          <h2 >24 : 00 : 00</h2>
                          <h5>hr : min: sec</h5>
                        </div>



                      </div>
                    </div>
                </div>
                
                <div class="col-xl-12 col-12">
                  <div class="box">
                    <div class="customhtab box-header with-border">
                      <ul class="nav nav-pills">
                        <li class="nav-item">
                          <a
                            href="#Overview-1"
                            class="nav-link active"
                            data-bs-toggle="tab"
                            aria-expanded="false"
                            >Summary</a
                          >
                        </li>
                        <li class="nav-item">
                          <a
                            href="#Overview-3"
                            class="nav-link"
                            data-bs-toggle="tab"
                            aria-expanded="true"
                            >Peradot Transactions</a
                          >
                        </li>
                        <li class="nav-item">
                          <a
                            href="#Overview-4"
                            class="nav-link"
                            data-bs-toggle="tab"
                            aria-expanded="true"
                            >My Historical Data</a
                          >
                        </li>
                      </ul>
                      
                    </div>
                    <div class="box">
                      <div class="box-body">
                        <div id="chart">
                          <div class="tab-content">
                            <div id="Overview-1" class="tab-pane active">
                              <!-- <div id="chart-timeline"></div> -->
                              <center><div class="btcwdgt-chart" bw-cash="true" bw-theme="dark" style="width:100% !important; "></div></center>
                            </div>
                            <div id="Overview-3" class="tab-pane">
                              <div>
                                <div class="col-12">
                                  <div class="box">
                                    <div class="box-body">
                                      <div class="table-responsive">
                                        <table
                                          class="table table-bordered no-margin"
                                        >
                                          <thead>
                                            <tr>
                                              <th>Id</th>
                                              <th>Time</th>
                                              <th>Transactions</th>
                                              <th>Sent</th>
                                              <th>Fees</th>
                                              <th>Block Size</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>
                                                <a
                                                  href="#"
                                                  class="hover-primary"
                                                  >8526369</a
                                                >
                                              </td>
                                              <td>60&nbsp;seconds ago</td>
                                              <td>2,122</td>
                                              <td>22,819.638 BTC</td>
                                              <td>1.496 BTC</td>
                                              <td>975,573</td>
                                            </tr>

                                            <tr>
                                              <td>
                                                <a
                                                  href="#"
                                                  class="hover-primary"
                                                  >45687</a
                                                >
                                              </td>
                                              <td>45&nbsp;minutes ago</td>
                                              <td>1,837</td>
                                              <td>8,410.154 BTC</td>
                                              <td>0.982 BTC</td>
                                              <td>950,027</td>
                                            </tr>

                                            <tr>
                                              <td>
                                                <a
                                                  href="#"
                                                  class="hover-primary"
                                                  >789654</a
                                                >
                                              </td>
                                              <td>80&nbsp;minutes ago</td>
                                              <td>1,280</td>
                                              <td>15,541.708 BTC</td>
                                              <td>1.855 BTC</td>
                                              <td>974,440</td>
                                            </tr>

                                            <tr>
                                              <td>
                                                <a
                                                  href="#"
                                                  class="hover-primary"
                                                  >1236547</a
                                                >
                                              </td>
                                              <td>45&nbsp;minutes ago</td>
                                              <td>1,731</td>
                                              <td>18,009.855 BTC</td>
                                              <td>1.963 BTC</td>
                                              <td>975,484</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                    <!-- /.box-body -->
                                  </div>
                                  <!-- /.box -->
                                </div>
                              </div>
                            </div>
                            <div id="Overview-4" class="tab-pane">
                              <div>
                                <div class="col-12">
                                  <div class="box">
                                    <div class="box-body">
                                      <div class="table-responsive">
                                        <table
                                          class="table table-bordered no-margin"
                                        >
                                          <thead>
                                            <tr>
                                              <th>Id</th>
                                              <th>Time</th>
                                              <th>Sent</th>
                                              <th>Fees</th>
                                              <th>Block Size</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>
                                                <a
                                                  href="#"
                                                  class="hover-primary"
                                                  >550171</a
                                                >
                                              </td>
                                              <td>59&nbsp;seconds ago</td>
                                              <td>2,122</td>
                                              <td>2.496 USD</td>
                                              <td>456,123</td>
                                            </tr>

                                            <tr>
                                              <td>
                                                <a
                                                  href="#"
                                                  class="hover-primary"
                                                  >550172</a
                                                >
                                              </td>
                                              <td>10&nbsp;minutes ago</td>
                                              <td>1,837</td>
                                              <td>0.741 USD</td>
                                              <td>963,987</td>
                                            </tr>

                                            <tr>
                                              <td>
                                                <a
                                                  href="#"
                                                  class="hover-primary"
                                                  >550173</a
                                                >
                                              </td>
                                              <td>13&nbsp;minutes ago</td>
                                              <td>1,280</td>
                                              <td>2.741 USD</td>
                                              <td>456,147</td>
                                            </tr>

                                            <tr>
                                              <td>
                                                <a
                                                  href="#"
                                                  class="hover-primary"
                                                  >550174</a
                                                >
                                              </td>
                                              <td>21&nbsp;minutes ago</td>
                                              <td>1,731</td>
                                              <td>4.852 USD</td>
                                              <td>852,484</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                    <!-- /.box-body -->
                                  </div>
                                  <!-- /.box -->
                                </div>
                              </div>
                            </div>
                            <div id="Overview-5" class="tab-pane">
                              <div>
                                <div class="col-12">
                                  <div class="box">
                                    <div class="box-body">
                                      <div class="table-responsive">
                                        <table
                                          class="table table-bordered no-margin"
                                        >
                                          <thead>
                                            <tr>
                                              <th>Id</th>
                                              <th>Time</th>
                                              <th>Sent</th>
                                              <th>Fees</th>
                                              <th>Block Size</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>
                                                <a
                                                  href="#"
                                                  class="hover-primary"
                                                  >550171</a
                                                >
                                              </td>
                                              <td>59&nbsp;seconds ago</td>
                                              <td>2,122</td>
                                              <td>0.852 BTC</td>
                                              <td>745,123</td>
                                            </tr>

                                            <tr>
                                              <td>
                                                <a
                                                  href="#"
                                                  class="hover-primary"
                                                  >550172</a
                                                >
                                              </td>
                                              <td>10&nbsp;minutes ago</td>
                                              <td>1,837</td>
                                              <td>1.745 BTC</td>
                                              <td>159,789</td>
                                            </tr>

                                            <tr>
                                              <td>
                                                <a
                                                  href="#"
                                                  class="hover-primary"
                                                  >550173</a
                                                >
                                              </td>
                                              <td>13&nbsp;minutes ago</td>
                                              <td>8,741</td>
                                              <td>2.741 BTC</td>
                                              <td>852,456</td>
                                            </tr>

                                            <tr>
                                              <td>
                                                <a
                                                  href="#"
                                                  class="hover-primary"
                                                  >550174</a
                                                >
                                              </td>
                                              <td>21&nbsp;minutes ago</td>
                                              <td>1,731</td>
                                              <td>45,009 BTC</td>
                                              <td>4.852</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                    <!-- /.box-body -->
                                  </div>
                                  <!-- /.box -->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.box-body -->
                  </div>
                </div>
                
              </div>

              <div class="col-xl-3 col-lg-12 side-bar">
                <div class="d-flex justify-content-end">
                  
                  <div class="text-end">
                    <div
                      class="media align-items-center p-0 justify-content-end"
                    >
                      <div>
                        <h5 class="no-margin fw-500">Jaison</h5>
                        <span>@Jaison</span>
                      </div>
                      <div class="text-center m-0">
                        <a href="#"><i class="cc XRP me-5" title="XRP"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="pt-30">
                    <div class="media align-items-center p-0">
                      <div class="m-0">
                        <h4 class="no-margin fw-500">My Total Balance</h4>
                        <h1 class="fw-500">$246,789.20</h1>
                        <div class="d-flex">
                          <p class="m-0">
                            <a
                              type="button"
                              href="#"
                              class="waves-effect waves-light btn btn-rounded btn-success-light fs-14 p-1 px-3 me-2"
                              >+3.15%</a
                            >
                            <i
                              class="mdi mdi-arrow-top-right btn-rounded btn-success down_box_2"
                            >
                            </i>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row py-40">
                    <h4 class="fw-500 mt-5">My Space</h4>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 main_item">
                      <div>
                        <div class="d-flex align-items-center gap-items-1">
                          <div
                            class="bg-danger-light rounded20 l-h-80 text-center item_box"
                          >
                            <i
                              class="mdi mdi-arrow-bottom-right btn-rounded btn-danger down_box_3"
                            ></i>
                          </div>
                          <div>
                            <p class="mb-0">Investment</p>
                            <h3 class="my-0 text-dark fw-700">18.5k</h3>
                          </div>
                        </div>
                        <div class="row pt-10">
                          <div
                            class="col-xl-5 col-lg-3 col-md-4 col-sm-3"
                          ></div>
                          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 sm-pt-20">
                      <div>
                        <div class="d-flex align-items-center gap-items-1">
                          <div
                            class="bg-success-light rounded20 l-h-80 text-center item_box"
                          >
                            <i
                              class="mdi mdi-arrow-top-right btn-rounded btn-success down_box_3"
                            ></i>
                          </div>
                          <div>
                            <p class="mb-0">Expense</p>
                            <h3 class="my-0 text-dark fw-700">12.8k</h3>
                          </div>
                        </div>
                        <div class="row pt-10">
                          <div
                            class="col-xl-5 col-lg-3 col-md-4 col-sm-3"
                          ></div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row pb-10">
                    <h4 class="no-margin fw-500">Convert</h4>
                    <div
                      class="d-flex justify-content-between bg-light rounded p-10 mx-10 my-15"
                    >
                    <label style="margin-right: 20px;">BTC</label>
                      <input type="number" name="btc" class="currencyField form-control" placeholder="BTC" />
                    </div>
                    <div
                      class="d-flex justify-content-between bg-light rounded p-10 mx-10 mb-15"
                    >
                    <label style="margin-right: 20px;">USD</label>

                    <input type="number" name="usd" class="currencyField form-control" placeholder="USD"/>

                    </div>
                    <div class="d-flex justify-content-between mb-20">
                      
                      <div class="text-end">
                        <p class="fw-500 ms-50 fs-16"><?php echo $today ?></p>
  
                      </div>
                    </div>
                  </div>
                  <div class="hexagon_box">
                    <div
                      class="box box-inverse bg-dark3 bg-hexagons-white pull-up"
                    >
                      <div class="box-body text-center">
                        <h2 class="mb-0 text-bold">Live Stats</h2>
                        <h4>Total Evaluation : $<?php echo $sumup; ?>M</h4>
                        <ul
                          class="flexbox flex-justified text-center mt-30 bb-1 border-gray pb-20"
                        >
                          <li class="be-1 border-gray">
                            <div>USDT</div>
                            <small class="fs-16"><?php echo round($usdt, 3); ?></small>
                          </li>

                          <li class="be-1 border-gray">
                            <div>BTC</div>
                            <small class="fs-16"><?php echo round($btc, 2); ?></small>
                          </li>

                          <li>
                            <div>ETH</div>
                            <small class="fs-16"><?php echo round($eth, 3); ?></small>
                          </li>
                        </ul>
                        <ul
                          class="flexbox flex-justified text-center mt-30 bb-1 border-gray pb-30"
                        >
                          <li class="be-1 border-gray">
                            <div>XRP</div>
                            <small class="fs-16"><?php echo round($xrp, 4); ?></small>
                          </li>

                          <li class="be-1 border-gray">
                            <div>LTC</div>
                            <small class="fs-16"><?php echo round($ltc, 3); ?></small>
                          </li>

                          <li>
                            <div>ADCN</div>
                            <small class="fs-16"><?php echo $adcn; ?></small>
                          </li>
                        </ul>
                        <ul class="flexbox flex-justified text-center mt-20">
                          <li class="be-1 border-gray">
                            <div>% 24h</div>
                            <small class="fs-16"
                              ><i class="fa fa-arrow-up text-success pe-5"></i
                              >1.4</small
                            >
                          </li>

                          <li class="be-1 border-gray">
                            <div>% 30d</div>
                            <small class="fs-16"
                              ><i class="fa fa-arrow-up text-success pe-5"></i
                              >3.29</small
                            >
                          </li>

                          <li>
                            <div>% 1y</div>
                            <small class="fs-16"
                              ><i class="fa fa-arrow-up text-success pe-5"></i
                              >54.7</small
                            >
                          </li>
                        </ul>
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
          <ul
            class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end"
          >
            <li class="nav-item">
              <a class="nav-link" href="javascript:void(0)">FAQ</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                href=""
                target="_blank"
                >Contact</a
              >
            </li>
          </ul>
        </div>
        &copy; 2022
        <a href="">Multipurpose</a>.
        All Rights Reserved.
      </footer>

      
    <!-- ./wrapper -->


    <!-- Page Content overlay -->

    <!-- Vendor JS -->
    <!-- Vendor JS -->
    <script>
       (function(b,i,t,C,O,I,N) {
    window.addEventListener('load',function() {
      if(b.getElementById(C))return;
      I=b.createElement(i),N=b.getElementsByTagName(i)[0];
      I.src=t;I.id=C;N.parentNode.insertBefore(I, N);
    },false)
  })(document,'script','https://widgets.bitcoin.com/widget.js','btcwdgt');

    // let ws = new WebSocket('wss://ws.blockchain.info/inv');
    let ws = new WebSocket('wss://stream.binance.com:9443/ws/etheur@trade');
    let stockPriceElement = document.getElementById('stock-price');
    let lastPrice = null;

    ws.onmessage = (event) => {
      let stockObject = JSON.parse(event.data);
      let price = parseFloat(stockObject.p).toFixed(2)
      stockPriceElement.innerText = '$' + price;

      stockPriceElement.style.color = !lastPrice || lastPrice === price ? 'black' : price > lastPrice ? 'green' : 'red';

      lastPrice = price;

    }

    </script>
    <script>
      $(".currencyField").keyup(function(){ //input[name='calc']
 let convFrom;
 if($(this).prop("name") == "btc") {
       convFrom = "btc";
       convTo = "usd";
 }
 else {
       convFrom = "usd";
       convTo = "btc";
 }
 $.getJSON( "https://api.coindesk.com/v1/bpi/currentprice/usd.json", 
    function( data) {
    var origAmount = parseFloat($("input[name='" + convFrom + "']").val());        
    var exchangeRate = parseInt(data.bpi.USD.rate_float);
    let amount;
    if(convFrom == "btc")
       amount = parseFloat(origAmount * exchangeRate);
    else
       amount = parseFloat(origAmount/ exchangeRate); 
    $("input[name='" + convTo + "']").val(amount.toFixed(2));
    });
});
    </script>
   
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