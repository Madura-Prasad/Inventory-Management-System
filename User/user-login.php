<?php require_once 'inc/Header.php'; ?>
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
                                <span>Login</span>
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
        <div id="content-wrapper" class="full-width">
            <div id="main">
                <div class="container">
                    <h1 class="text-center title-page">Log In</h1>
                    <div class="login-form">
                        <form id="customer-form login" action="signinDb.php" method="post">
                            <?php
                            if (!empty($errors)) {
                                foreach ($errors as $key => $value) {
                            ?>
                                    <div class="text-danger fw-bold"><?php echo $value; ?></div>
                            <?php
                                }
                            }
                            ?>
                            <div>
                                <input type="hidden" name="back" value="my-account">
                                <div class="form-group no-gutters">
                                    <input class="form-control" name="email" type="email" placeholder=" Email">
                                </div>
                                <?php
                                if (isset($error_msg['Email2'])) {
                                    echo "<div class='text-danger'>" . $error_msg['Email2'] . "</div>";
                                }
                                ?>
                                <div class="form-group no-gutters">
                                    <div class="input-group js-parent-focus">
                                        <input class="form-control js-child-focus js-visible-password" name="password" type="password" value="" placeholder="Password">

                                    </div>
                                    <?php
                                    if (isset($error_msg['Password2'])) {
                                        echo "<div class='text-danger'>" . $error_msg['Password2'] . "</div>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="clearfix">
                                <div class="text-center no-gutters">
                                    <input type="hidden" name="submitLogin" value="1">
                                    <button class="btn btn-primary" data-link-action="sign-in" type="submit" name="login">
                                        Sign in
                                    </button>
                                </div>
                                <div style="text-align: center; margin-top: 20px; margin-bottom: 20px;">
                                    <p>Create Account?</p>
                                    <a href="user-register.php">Register</a>
                                </div>
                            </div>
                        </form>
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


<!-- user-login11:10-->

</html>