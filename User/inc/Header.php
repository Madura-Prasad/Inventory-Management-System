<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cyber Deck</title>

    <meta name="keywords" content="Furniture, Decor, Interior">
    <meta name="description" content="Furnitica - Minimalist Furniture HTML Template">
    <meta name="author" content="tivatheme">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="libs/font-material/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="libs/nivo-slider/css/nivo-slider.css">
    <link rel="stylesheet" href="libs/nivo-slider/css/animate.css">
    <link rel="stylesheet" href="libs/nivo-slider/css/style.css">
    <link rel="stylesheet" href="libs/owl-carousel/assets/owl.carousel.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/reponsive.css">
</head>

<body id="home">
    <header>
        <!-- header left mobie -->
        <div class="header-mobile d-md-none">
            <div class="mobile hidden-md-up text-xs-center d-flex align-items-center justify-content-around">
                <!-- logo -->
                <div class="mobile-logo">
                    <a href="index.php">
                        <h4 style="color:white;">Cyber Deck</h4>
                    </a>
                </div>

                <!-- menu right -->
                <div class="mobile-menutop" data-target="#mobile-pagemenu">
                    <i class="zmdi zmdi-more"></i>
                </div>
            </div>


        </div>

        <!-- header desktop -->
        <div class="header-top d-xs-none ">
            <div class="container">
                <div class="row">
                    <!-- logo -->
                    <div class="col-sm-2 col-md-2 d-flex align-items-center">
                        <div id="logo">
                            <a href="index.php">
                                <h4>Cyber Deck</h4>
                            </a>
                        </div>
                    </div>

                    <!-- menu -->
                    <div class="main-menu col-sm-4 col-md-5 align-items-center justify-content-center navbar-expand-md">
                        <div class="menu navbar collapse navbar-collapse">
                            <ul class="menu-top navbar-nav">
                                <li>
                                    <a href="index.php" class="parent">Home</a>
                                </li>
                                <li>
                                    <a href="blog-detail.php" class="parent">Blog</a>
                                </li>
                                <li>
                                    <a href="product-grid-sidebar-left.php" class="parent">Shop</a>
                                    <div class="dropdown-menu drop-tab">
                                    </div>
                                </li>
                                <li>
                                    <a href="about-us.php" class="parent">About Us</a>
                                </li>
                                <li>
                                    <a href="contact.php" class="parent">Contact US</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- search-->
                    <div id="search_widget" class="col-sm-6 col-md-5 align-items-center justify-content-end d-flex">

                        <!-- account  -->
                        <div id="block_myaccount_infos" class="hidden-sm-down dropdown">
                            <?php

                            // Check if session has started and user is logged in
    if (isset($_SESSION['id']) && isset($_SESSION['email']) && isset($_SESSION['username'])) {
        // If logged in, display user information or any other relevant content
        echo '<select style="border:none;" class="form-control" id="accountDropdown" onchange="redirectToPage(this)">';
        echo '<option disabled selected>Welcome, ' . $_SESSION['username'] . '</option>';
        echo '<option value="user-acount.php">Purchase History</option>'; // Link to user profile page
        echo '<option value="logout.php">Logout</option>'; // Link to logout page
        echo '</select>';
    } else {
        // If not logged in, display the Sign In button
        echo '<a class="login" href="user-login.php" rel="nofollow" title="Log in to your customer account">';
        echo '<i style="font-size:18px;" class="fa fa-user"></i>';
        echo '<span style="font-size:18px;"> Sign In</span>';
        echo '</a>';
    }
    ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script>
    // JavaScript function to redirect based on selected option
    function redirectToPage(select) {
        var selectedOption = select.value;
        if (selectedOption !== "") {
            window.location.href = selectedOption;
        }
    }
</script>

