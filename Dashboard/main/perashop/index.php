<?php
    include '../../../config.php';
    include '../../../function.php';
    
    if (!isset($_SESSION["id"])) {
    $username = "Register Now";
    //   $user_row = "Please Login";
    $user_row['amount'] = 0;


    }
    else {
    
        $id = $_SESSION['id'];
        $user_sql = mysqli_query($con, "SELECT * FROM users WHERE id = $id");
        $user_row = mysqli_fetch_assoc($user_sql);
        $username = $user_row['username'];

    }

    // PRICE RATE FROM TABLE

    $price_sql = mysqli_query($con, "SELECT price FROM price WHERE id=1");
    $price_row = mysqli_fetch_assoc($price_sql);
    // for current price 
    $current_price = $price_row['price'];

    $peracoin_rate = $current_price;
    $msg = "";
    $msg1 = "";

    if(isset($_POST['package1'])) {
        $user_select = mysqli_query($con, "SELECT amount FROM users WHERE id = $id");
        $user_amount_row = mysqli_fetch_assoc($user_select);
        $current_user_price = $user_amount_row['amount'];
        $package_amount = 5 * $peracoin_rate; 
        if($current_user_price >= $package_amount)
        {
            $current_amount_sql = floatval($current_user_price) - floatval($package_amount);
            $amount_deduct = mysqli_query($con, "UPDATE `users` SET `amount`= $current_amount_sql ,`peracoin`=peracoin + 5 WHERE id = '$id'");

            if($amount_deduct) {
                
             echo '<span style="color:white;>'.$msg = "Transaction Sucessfull <br> 5 PEC(Peracoin) added to your account".'</span>';
            } else {
             echo '<span style="color:white;>'. $msg = "Transaction Unsucessfull".'</span>';
            }

        } else {
             echo '<span style="color:white;>'. $msg = "Insufficient balance ".'</span>';
        }
    
    }
    if(isset($_POST['package2'])) {
        $user_select = mysqli_query($con, "SELECT amount FROM users WHERE id = $id");
        $user_amount_row = mysqli_fetch_assoc($user_select);
        $current_user_price = $user_amount_row['amount'];
        $package_amount = 15 * $peracoin_rate; 
        if($current_user_price >= $package_amount)
        {
            $current_amount_sql = floatval($current_user_price) - floatval($package_amount);
            $amount_deduct = mysqli_query($con, "UPDATE `users` SET `amount`= $current_amount_sql ,`peracoin`=peracoin + 15 WHERE id = '$id'");

            if($amount_deduct) {
                echo '<span style="color:white;>'.$msg = "Transaction Sucessfull <br> 15 PEC(Peracoin) added to your account".'</span>';
            } else {
                echo '<span style="color:white;>'. $msg = "Transaction Unsucessfull".'</span>';
            }

        } else {
            echo '<span style="color:white;>'. $msg = "Insufficient balance ".'</span>';
        }
    
    }
    if(isset($_POST['package3'])) {
        $user_select = mysqli_query($con, "SELECT amount FROM users WHERE id = $id");
        $user_amount_row = mysqli_fetch_assoc($user_select);
        $current_user_price = $user_amount_row['amount'];
        $package_amount = 40 * $peracoin_rate; 
        if($current_user_price >= $package_amount)
        {
            $current_amount_sql = floatval($current_user_price) - floatval($package_amount);
            $amount_deduct = mysqli_query($con, "UPDATE `users` SET `amount`= $current_amount_sql ,`peracoin`=peracoin + 40 WHERE id = '$id'");

            if($amount_deduct) {
                echo '<span style="color:white;>'.$msg = "Transaction Sucessfull <br> 40 PEC(Peracoin) added to your account".'</span>';
            } else {
                echo '<span style="color:white;>'. $msg = "Transaction Unsucessfull".'</span>';
            }

        } else {
            echo '<span style="color:white;>'. $msg = "Insufficient balance ".'</span>';
        }
    
    }
    if(isset($_POST['package4'])) {
        $user_select = mysqli_query($con, "SELECT amount FROM users WHERE id = $id");
        $user_amount_row = mysqli_fetch_assoc($user_select);
        $current_user_price = $user_amount_row['amount'];
        $package_amount = 60 * $peracoin_rate; 
        if($current_user_price >= $package_amount)
        {
            $current_amount_sql = floatval($current_user_price) - floatval($package_amount);
            $amount_deduct = mysqli_query($con, "UPDATE `users` SET `amount`= $current_amount_sql ,`peracoin`=peracoin + 60 WHERE id = '$id'");

            if($amount_deduct) {
                echo '<span style="color:white;>'.$msg = "Transaction Sucessfull <br> 60 PEC(Peracoin) added to your account".'</span>';
            } else {
                echo '<span style="color:white;>'. $msg = "Transaction Unsucessfull".'</span>';
            }

        } else {
            echo '<span style="color:white;>'. $msg = "Insufficient balance ".'</span>';
        }
    
    }
    if(isset($_POST['package5'])) {
        $user_select = mysqli_query($con, "SELECT amount FROM users WHERE id = $id");
        $user_amount_row = mysqli_fetch_assoc($user_select);
        $current_user_price = $user_amount_row['amount'];
        $package_amount = 100 * $peracoin_rate; 
        if($current_user_price >= $package_amount)
        {
            $current_amount_sql = floatval($current_user_price) - floatval($package_amount);
            $amount_deduct = mysqli_query($con, "UPDATE `users` SET `amount`= $current_amount_sql ,`peracoin`=peracoin + 100 WHERE id = '$id'");

            if($amount_deduct) {
                echo '<span style="color:white;>'.$msg = "Transaction Sucessfull <br> 100 PEC(Peracoin) added to your account".'</span>';
            } else {
                echo '<span style="color:white;>'. $msg = "Transaction Unsucessfull".'</span>';
            }

        } else {
            echo '<span style="color:white;>'. $msg = "Insufficient balance ".'</span>';
        }
    
    }
    if(isset($_POST['package6'])) {
        $user_select = mysqli_query($con, "SELECT amount FROM users WHERE id = $id");
        $user_amount_row = mysqli_fetch_assoc($user_select);
        $current_user_price = $user_amount_row['amount'];
        $package_amount = 250 * $peracoin_rate; 
        if($current_user_price >= $package_amount)
        {
            $current_amount_sql = floatval($current_user_price) - floatval($package_amount);
            $amount_deduct = mysqli_query($con, "UPDATE `users` SET `amount`= $current_amount_sql ,`peracoin`=peracoin + 250 WHERE id = '$id'");

            if($amount_deduct) {
                echo '<span style="color:white;>'.$msg = "Transaction Sucessfull <br> 250 PEC(Peracoin) added to your account".'</span>';
            } else {
                echo '<span style="color:white;>'. $msg = "Transaction Unsucessfull".'</span>';
            }

        } else {
            echo '<span style="color:white;>'. $msg = "Insufficient balance".'</span>';
        }
    
    }

    // single pera coin buy
    if(isset($_POST['s_submit'])){
        $total_samaount = $_POST['total_samount'];
        // user row select 
        $user_s_select = mysqli_query($con, "SELECT amount FROM users WHERE id = '$id'");
        $user_samount_row = mysqli_fetch_assoc($user_s_select);
        $current_user_sprice = $user_samount_row['amount'];
        $peracoin_sql = floatval($total_samaount) / floatval($peracoin_rate);
        // check if aount is suff 
        if($current_user_sprice >= $total_samaount)
        {
         $current_user_sprice = floatval($current_user_sprice) - floatval($total_samaount);
         $amount_sdeduct = mysqli_query($con, "UPDATE `users` SET `amount`= $current_user_sprice ,`peracoin`= $peracoin_sql WHERE id = '$id'");
            if($amount_sdeduct){
                $msg1 = "<span style='color:white'>Transaction Sucessfull</span>";
            }else{
                $msg1 = "<span style='color:white'>Transaction Unsecessfull</span>";
            }
        }else{
            $msg1 = "<span style='color:white'>Insufficient balance</span>";
        }
        // if true user data changes 
        // else infsuf.. msg1  
  
        
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peradot</title>
    <link rel="icon" type="image/png" href="img/logo/sm-logo.png" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">

    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/shepherd.js@8.3.1/dist/js/shepherd.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/shepherd.js@8.3.1/dist/css/shepherd.css"/>

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;700&display=swap" rel="stylesheet">
    <style>
        #username{
            position: relative;
            width: auto;
        }
        .navbar-brand {
            display: flex !important;
        }
    </style>
</head>

<body>
    

    <div id="pageloader" class="pageloader is-left-to-right is-theme"></div>
    <div id="infraloader" class="infraloader is-active"></div>    
    <div class="dark-wrapper">
        <!-- Landing page Hero -->
        <section class="hero is-fullheight is-transparent">
            <div class="hero-head">
    
                <!-- Cloned navbar -->
                <!-- Cloned navbar that comes in on scroll -->
                <nav x-data="initNavbar()"  x-on:scroll.window="scroll()" id="navbar-clone" class="navbar is-fixed is-dark" :class="{
                        'is-active': scrolled,
                        '': !scrolled
                    }">
                    <div class="container">
                        <!-- Brand -->
                        <div class="navbar-brand">
                            <a href="index.php" class="navbar-item">
                                <img class="" src="img/logo/logo.png" alt="">
                                <span class="brand-name">Peradot</span>
                            </a>
                            <!-- Responsive toggle -->
                            <div class="navbar-burger" @click="openMobileMenu()">
                                <div class="menu-toggle">
                                    <span class="icon-box-toggle" :class="{
                                            'active': mobileOpen,
                                            '': !mobileOpen
                                        }">
                                        <span class="rotate">
                                            <i class="icon-line-top"></i>
                                            <i class="icon-line-center"></i>
                                            <i class="icon-line-bottom"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Menu -->
                        <div id="cloneNavbarMenu" class="navbar-menu" :class="{
                                'is-active': mobileOpen,
                                '': !mobileOpen
                            }">
                            <div class="navbar-end">
                                <!-- Menu item -->
                                <div class="navbar-item is-nav-link">
                                    <a class="is-centered-responsive" href="../index.php">Home</a>
                                </div>
                                <!-- Menu item -->
                                <div class="navbar-item is-nav-link">
                                    <a class="is-centered-responsive" href="#ico">Ico</a>
                                </div>
                                <!-- Menu item -->
                                <div class="navbar-item is-nav-link">
                                    <a class="is-centered-responsive" href="#perashop">shop</a>
                                </div>
                                <!-- Menu item -->
                                <div class="navbar-item is-nav-link">
                                    <a class="is-centered-responsive" href="roadmap.php">Roadmap</a>
                                </div>
                            
                                <!-- Menu item -->
                                
                                <!-- Sign up -->
                                <div class="navbar-item is-nav-link" id="username">
                                    <a href="../payment.php" class="button k-button k-primary raised has-gradient slanted">
                                        <span class="text"><?php echo $username?></span>
                                        <span class="front-gradient"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- /Cloned navbar -->
                <!-- Static navbar -->
                <!-- Static navbar -->
                <nav x-data="initNavbar()" class="navbar is-light" :class="{
                        'is-dark-mobile': mobileOpen,
                        '': !mobileOpen
                    }">
                    <div class="container">
                        <!-- Brand -->
                        <div class="navbar-brand">
                            <a href="index.php" class="navbar-item">
                                <img class="" src="img/logo/logo.png" alt="">
                                <span class="brand-name">Peradot</span>
                            </a>
                            <!-- Responsive toggle -->
                            <div class="navbar-burger" @click="openMobileMenu()">
                                <div class="menu-toggle">
                                    <span class="icon-box-toggle" :class="{
                                            'active': mobileOpen,
                                            '': !mobileOpen
                                        }">
                                        <span class="rotate">
                                            <i class="icon-line-top"></i>
                                            <i class="icon-line-center"></i>
                                            <i class="icon-line-bottom"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Menu -->
                        <div id="navbarMenu" class="navbar-menu light-menu" :class="{
                                'is-active': mobileOpen,
                                '': !mobileOpen
                            }">
                            <div class="navbar-end">
                                <!-- Menu item -->
                                <div class="navbar-item is-nav-link">
                                    <a class="is-centered-responsive" href="../index.php">Home</a>
                                </div>
                                <!-- Menu item -->
                                <div class="navbar-item is-nav-link">
                                    <a class="is-centered-responsive" href="#ico">Ico</a>
                                </div>
                                <!-- Menu item -->
                                <div class="navbar-item is-nav-link">
                                    <a class="is-centered-responsive" href="#perashop">shop</a>
                                </div>
                                <!-- Menu item -->
                                <div class="navbar-item is-nav-link">
                                    <a class="is-centered-responsive" href="roadmap.php">Roadmap</a>
                                </div>
                                <!-- Menu item -->

                                
                                <!-- Sign up -->
                                <div class="navbar-item" id="username">
                                    <a href="../payment.php" class="button k-button k-primary raised has-gradient slanted">
                                    <span class="text"><?php echo $username?></span>
                                        <span class="front-gradient"></span>
                                    </a>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- /Static navbar -->
            </div>
    
            <!-- Animated particles -->
            <div x-data="initHero()" x-init="initParticles()" id="particles-js"></div>
    
            <!-- Hero Image and Title -->
            <div class="hero-body">
                <div class="container">
                    <div class="columns is-vcentered">
    
                        <!-- Landing page Title -->
                        <div class="column is-5 landing-caption">
                            <h1 class="title is-1 is-light is-semibold is-spaced main-title">Peradot Exchange Market</h1>
                            <h2 class="subtitle is-5 is-light is-thin">
                                Peradot brought to the next level. Join our ICO for supercharged rates.
                            </h2>
                            <!-- CTA -->
                            <p class="buttons">
                                <a href="#start" class="button k-button k-primary raised has-gradient is-fat is-bold">
                                    <span class="text">Get Started</span>
                                    <span class="front-gradient"></span>
                                </a>
                                <a href="https://peradot.in/" class="button k-button k-primary raised has-gradient is-fat is-bold">
                                    <span class="text">Learn More</span>
                                    <span class="front-gradient"></span>
                                </a>
                            </p>
    
                        </div>
                        <!-- Hero image -->
                        <div class="column is-7">
                            <figure class="image">
                                <img src="img/illustrations/buildings.svg" alt="">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
    
    
        <!-- Icon Features section -->
        <section id="start" class="section is-transparent is-relative">
            <!-- Container -->
            <div class="container">
    
                <div class="has-text-centered">
                    <a href="#offers" class="button k-button k-secondary raised has-gradient is-fat is-bold rounded">
                        <span class="text">Buy Tokens 30% off</span>
                        <span class="front-gradient"></span>
                    </a>
                </div>
    
                <!-- Content wrapper -->
                <div class="content-wrapper is-medium">
                    <div class="columns is-vcentered">
                        <!-- Feature -->
                    </div>
    
                    <!-- Play video button -->

                </div>
                <!-- Content wrapper -->
            </div>
            <!-- /Container -->
        </section>
        <!-- /Icon Features section -->
    
        <!-- Side Features section -->
        <section id="big-gradient" class="section is-transparent">
            <!-- Container -->
            <div class="container">
                <!-- Divider -->
                <div class="divider is-centered"></div>
                <!-- Title & subtitle -->
                <h2 class="title is-light is-semibold has-text-centered is-spaced">Decentralized Exchange</h2>
                <h4 class="subtitle is-6 is-light has-text-centered is-compact">It is the unequivocally trustable platform where every client has been taking the advantages since last 2+ years. Additionally, the success rate of it is 100%. </h4>
    
                <!-- Content wrapper -->
                <div class="content-wrapper is-large">
                    <div class="columns is-vcentered">
    
                        <!-- Feature content -->
                        <div class="column is-5 is-offset-1">
                            <div class="side-feature-content">
    
                                <h3 class="title is-4 is-light"><img src="img/icons/ico/icon2.svg" alt=""> <span>Peradot Role</span></h3>
                                <div class="divider is-long"></div>
                                <p class="is-light">Peradot actually play a vital role in the development. It is the crucial blockchain base system; which helps developers to develop the P2P network, NFT as well as metaverse.</p>
                                <div class="cta-wrapper">
                                    <a href="https://peradot.in/" class="button k-button k-primary raised has-gradient is-bold">
                                        <span class="text">Home</span>
                                        <span class="front-gradient"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
    
                        <!-- Feature image -->
                        <div class="column is-7">
                            <img class="side-feature" src="img/illustrations/token.svg" alt="">
                        </div>
                    </div>
    
                    <div class="columns is-vcentered">
                        <!-- Feature image desktop -->
                        <div class="column is-7 is-hidden-mobile">
                            <img class="side-feature" src="img/illustrations/blockchain-blocks.svg" alt="">
                        </div>
    
                        <!-- Feature content -->
                        <div class="column is-5">
                            <div class="side-feature-content">
    
                                <h3 class="title is-4 is-light"><img src="img/icon1.svg" alt=""> <span>A fairer financial system</span></h3>
                                <div class="divider is-long"></div>
                                <p class="is-light">Today, billions of people can't open bank accounts, others have their payments blocked. Petadot's decentralized finance (DeFi) system never sleeps or discriminates. With just an internet connection, you can send, receive, borrow, earn interest, and even stream funds anywhere in the world.</p>
                                <div class="cta-wrapper">
                                    <a href="data/whitepaper.pdf" class="button k-button k-primary raised has-gradient is-bold">
                                        <span class="text">Whitepaper</span>
                                        <span class="front-gradient"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
    
                        <!-- Feature image only for mobile -->
                        <div class="column is-7 is-hidden-desktop is-hidden-tablet">
                            <img class="side-feature" src="img/illustrations/blockchain-blocks.svg" alt="">
                        </div>
                    </div>
    
                    <div class="columns is-vcentered">
                        <!-- Feature content -->
                        <div class="column is-5 is-offset-1">
                            <div class="side-feature-content">
    
                                <h3 class="title is-4 is-light"><img src="img/icons/ico/icon2.svg" alt=""> <span>The internet of assets</span></h3>
                                <div class="divider is-long"></div>
                                <p class="is-light">Peradot's isn't just for digital money. Anything you can own can be represented, traded and put to use as non-fungible tokens (NFTs). You can tokenise your art and get royalties automatically every time it's re-sold. Or use a token for something you own to take out a loan. The possibilities are growing all the time.</p>
                                <div class="cta-wrapper">
                                    <a href="index.php#ico" class="button k-button k-primary raised has-gradient is-bold">
                                        <span class="text">Join the ICO</span>
                                        <span class="front-gradient"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
    
                        <!-- Feature image -->
                        <div class="column is-7">
                            <img class="side-feature" src="img/illustrations/crypto-mining.svg" alt="">
                        </div>
                    </div>
                </div>
                <!-- /Content wrapper -->
            </div>
            <!-- /Container -->
        </section>
        <!-- /Side Features section -->
    
        <!-- ICO section -->
    <div id="ico" >
        <section class="section is-medium is-end">
            <!-- Container -->
            <div class="container">
                <!-- Divider -->
                <div class="divider is-centered"></div>
                <!-- Title & subtitle -->
                <h2 class="title is-light is-semibold has-text-centered is-spaced">Join our ICO Now</h2>
                <h3 class="subtitle is-6 is-light has-text-centered is-compact">$1 Million share in Digital Market   </h3>
    
                <!-- Content wrapper -->
                <div class="content-wrapper is-large">
    
                    <!-- Flying tabs wrapper -->
                    <div x-data="initTabs()" x-init="setupCountdown()" class="flying-wrapper">
                        <!-- Tabs container -->
                        <div class="flying-tabs-container">
                            <!-- Tabs -->
                            <div class="flying-tabs">
                                <div @click="switchTabs($event)" class="flying-child tab-1" data-tab="tab-1" :class="{
                                    'is-active': activeTab === 'tab-1',
                                    '': activeTab != 'tab-1'
                                }"><a href="javascript:void(0);">ICO</a></div>
                                <div @click="switchTabs($event)" class="flying-child tab-2 step4" data-tab="tab-2" :class="{
                                    'is-active': activeTab === 'tab-2',
                                    '': activeTab != 'tab-2'
                                }"><a href="javascript:void(0);">RATES</a></div>
                                <div @click="switchTabs($event)" class="flying-child tab-3 step3" data-tab="tab-3" :class="{
                                    'is-active': activeTab === 'tab-3',
                                    '': activeTab != 'tab-3'
                                }"><a href="javascript:void(0);">PROFIT</a></div>
                                <div @click="switchTabs($event)" class="flying-child tab-4 step5" data-tab="tab-4" :class="{
                                    'is-active': activeTab === 'tab-4',
                                    '': activeTab != 'tab-4'
                                }"><a href="javascript:void(0);">GIVEAWAYS</a></div>
                                <div class="slider"></div>
                            </div>
                        </div>
    
                        <!-- Tabs content wrapper -->
                        <div class="flying-tabs-content">
                            <!-- Tab 1 -->
                            <div  class="tab-content" :class="{
                                    'is-active': activeTab === 'tab-1',
                                    '': activeTab != 'tab-1'
                                }">
                                <div class="columns is-vcentered tab-content-wrapper">
                                    <!-- ICO Terms -->
                                    <div class="column is-5 is-offset-1">
                                        <div class="text-content">
                                            <h4 class="title is-6 is-light animated preFadeInUp fadeInUp">ICO TERMS</h4>
                                            <ul class="custom-bullet-list">
                                                <li class="animated preFadeInUp fadeInUp">
                                                    <span>Bonus</span>
                                                    <br>
                                                    <span class="item-content" style="color: red;">Bonus started on July 25 2022 (12:00am GMT)</span>
                                                </li>
                                                <li class="animated preFadeInUp fadeInUp">
                                                    <span>Sale</span>
                                                    <br>
                                                    <span class="item-content">Peracoin sales starts on Oct 26 2022 (12:00am GMT)</span>
                                                </li>
                                                <li class="animated preFadeInUp fadeInUp">
                                                    <span>Presale</span>
                                                    <br>
                                                    <span class="item-content">Presale starts on Nov 8 2022 (9:00am GMT)</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- ICO COuntdown -->
                                    <div class="column is-5">
                                        <!-- Card -->
                                        <div class="ico-card animated preFadeInUp fadeInUp">
                                            <!-- Countdown -->
                                            <ul id="countdown" class="is-ico">
                                                <li id="days">
                                                    <div id="days-count" class="timer-number">00</div>
                                                    <div class="label">Days</div>
                                                </li>
                                                <li id="hours">
                                                    <div id="hours-count" class="timer-number">00</div>
                                                    <div class="label">Hours</div>
                                                </li>
                                                <li id="minutes">
                                                    <div id="minutes-count" class="timer-number">00</div>
                                                    <div class="label">Minutes</div>
                                                </li>
                                                <li id="seconds">
                                                    <div id="seconds-count" class="timer-number">00</div>
                                                    <div class="label">Seconds</div>
                                                </li>
                                            </ul>
                                            <!-- Progress bar -->
                                            <div class="progress-block">
                                                <!-- Tags -->
                                                <div class="progress-tags">
                                                    <div>Presale</div>
                                                    <div>Soft Cap</div>
                                                    <div>Bonus</div>
                                                </div>
                                                <div class="">
                                                <progress class="progress ico-progress" value="97" max="100">97%</progress>
                                                <p style="text-align: center;">First month holding <br/> <b>3 Month Hold Period</b></p>
                                                <hr class="step2" />
                                                </div>
                                            </div>
    
                                            <!-- Button -->
                                            <div class="button-block">
                                            <a href="#offers"><span class="button k-button k-secondary raised has-gradient is-bold is-fullwidth rounded ">Buy Now</span></a>
                                                <span class="front-gradient"></span>
                                            </div>
    
                                            <!-- Icons -->
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Tab 1 -->
    
                            <!-- Tab 2 -->
                            <div class="tab-content" :class="{
                                    'is-active': activeTab === 'tab-2',
                                    '': activeTab != 'tab-2'
                                }">
                                <div class="columns is-vcentered tab-content-wrapper">
                                    <!-- Tab content -->
                                    <div class="column is-5 is-offset-1">
                                        <div class="text-content">
                                            <h4 class="title is-6 is-light animated preFadeInUp fadeInUp">PERACOIN RATES</h4>
                                            <ul class="custom-bullet-list">
                                                <li class="animated preFadeInUp fadeInUp">
                                                    <span>Tokens Sales</span>
                                                    <br>
                                                    <span class="item-content">1 000 000 PEC (22%)</span>
                                                </li>
                                                <li class="animated preFadeInUp fadeInUp">
                                                    <span>Token Exchange</span>
                                                    <br>
                                                    <span class="item-content">1 PEC = $1,23,704.5 USD , (22%)</span> 
                                                </li>
                                                <li class="animated preFadeInUp fadeInUp">
                                                    <span>Transations</span>
                                                    <br>
                                                    <span class="item-content">No Minimal transaction amount <br>Maximum 10,000 PEC (Peracoin)</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Tab image -->
                                    <div class="column is-5">
                                        <img class="animated preFadeInUp fadeInUp" src="img/logo/img-1.png" style="filter: saturate(2) opacity(0.4);" alt="">
                                    </div>
                                </div>
                            </div>
                            <!-- /Tab 2 -->
    
                            <!-- Tab 3 -->
                            <div class="tab-content" :class="{
                                    'is-active': activeTab === 'tab-3',
                                    '': activeTab != 'tab-3'
                                }">
                                <div class="columns is-vcentered tab-content-wrapper">
                                    <!-- Tab content -->
                                    <div class="column is-5 is-offset-1">
                                        <div class="text-content">
                                            <h4 class="title is-6 is-light animated preFadeInUp fadeInUp">PROFIT</h4>
                                            <ul class="custom-bullet-list">
                                                <li class="animated preFadeInUp fadeInUp">
                                                    <span>High Returns and 100% Trusted</span>
                                                    <br>
                                                    
                                                </li>
                                                <li class="animated preFadeInUp fadeInUp">
                                                    <span>+22% Rapid Market price increment</span>
                                                    <br>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Tab image -->
                                    <div class="column is-5">
                                        <img class="animated preFadeInUp fadeInUp" src="img/illustrations/charts.svg" alt="">
                                    </div>
                                </div>
                            </div>
                            <!-- /Tab 3 -->
    
                            <!-- Tab 4 -->
                            <div class="tab-content" :class="{
                                    'is-active': activeTab === 'tab-4',
                                    '': activeTab != 'tab-4'
                                }">
                                <div class="columns is-vcentered tab-content-wrapper">
                                    <!-- Tab content -->
                                    <div class="column is-5 is-offset-1">
                                        <div class="text-content">
                                            <h4 class="title is-6 is-light animated preFadeInUp fadeInUp">REWARDS & BOUNTIES</h4>
                                            <ul class="custom-bullet-list">
                                                <li class="animated preFadeInUp fadeInUp">
                                                    <span>$20000 Total Giveaway awaiting for you</span>
                                                    <br>
                                                    
                                                </li>
                                                <li class="animated preFadeInUp fadeInUp">
                                                    <span>$1000 Goodies and Gifts for 10 Investors</span>
                                                    <br>
                                                    
                                                </li>
                                                <li class="animated preFadeInUp fadeInUp">
                                                    <span>Sponsorship for Students </span>
                                                    <br>
                                                    
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Tab image -->
                                    <div class="column is-5">
                                        <img class="animated preFadeInUp fadeInUp" src="img/illustrations/bounty.svg" alt="">
                                    </div>
                                </div>
                            </div>
                            <!-- /Tab 4 -->
                        </div>
                    </div>
    
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- /Container -->
        </section>
    </div>
        <!-- /ICO section -->
    
        <!-- App section -->
    <div id="perashop">
        <section class="section is-medium is-darkest">
            <!-- Container -->
            <div class="container">
                <!-- Divider -->
                <div class="divider is-centered"></div>
                <!-- Title -->
                <h1 class="title is-light is-semibold has-text-centered is-spaced">Perashop</h1>
    
                <!-- Content wrapper -->
                <div class="content-wrapper is-large">
    
                    <!-- Row -->
                    <div class="columns is-vcentered ">
                        <div class="column is-5">
                            <!-- Side feature -->
                            <div class="side-feature-content">
                                <!-- Title -->
                                <h3 class="title is-4 is-light"><img src="img/logo/img-1.png" alt=""> <span>Buy Peracoin  </span></h3>
                                <!-- Divider -->
                                <div class="divider is-long"></div>
                <h3 class="subtitle is-6 is-light is-compact">Your Total Balance : $<?php echo number_format((float)$user_row['amount'], 2, '.', ''); ?></h3>
                <h3><?php echo $msg1; ?></h3>
                
                <!-- in btn number  -->
                <style>
                input[type="number"] {
  -webkit-appearance: textfield;
  -moz-appearance: textfield;
  appearance: textfield;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
}

.number-input {
  border: 2px solid #ddd;
  display: inline-flex;
}

.number-input,
.number-input * {
  box-sizing: border-box;
}

.number-input button {
  outline:none;
  -webkit-appearance: none;
  background-color: transparent;
  border: none;
  align-items: center;
  justify-content: center;
  width: 3rem;
  height: 3rem;
  cursor: pointer;
  margin: 0;
  position: relative;
  background-color: #6f42c1;
}

.number-input button:before,
.number-input button:after {
  display: inline-block;
  position: absolute;
  content: '';
  width: 1rem;
  height: 2px;
  background-color: #212121;
  transform: translate(-50%, -50%);
}
.number-input button.plus:after {
  transform: translate(-50%, -50%) rotate(90deg);
}

.number-input input[type=number] {
  font-family: sans-serif;
  max-width: 5rem;
  padding: .5rem;
  border: solid #ddd;
  border-width: 0 2px;
  font-size: 2rem;
  height: 3rem;
  font-weight: bold;
  text-align: center;
}
                </style>
                
                <div class="number-input" style="margin: 15px ;">
  <button onclick="this.parentNode.querySelector('input[type=number]').stepDown(); convert();" ></button>
  <input class="quantity step1" min="0" name="quantity" value="0" id="convert_in" onchange="convert()" type="number">
  <button onclick="this.parentNode.querySelector('input[type=number]').stepUp(); convert();" class="plus"></button>
</div>

<form method="POST">
                                <p class="is-light"><label>Total</label><input type="text" id="convert_out" name="total_samount" style="margin: 15px; background: transparent; font-size:larger; font-weight:900; outline: none; border: none;" width="5rem" readonly></p>
                            </div>
                            
                                <input type="submit" class="text button k-button k-primary raised has-gradient is-bold" value="Buy Now" name="s_submit">
                                <span class="front-gradient"></span>
                          
                        </div>
</form>
                        <!-- Featured image -->
                        <div class="column is-7">
                            <img class="side-feature" src="img/illustrations/krypton-app.svg" alt="">
                        </div>
                    </div>
    
                </div>
                <!-- /Content wrapper -->
            </div>
            <!-- /Container -->
        </section>
        </div>
        <!-- /App section -->
    
        <!-- Company section -->
    <div id="offers">
        <section class="section is-medium has-big-dark-gradient">
            <!-- Container -->
            <div class="container">
                <!-- Divider -->
                <div class="divider is-centered"></div>
                <!-- Title & subtitle -->
                <h2 class="title is-light is-semibold has-text-centered is-spaced">Bulk Order</h2>
                <center><h1><?php echo $msg ?></h1></center>
                <h4 class="subtitle is-6 is-light has-text-centered is-compact"></h4>
    
                <!-- Content wrapper -->
                <div class="content-wrapper is-large">
                    <div class="columns is-vcentered">
    
                        <div class="column is-hidden-mobile"></div>
    
                        <!-- Team member -->
                        <div class="column is-3">
                            <div class="team-member-container">
                                <!-- Card -->
                                <div class="dark-card">
                                    <!-- Avatar wrapper -->
                                    <div class="avatar">
                                        <!-- Svg circle -->
                                        <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="140" height="140" xmlns="http://www.w3.org/2000/svg">
                                            <!-- Track -->
                                            <circle class="circle-chart-background" stroke-width="1" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                            <!-- Stroke -->
                                            <circle class="circle-chart-circle" stroke-width="1" stroke-dasharray="33,100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                        </svg>
                                        <!-- Sketeched face -->
                                        <img class="is-sketch" src="img/team/img_1_sketch.png" alt="">
                                        <!-- Real face -->
                                        <img class="is-real" src="img/team/img-1.png" alt="">
                                    </div>
                                    <!-- Member meta -->
                                    <div class="member-info">
                                        <h4 class="title is-light is-6 is-tight">5 coin</h4>
                                      <a href="#offers"> <div class="position">$ <?php echo 5 * $peracoin_rate; ?></div>
                                        <p class="description"><button data-toggle="modal" data-target="#exampleModal"><b>BUY</b></button></p>
                                    </div> </a>
                                </div>
                            </div>
                        </div>


    
                        <!-- Team member -->
                        <div class="column is-3">
                            <div class="team-member-container">
                                <div class="dark-card">
                                    <div class="avatar">
                                        <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="140" height="140" xmlns="http://www.w3.org/2000/svg">
                                            <circle class="circle-chart-background" stroke-width="1" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                            <circle class="circle-chart-circle" stroke-width="1" stroke-dasharray="33,100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                        </svg>
                                        <img class="is-sketch" src="img/team/img_1_sketch.png" alt="">
                                        <img class="is-real" src="img/team/img-1.png" alt="">
                                    </div>
                                    <div class="member-info">
                                        <h4 class="title is-light is-6 is-tight">15 coin</h4>
                                        <div class="position">$ <?php echo 15 * $peracoin_rate; ?></div>
                                        <p class="description"><button data-toggle="modal" data-target="#exampleModal1"><b>BUY</b></button></p>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <!-- Team member -->
                        <div class="column is-3">
                            <div class="team-member-container">
                                <div class="dark-card">
                                    <div class="avatar">
                                        <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="140" height="140" xmlns="http://www.w3.org/2000/svg">
                                            <circle class="circle-chart-background" stroke-width="1" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                            <circle class="circle-chart-circle" stroke-width="1" stroke-dasharray="33,100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                        </svg>
                                        <img class="is-sketch" src="img/team/img_1_sketch.png" alt="">
                                        <img class="is-real" src="img/team/img-1.png" alt="">
                                    </div>
                                    <div class="member-info">
                                        <h4 class="title is-light is-6 is-tight">40 coin</h4>
                                        <div class="position">$ <?php echo 40 * $peracoin_rate; ?></div>
                                        <p class="description"><button data-toggle="modal" data-target="#exampleModal2"><b>BUY</b></button></p>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="column is-hidden-mobile"></div>
                    </div>
    
                    <div class="columns is-vcentered">
    
                        <div class="column is-hidden-mobile"></div>
    
                        <!-- Team member -->
                        <div class="column is-3">
                            <div class="team-member-container">
                                <div class="dark-card">
                                    <div class="avatar">
                                        <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="140" height="140" xmlns="http://www.w3.org/2000/svg">
                                            <circle class="circle-chart-background" stroke-width="1" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                            <circle class="circle-chart-circle" stroke-width="1" stroke-dasharray="33,100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                        </svg>
                                        <img class="is-sketch" src="img/team/img_1_sketch.png" alt="">
                                        <img class="is-real" src="img/team/img-1.png" alt="">
                                    </div>
                                    <div class="member-info">
                                        <h4 class="title is-light is-6 is-tight">60 coin</h4>
                                        <div class="position">$ <?php echo 60 * $peracoin_rate; ?></div>
                                        <p class="description"><button data-toggle="modal" data-target="#exampleModal3"><b>BUY</b></button></p>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <!-- Team member -->
                        <div class="column is-3">
                            <div class="team-member-container">
                                <div class="dark-card">
                                    <div class="avatar">
                                        <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="140" height="140" xmlns="http://www.w3.org/2000/svg">
                                            <circle class="circle-chart-background" stroke-width="1" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                            <circle class="circle-chart-circle" stroke-width="1" stroke-dasharray="33,100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                        </svg>
                                        <img class="is-sketch" src="img/team/img_1_sketch.png" alt="">
                                        <img class="is-real" src="img/team/img-1.png" alt="">
                                    </div>
                                    <div class="member-info">
                                        <h4 class="title is-light is-6 is-tight">100 coin</h4>
                                        <div class="position">$ <?php echo 100 * $peracoin_rate; ?></div>
                                        <p class="description"><button data-toggle="modal" data-target="#exampleModal4"><b>BUY</b></button></p>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <!-- Team member -->
                        <div class="column is-3">
                            <div class="team-member-container">
                                <div class="dark-card">
                                    <div class="avatar">
                                        <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="140" height="140" xmlns="http://www.w3.org/2000/svg">
                                            <circle class="circle-chart-background" stroke-width="1" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                            <circle class="circle-chart-circle" stroke-width="1" stroke-dasharray="33,100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                        </svg>
                                        <img class="is-sketch" src="img/team/img_1_sketch.png" alt="">
                                        <img class="is-real" src="img/team/img-1.png" alt="">
                                    </div>
                                    <div class="member-info">
                                        <h4 class="title is-light is-6 is-tight">250 coin</h4>
                                        <div class="position">$ <?php echo 250 * $peracoin_rate; ?></div>
                                        <p class="description"><button data-toggle="modal" data-target="#exampleModal5"><b>BUY</b></button></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="column is-hidden-mobile"></div>
                    </div>
                </div>
    </div>
    
                    <!-- Spaced divider -->
                    
                    <!-- Content wrapper -->
                    <div class="content-wrapper is-large">
                        <div class="columns is-vcentered is-multiline">
    
                            <!-- Advisor -->
                            <div class="column is-one-fifth">
                                <div class="advisor-container has-text-centered">
                                    <!-- Picture -->
                                    
                                    <!-- Meta -->
                                    
                                </div>
                            </div>
                            <div class="column is-one-fifth">
                                <div class="advisor-container has-text-centered">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Content wrapper -->
    
                <div id="blog">
                    <div class="content-wrapper is-large">
                        <div class="columns">
                            <div class="column is-5 is-offset-1"></div>
                        </div>
                    </div>
                    <!-- /Content wrapper -->
    
                    <!-- Spaced divider -->
                    
                <!-- /Content wrapper -->
            </div>
        </section>
        <!-- /Company section -->
    
        <!-- Contact section -->
        <section class="section is-medium is-darkest">
            <!-- Container -->
            <div class="container">
                <!-- Divider -->
                <div class="divider is-centered"></div>
                <!-- Title & subtitle -->
                <h2 class="title is-light is-semibold has-text-centered is-spaced">Get in Touch</h2>
                <h4 class="subtitle is-6 is-light has-text-centered is-compact"></h4>
    
                <!-- Content wrapper -->
                <div class="content-wrapper is-large">
                    <div class="columns">
                        <div class="column is-8 is-offset-2">
                            <!-- Contact icons -->
                            <div class="contact-icons">
                                <!-- Phone -->
                                <a class="contact-icon" data-aos="fade-up" data-aos-delay="100" data-aos-offset="200" data-aos-easing="ease-out-quart">
                                    <img class="is-phone" src="img/icons/linkedin.svg" alt="">
                                </a>
                                <!-- Mail -->
                                <a class="contact-icon" data-aos="fade-up" data-aos-delay="300" data-aos-offset="200" data-aos-easing="ease-out-quart">
                                    <img class="is-phone" src="img/icons/mail.svg" alt="">
                                </a>
                                <!-- Telegram -->
                                <a class="contact-icon" data-aos="fade-up" data-aos-delay="500" data-aos-offset="200" data-aos-easing="ease-out-quart">
                                    <img class="is-telegram" src="img/icons/instagram.svg" alt="" >
                                </a>
                            </div> 
                        </div>
                    </div>
    
                    
    
    
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- Container -->
        </section>
        <!-- Contact section -->
    </div>
    
    <footer class="krypton-footer">
        <div class="container">
            <!-- Logo -->
            <div class="footer-logo">
                <a href="#">
                    <img class="" src="img/logo/logo.png" alt="">
                    <div class="brand-name">Peradot</div>
                    <div class="brand-subtitle"></div>
                </a>
            </div>
            
            <!-- Columns -->
            <div class="columns footer-columns is-vcentered">
                <div class="column is-4">
                    <!-- Links group -->
                    <ul class="footer-links">
                        
    
                        <li>
                            <a href="index.php#ico">ICO</a>
                        </li>
    
                        <li>
                            <a href="index.php#perashop">Shop</a>
                        </li>
                    </ul>
                </div>
                <!-- Newsletter -->
                <div class="column is-4">
                    <div class="subscribe-block">
                        <form>
                            <!-- Field -->
                            <div class="control">
                                <!-- Special input -->
                                <input class="krypton-subscribe-input" type="email" name="email" placeholder="">
                                <button class="subscribe-button">
                                    <span>Subscribe</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Links group -->
                <div class="column is-4">
                    <ul class="footer-links">
                        <li>
                            <a href="roadmap.php">roadmap</a>
                        </li>

                        <li>
                            <a href="#">Register</a>
                        </li>                       
                    </ul>
                </div>
            </div>
            <!-- Copyright -->
            <p class="k-copyright">© 2022 | Peradot. All Rights Reserved</p>
            <br>
            <!-- Made by -->
            <p class="coded-by">By Peradot Foundation.</p>
        </div>
        
        <!-- Absolute image -->
        <img class="solar-system" src="img/bg/solar.svg" alt="">
    </footer>    <!-- Back To Top Button -->
    <div x-data="initBackToTop()" x-on:scroll.window="scroll($event)" @click="goTop($event)" id="backtotop"><a href="javascript:" :class="{
        'visible': scrolled,
        '': !scrolled
    }"></a></div>




                            <!-- modal start  -->
<form action="" method="post">
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999;">
                                                            <div class="modal-dialog" role="document" style="z-index: 9999;">
                                                                <div class="modal-content" style="z-index: 9999;">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" style="z-index: 9999;">
                                                                    <p><b>$ <?php echo 5 * $peracoin_rate; ?></b> will be deducted from your account to buy <b>5 Paradot Coin.</b></p>
                                                                    <p>Do you want to proceed??</p>
                                                                </div>
                                                                <div class="modal-footer" style="z-index: 9999;">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary" name="package1">Confirm</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999;">
                                                            <div class="modal-dialog" role="document" style="z-index: 9999;">
                                                                <div class="modal-content" style="z-index: 9999;">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" style="z-index: 9999;">
                                                                    <p><b>$ <?php echo 15 * $peracoin_rate; ?></b> will be deducted from your account to buy <b>15 Paradot Coin.</b></p>
                                                                    <p>Do you want to proceed??</p>
                                                                </div>
                                                                <div class="modal-footer" style="z-index: 9999;">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary" name="package2">Confirm</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999;">
                                                            <div class="modal-dialog" role="document" style="z-index: 9999;">
                                                                <div class="modal-content" style="z-index: 9999;">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" style="z-index: 9999;">
                                                                    <p><b>$ <?php echo 45 * $peracoin_rate; ?></b> will be deducted from your account to buy <b>40 Paradot Coin.</b></p>
                                                                    <p>Do you want to proceed??</p>
                                                                </div>
                                                                <div class="modal-footer" style="z-index: 9999;">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary" name="package3">Confirm</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999;">
                                                            <div class="modal-dialog" role="document" style="z-index: 9999;">
                                                                <div class="modal-content" style="z-index: 9999;">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" style="z-index: 9999;">
                                                                    <p><b>$ <?php echo 60 * $peracoin_rate; ?></b> will be deducted from your account to buy <b>60 Paradot Coin.</b></p>
                                                                    <p>Do you want to proceed??</p>
                                                                </div>
                                                                <div class="modal-footer" style="z-index: 9999;">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary" name="package4">Confirm</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999;">
                                                            <div class="modal-dialog" role="document" style="z-index: 9999;">
                                                                <div class="modal-content" style="z-index: 9999;">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" style="z-index: 9999;">
                                                                    <p><b>$ <?php echo 100 * $peracoin_rate; ?></b> will be deducted from your account to buy <b>100 Paradot Coin.</b></p>
                                                                    <p>Do you want to proceed??</p>
                                                                </div>
                                                                <div class="modal-footer" style="z-index: 9999;">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary" name="package5">Confirm</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999;">
                                                            <div class="modal-dialog" role="document" style="z-index: 9999;">
                                                                <div class="modal-content" style="z-index: 9999;">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" style="z-index: 9999;">
                                                                    <p><b>$ <?php echo 250 * $peracoin_rate; ?></b> will be deducted from your account to buy <b>250 Paradot Coin.</b></p>
                                                                    <p>Do you want to proceed??</p>
                                                                </div>
                                                                <div class="modal-footer" style="z-index: 9999;">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary" name="package6">Confirm</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                        </form>


                        <!-- modal end  -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="./js/bundle.js"></script>
    <script>
        function convert() {
            var price_sql = <?php echo $current_price;?>;
            var convert_out = document.getElementById('convert_out').value;
            var convert_in = document.getElementById('convert_in').value;
            var convert_result = price_sql * convert_in;
            document.getElementById('convert_out').value = "$ " + convert_result;
        }
    </script>
    <!-- sheperd script  -->
    <script>
        const tour = new Shepherd.Tour({
  defaultStepOptions: {
    cancelIcon: {
      enabled: true
    },
    classes: 'class-1 class-2',
    scrollTo: { behavior: 'smooth', block: 'center' }
  }
});

tour.addStep({
  title: '👋🏻Welcome To Perashop',
  text: `Want to have a tour of perashop ?\
  Just a short lovely \`Tour\` of digital peracoin shop.`,
  attachTo: {
    element: '.hero-example',
    on: 'top'
  },
  buttons: [
    {
      action() {
        return this.cancel();
      },
      classes: 'shepherd-button-secondary',
      text: 'No Thanks!'
    },
    {
      action() {
        return this.next();
      },
      text: 'SURE!!'
    }
  ],
  id: 'creating'
});


tour.addStep({
  title: 'You can Buy Peracoin Here !',
  text: `The amount will be deducted from your total balance.`,
  attachTo: {
    element: '.step1',
    on: 'bottom'
  },
  buttons: [
    {
      action() {
        return this.back();
      },
      classes: 'shepherd-button-secondary',
      text: 'Back'
    },
    {
      action() {
        return this.next();
      },
      text: 'Next'
    }
  ],
  id: 'creating'
});


tour.addStep({
  title: 'Hold Period',
  text: `Newly redeemed coins will be on hold for 3 Months.`,
  attachTo: {
    element: '.step2',
    on: 'bottom'
  },
  buttons: [
    {
      action() {
        return this.back();
      },
      classes: 'shepherd-button-secondary',
      text: 'Back'
    },
    {
      action() {
        return this.next();
      },
      text: 'Next'
    }
  ],
  id: 'creating'
});

tour.addStep({
  title: 'PROFIT',
  text: `High Returns and 100% Trusted.`,
  attachTo: {
    element: '.step3',
    on: 'top'
  },
  buttons: [
    {
      action() {
        return this.back();
      },
      classes: 'shepherd-button-secondary',
      text: 'Back'
    },
    {
      action() {
        return this.next();
      },
      text: 'Next'
    }
  ],
  id: 'creating'
});


tour.addStep({
  title: 'RATES',
  text: `It will display the peracoin rates.`,
  attachTo: {
    element: '.step4',
    on: 'bottom'
  },
  buttons: [
    {
      action() {
        return this.back();
      },
      classes: 'shepherd-button-secondary',
      text: 'Back'
    },
    {
      action() {
        return this.next();
      },
      text: 'NEXT'
    }
  ],
  id: 'creating'
});


tour.addStep({
  title: 'GIVEAWAYS',
  text: `It will display REWARDS & BOUNTIES.`,
  attachTo: {
    element: '.step5',
    on: 'bottom'
  },
  buttons: [
    {
      action() {
        return this.back();
      },
      classes: 'shepherd-button-secondary',
      text: 'Back'
    },
    {
      action() {
        return this.next();
      },
      text: 'FINISH'
    }
  ],
  id: 'creating'
});
    
//   function setCookie(cname, cvalue, exdays) {
//   const d = new Date();
//   d.setTime(d.getTime() + (exdays*24*60*60*1000));
//   let expires = "expires="+ d.toUTCString();
//   document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
//   }
//   function getCookie(cname) {
//   let name = cname + "=";
//   let ca = document.cookie.split(';');
//   for(let i = 0; i < ca.length; i++) {
//     let c = ca[i];
//     while (c.charAt(0) == ' ') {
//       c = c.substring(1);
//     }
//     if (c.indexOf(name) == 0) {
//       return c.substring(name.length, c.length);
//     }
//   }
//   return "";
// }

// function checkCookie() {
//   let user = getCookie("username");
//   if (user != "") {
//     alert("Welcome again " + user);
//   } else {
//     user = prompt("Please enter your name:", "");
//     if (user != "" && user != null) {
//       setCookie("username", user, 365);
//      
//     }
//   }
  
// }
    

tour.start();

    </script>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

</body>

</html>