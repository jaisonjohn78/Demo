<?php
    include '../../../config.php';
    include '../../../function.php';
    
    
    if (!isset($_SESSION["id"])) {
      header("Location: ../../../index/login.php");
    }
    
    $id = $_SESSION['id'];
    $user_sql = mysqli_query($con, "SELECT * FROM users WHERE id = $id");
    $user_row = mysqli_fetch_assoc($user_sql);
    $username = $user_row['username'];
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
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;700&display=swap" rel="stylesheet">
    <style>
        #username{
            position: relative;
            right: -218px;
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
                                    <a href="#" class="button k-button k-primary raised has-gradient slanted">
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
                                    <a href="#" class="button k-button k-primary raised has-gradient slanted">
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
                    <a class="button k-button k-secondary raised has-gradient is-fat is-bold rounded">
                        <span class="text">Buy Tokens 20% off</span>
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
                                <div @click="switchTabs($event)" class="flying-child tab-2" data-tab="tab-2" :class="{
                                    'is-active': activeTab === 'tab-2',
                                    '': activeTab != 'tab-2'
                                }"><a href="javascript:void(0);">TOKEN</a></div>
                                <div @click="switchTabs($event)" class="flying-child tab-3" data-tab="tab-3" :class="{
                                    'is-active': activeTab === 'tab-3',
                                    '': activeTab != 'tab-3'
                                }"><a href="javascript:void(0);">PROFIT</a></div>
                                <div @click="switchTabs($event)" class="flying-child tab-4" data-tab="tab-4" :class="{
                                    'is-active': activeTab === 'tab-4',
                                    '': activeTab != 'tab-4'
                                }"><a href="javascript:void(0);">BOUNTY</a></div>
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
                                                    <span>Presale</span>
                                                    <br>
                                                    <span class="item-content">Presale starts on Apr 8 2021 (9:00am GMT)</span>
                                                </li>
                                                <li class="animated preFadeInUp fadeInUp">
                                                    <span>Sale</span>
                                                    <br>
                                                    <span class="item-content">Token sales starts on Jun 8 2021 (12:00am GMT)</span>
                                                </li>
                                                <li class="animated preFadeInUp fadeInUp">
                                                    <span>Bonus</span>
                                                    <br>
                                                    <span class="item-content">Bonus starts on July 29 2021 (12:00am GMT)</span>
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
                                                <progress class="progress ico-progress" value="65" max="100">65%</progress>
                                            </div>
    
                                            <!-- Button -->
                                            <div class="button-block">
                                                <span class="button k-button k-secondary raised has-gradient is-bold is-fullwidth rounded"><a href="#offers">Buy Now</a></span>
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
                                            <h4 class="title is-6 is-light animated preFadeInUp fadeInUp">TOKEN RATES</h4>
                                            <ul class="custom-bullet-list">
                                                <li class="animated preFadeInUp fadeInUp">
                                                    <span>Tokens Sales</span>
                                                    <br>
                                                    <span class="item-content">1 200 000 KP (22%)</span>
                                                </li>
                                                <li class="animated preFadeInUp fadeInUp">
                                                    <span>Token Exchange</span>
                                                    <br>
                                                    <span class="item-content">1 BTC = 2200 KP, 1 ETH = 825 KP</span> 
                                                </li>
                                                <li class="animated preFadeInUp fadeInUp">
                                                    <span>Transations</span>
                                                    <br>
                                                    <span class="item-content">Minimal transaction amount is 1 BTC, 1 ETH, 1 LTC</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Tab image -->
                                    <div class="column is-5">
                                        <img class="animated preFadeInUp fadeInUp" src="img/logo/img-1.png" alt="">
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
                                                    <span>Tokens Sales</span>
                                                    <br>
                                                    <span class="item-content">1 200 000 KP (22%)</span>
                                                </li>
                                                <li class="animated preFadeInUp fadeInUp">
                                                    <span>Token Exchange</span>
                                                    <br>
                                                    <span class="item-content">1 BTC = 2200 KP, 1 ETH = 825 KP</span> 
                                                </li>
                                                <li class="animated preFadeInUp fadeInUp">
                                                    <span>Transations</span>
                                                    <br>
                                                    <span class="item-content">Minimal transaction amount is 1 BTC, 1 ETH, 1 LTC</span>
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
                                                    <span>Tokens Sales</span>
                                                    <br>
                                                    <span class="item-content">1 200 000 KP (22%)</span>
                                                </li>
                                                <li class="animated preFadeInUp fadeInUp">
                                                    <span>Token Exchange</span>
                                                    <br>
                                                    <span class="item-content">1 BTC = 2200 KP, 1 ETH = 825 KP</span> 
                                                </li>
                                                <li class="animated preFadeInUp fadeInUp">
                                                    <span>Transations</span>
                                                    <br>
                                                    <span class="item-content">Minimal transaction amount is 1 BTC, 1 ETH, 1 LTC</span>
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
                    <div class="columns is-vcentered">
                        <div class="column is-5">
                            <!-- Side feature -->
                            <div class="side-feature-content">
                                <!-- Title -->
                                <h3 class="title is-4 is-light"><img src="img/logo/img-1.png" alt=""> <span>Buy Peracoin  </span></h3>
                                <!-- Divider -->
                                <div class="divider is-long"></div>
                <h3 class="subtitle is-6 is-light is-compact">Your Total Ballance : $9999</h3>

                                <p class="is-light"><label>BTC</label><input type="number" id="convert_in"  style="margin: 15px ;"></p>
                                <p class="is-light"><label>USD</label><input type="number" id="convert_out"  style="margin: 15px ;" width="5rem"></p>
                            </div>
                            <a href="#" class="button k-button k-primary raised has-gradient is-bold">
                                <span class="text">Convert</span>
                                <span class="front-gradient"></span>
                            </a>
                        </div>
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
                <h2 class="title is-light is-semibold has-text-centered is-spaced">Best Offers</h2>
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
                                        <h4 class="title is-light is-6 is-tight">10 coin</h4>
                                        <div class="position">$ 5</div>
                                        <p class="description"><button><b>BUY</b></button></p>
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
                                        <h4 class="title is-light is-6 is-tight">5 coin</h4>
                                        <div class="position">$ 15</div>
                                        <p class="description"><button><b>BUY</b></button></p>
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
                                        <h4 class="title is-light is-6 is-tight">10 coin</h4>
                                        <div class="position">$ 30</div>
                                        <p class="description"><button><b>BUY</b></button></p>
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
                                        <h4 class="title is-light is-6 is-tight">15 coin</h4>
                                        <div class="position">$ 45</div>
                                        <p class="description"><button><b>BUY</b></button></p>
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
                                        <h4 class="title is-light is-6 is-tight">20 coin</h4>
                                        <div class="position">$ 60</div>
                                        <p class="description"><button><b>BUY</b></button></p>
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
                                        <h4 class="title is-light is-6 is-tight">25 coin</h4>
                                        <div class="position">$ 75</div>
                                        <p class="description"><button><b>BUY</b></button></p>
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
                                    <img class="is-phone" src="img/icons/phone.svg" alt="">
                                </a>
                                <!-- Mail -->
                                <a class="contact-icon" data-aos="fade-up" data-aos-delay="300" data-aos-offset="200" data-aos-easing="ease-out-quart">
                                    <img class="is-phone" src="img/icons/mail.svg" alt="">
                                </a>
                                <!-- Telegram -->
                                <a class="contact-icon" data-aos="fade-up" data-aos-delay="500" data-aos-offset="200" data-aos-easing="ease-out-quart">
                                    <img class="is-telegram" src="img/logo/telegram.svg" alt="">
                                </a>
                            </div> 
                        </div>
                    </div>
    
                    <div class="columns">
                        <div class="column is-6 is-offset-3">
                            <!-- Form -->
                            <form action="https://formsubmit.co/peradotfoundation@gmail.com" method="POST">                          
                                <!-- Field -->
                                <div class="control-material is-secondary">      
                                    <input class="material-input " type="text" required>
                                    <span class="material-highlight"></span>
                                    <span class="bar"></span>
                                    <label>Name</label>
                                </div>
                                <!-- Field -->
                                <div class="control-material is-secondary">      
                                    <input class="material-input " type="email" required>
                                    <span class="material-highlight"></span>
                                    <span class="bar"></span>
                                    <label>Email</label>
                                </div>
                                <!-- Field -->
                                <div class="control-material is-secondary">  
                                    <input class="material-input " type="text" required>
                                    <span class="material-highlight"></span>
                                    <span class="bar"></span>
                                    <label>Message </label>
                                </div>
    
                                <!-- Submit -->
                                <div class="has-text-centered">
                                    <button class="button is-button k-button k-primary raised has-gradient is-fat is-bold is-submit">
                                        <span class="text">Send message</span>
                                        <span class="front-gradient"></span>
                                    </button>
                                </div>
                            </form>
                            <!-- /Form -->
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
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="./js/bundle.js"></script>
    <script>
        document.getElementById('convert_in').onchange( function() {
            var convert_out = document.getElementById('convert_out').value;
            var convert_in = document.getElementById('convert_in').value;
            var convert_result = 10;
            document.getElementById('convert_out').value = convert_result;
        });
    </script>

</body>

</html>