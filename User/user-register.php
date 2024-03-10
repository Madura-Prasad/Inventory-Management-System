<?php 

require_once 'inc/Header.php'; 

include("DB_Files/db.php");
$name = '';
$number = '';
$address = '';
$mail = '';
$pass = '';
$pass2 = '';

if (isset($_POST['signup'])) {


    $name = $_POST['name'];
    $number=$_POST['mobile'];
    $address=$_POST['address'];
    $mail = $_POST['email'];
    $pass = $_POST['password'];
    $pass2 = $_POST['c_password'];

    //Name Validation
    $name = $_POST['name'];
    if (empty($name)) {
        $error_msg['Name'] = "Name is Required";
    } else if (!preg_match("/^[a-zA-Z -]*$/", $name)) {
        $error_msg['Name'] = "Name Must be Only Letter";
    } else if (strlen($name) < 5) {
        $error_msg['Name'] = "Name Must be Minimum 5 Letters";
    }


    //Email Validation
    $mail = $_POST['email'];
    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $mail)) {
        $error_msg['Email'] = "Invalid Email Address";
    }

    //Number Validation
    $number = $_POST['mobile'];
    if (empty($number)) {
        $error_msg['Number'] = "Number is Required";
    }

    //Address Validation
    $address = $_POST['address'];
    if (empty($address)) {
        $error_msg['Address'] = "Address is Required";
    }

    //Password Validation
    $pass = $_POST['password'];
    if (empty($pass)) {
        $error_msg['Password'] = "Password is Required";
    }

    //Confirm Password Validation
    $pass2 = $_POST['c_password'];
    if (empty($pass2)) {
        $error_msg['C_password'] = "Confirm Password is Required";
    }



    //Signup Code
    if ($name && $mail && $pass) {
        $email_query = "SELECT * FROM users WHERE email='$mail'";
        $email_query_run = mysqli_query($conn, $email_query);
        if (mysqli_num_rows($email_query_run) > 0) {
            $error_msg['Email'] = "Email Already Taken";
        } else {
            if ($pass == $pass2) {
                if (preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $pass)) {
                    $pass = md5($pass);
                    $sql = "INSERT INTO users (username, password, email, address,mobile) VALUES ('" . $name . "','" . $pass . "','" . $mail . "','" . $address . "','" . $number . "')";
                    if ($conn->query($sql)) {
                        $success = true;
                        $name = "";
                        $mail = "";
                        $address = "";
                        $number = "";
                        $password = '';
                        $cpassword = '';
                    } else {
                        $error[] = "Server Error";
                    }
                } else {
                    $error_msg['Password'] = "Password Too Weak";
                }
            } else {
                $error_msg['C_password1'] = "Password Does not Matched";
            }
        }
    }
}
?>

<style>
    .validationError{
        color: red;
        font-weight: bold;
        text-align: start;
        margin-left: 20px;
        font-size: 12px;
    }
</style>
<br><br><br><br><br>
    <!-- main content -->
    <div class="main-content">
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
                                    <span>Register</span>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </nav>
        </div>
        <br><br><br><br><br><br>
        <!-- main -->
        <div id="wrapper-site">
            <div class="container">
                <div class="row">
                    <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 onecol">
                        <div id="main">
                            <div id="content" class="page-content">
                                <div class="register-form text-center">
                                    <h1 class="text-center title-page">Create Account</h1>
                                    <form action="#" id="customer-form" class="js-customer-form" method="post">
                                    <?php
                if (!empty($error)) {
                    foreach ($error as $key => $value) {
                        # code...
                ?>
                        <div class="text-danger fw-bold"><?php echo $value; ?></div>
                    <?php
                    }
                }
                if (isset($success)) {
                    ?>
                    <div class="text-success fw-bold">Registered successfully!</div>
                <?php
                }
                ?>
                <br><br>
                                        <div>
                                            <div class="form-group">
                                                <div>
                                                    <input class="form-control" name="name" type="text" placeholder="Name">
                                                </div>
                                            </div>
                                            <?php
                if (isset($error_msg['Name'])) {
                    echo "<div class='validationError'>" . $error_msg['Name'] . "</div>";
                }
                ?>
                                            <div class="form-group">
                                                <div>
                                                    <input class="form-control" name="mobile" type="text" placeholder="Mobile Number">
                                                </div>
                                            </div>
                                            <?php
                if (isset($error_msg['Number'])) {
                    echo "<div class='validationError'>" . $error_msg['Number'] . "</div>";
                }
                ?>
                                            <div class="form-group">
                                                <div>
                                                    <input class="form-control" name="address" type="text" placeholder="Address">
                                                </div>
                                            </div>
                                            <?php
                if (isset($error_msg['Address'])) {
                    echo "<div class='validationError'>" . $error_msg['Address'] . "</div>";
                }
                ?>
                                            <div class="form-group">
                                                <div>
                                                    <input class="form-control" name="email" type="email" placeholder="Email">
                                                </div>
                                            </div>
                                            <?php
                if (isset($error_msg['Email'])) {
                    echo "<div class='validationError'>" . $error_msg['Email'] . "</div>";
                }
                ?>
                                            <div class="form-group">
                                                <div>
                                                    <div class="input-group js-parent-focus">
                                                        <input class="form-control js-child-focus js-visible-password" name="password" type="password" placeholder="Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                if (isset($error_msg['Password'])) {
                    echo "<div class='validationError'>" . $error_msg['Password'] . "</div>";
                }
                if (isset($error_msg['C_password1'])) {
                    echo "<div class='validationError'>" . $error_msg['C_password1'] . "</div>";
                }
                ?>
                                            <div class="form-group">
                                                <div>
                                                    <div class="input-group js-parent-focus">
                                                        <input class="form-control js-child-focus js-visible-password" name="c_password" type="password" placeholder="Conform Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                if (isset($error_msg['C_password'])) {
                    echo "<div class='validationError'>" . $error_msg['C_password'] . "</div>";
                }
                ?>
                                        </div>
                                        <div class="clearfix">
                                            <div>
                                                <button class="btn btn-primary" data-link-action="sign-in" name="signup" type="submit">
                                                    Create Account
                                                </button>
                                            </div>
                                            <div style="text-align: center; margin-top: 20px; margin-bottom: 20px;">
                                <p>Already Account?</p>
                                <a href="user-login.php">Login</a>
                                </div>
                                        </div>
                                    </form>
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

    <!-- Template JS -->
    <script src="js/theme.js"></script>
</body>


<!-- user-register11:10-->
</html>