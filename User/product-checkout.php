<?php
//require_once 'inc/Header.php'; 
session_start();
include_once("DB_Files/db.php");

if (!isset($_SESSION['username'])) {
    header("Location:user-login.php");
}

if (isset($_GET['Product_name'])) {
    $product_name = $_GET['Product_name'];
}


$name = '';
$mail = '';
$number = '';
$pname = '';
$qtn = '';


if (isset($_POST['signup'])) {


    $name = $_POST['name'];
    $mail = $_POST['email'];
    $number = $_POST['mobile'];
    $pname = $_POST['pname'];
    $qtn = $_POST['qtn'];

    // Prepare and bind parameters to avoid SQL injection
    $sql = "INSERT INTO request (name, email, phone, pname, qtn) VALUES ('" . $name . "','" . $mail . "','" . $number . "','" . $pname . "','" . $qtn . "')";
    if ($conn->query($sql)) {
        $success = true;
        $name = "";
        $mail = "";
        $number = "";
        $pname = "";
        $qtn = "";
        header("Location:product-grid-sidebar-left.php");
    } else {
        $error[] = "Server Error";
    }
}
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                                echo '<option value="user-acount.php">Profile</option>'; // Link to user profile page
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
    <!-- main content -->
    <br><br><br><br><br>
    <div id="checkout" class="main-content">
        <div class="wrap-banner">
            <!-- breadcrumb -->
            <nav class="breadcrumb-bg">
                <div class="container no-index">
                    <div class="breadcrumb">
                        <ol>
                            <li>
                                <a href="#">
                                    <span>Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>Request Order</span>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </nav>
            <br><br><br>
            <!-- main -->
            <div id="wrapper-site">
                <div class="container">
                    <div class="row">
                        <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 onecol">
                            <div id="main">
                                <div class="cart-grid row">
                                    <div class="col-md-9 check-info">
                                        <div class="checkout-personal-step">
                                            <h3 class="step-title h3 info">
                                                Request Order
                                            </h3>
                                        </div>
                                        <div class="content">
                                            <ul class="nav nav-inline">
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active show" id="checkout-guest-form" role="tabpanel">
                                                    <form action="" id="customer-form" class="js-customer-form" method="post">
                                                        <br><br><br>
                                                        <div>
                                                            <input type="hidden" name="id_customer" value="">
                                                            <div class="form-group row">
                                                                <input class="form-control" name="name" type="text" placeholder="Full Name" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" readonly>
                                                            </div>
                                                            <div class="form-group row">
                                                                <input class="form-control" name="email" type="email" placeholder="Email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" readonly>
                                                            </div>
                                                            <div class="form-group row">
                                                                <input class="form-control" name="mobile" type="number" placeholder="Phone">
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="input-group js-parent-focus">
                                                                    <input class="form-control js-child-focus" name="pname" type="text" readonly placeholder=" Product Name" value="<?php echo htmlspecialchars($product_name); ?>">
                                                                </div>
                                                            </div>
                                                            <div class="hidden-comment">
                                                                <div class="form-group row">
                                                                    <input class="form-control" name="qtn" type="number" value="" placeholder="Quantity">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="clearfix">
                                                            <div class="row">
                                                                <input type="hidden" name="submitCreate" value="1">

                                                                <button class="continue btn btn-primary pull-xs-right" name="signup" data-link-action="register-new-customer" type="submit"  value="1">
                                                                    Request Order
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <br><br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once 'inc/Footer.php'; ?>

    <!-- Vendor JS -->
    <script src="libs/jquery/jquery.min.js"></script>
    <script src="libs/popper/popper.min.js"></script>
    <script src="libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="libs/nivo-slider/js/jquery.nivo.slider.js"></script>
    <script src="libs/owl-carousel/owl.carousel.min.js"></script>
    <script src="libs/slider-range/js/tmpl.js"></script>
    <script src="libs/slider-range/js/jquery.dependClass-0.1.js"></script>
    <script src="libs/slider-range/js/draggable-0.1.js"></script>
    <script src="libs/slider-range/js/jquery.slider.js"></script>
    <script src="libs/slick-slider/js/slick.min.js"></script>

    <!-- Template JS-->
    <script src="js/theme.js"></script>
</body>


<!-- product-checkout07:13-->

</html>