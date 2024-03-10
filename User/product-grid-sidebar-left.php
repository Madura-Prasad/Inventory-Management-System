<?php require_once 'inc/Header.php';
include_once("DB_Files/db.php");
?>
<br><br><br><br><br><br>
<!-- main content -->
<div class="main-content">
    <div id="wrapper-site">
        <div id="content-wrapper" class="full-width">
            <div id="main">
                <div class="page-home">

                    <div class="container">
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-12 col-lg-12 col-md-12 product-container">
                                    <div class="js-product-list-top firt nav-top">
                                        <div class="d-flex justify-content-around row">
                                            <div class="col col-xs-12">
                                                <div class="d-flex sort-by-row justify-content-lg-end justify-content-md-end">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-content product-items">
                                        <div id="grid" class="related tab-pane fade in active show">
                                            <div class="row">


                                                <?php
                                                $sql = "SELECT * FROM product WHERE status = 1 AND active = 1";

                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        $product_id = $row['product_id'];
                                                        $product_name = $row['product_name'];
                                                        $rate = $row['rate'];
                                                        $_SESSION["product_id"] = $product_id;
                                                        echo '
                                                <div class="item text-center col-md-4">
                                                    <div class="product-miniature js-product-miniature item-one first-item">
                                                    <div class="">

                                                    <a href="product-checkout.php?Product_name=' . $product_name . ' &Price=' . $rate . '">
                                                    <img class="img-fluid image-cover" src="' . 'Product/images/' . basename(str_replace('..', '.', $row['product_image'])) . '" alt="img">

                                                    </a>
                                                </div>
                                                
                                                        <div class="product-description">
                                                            <div class="product-groups">
                                                                <div class="product-title">
                                                                    <a href="product-checkout.php?Product_name=' . $product_name . ' &Price=' . $rate . '">' . $row['product_name'] . '</a>
                                                                </div>
                                                                <div class="product-group-price">
                                                                    <div class="product-price-and-shipping">
                                                                        <span class="price">LKR ' . $row['rate'] . '.00</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="product-buttons d-flex justify-content-center">
                                                                <form action="#" method="post" class="formAddToCart">
                                                                    <input type="hidden" name="id_product" value="1">
                                                                    <a class="add-to-cart" href="product-checkout.php?Product_name=' . $product_name . ' &Price=' . $rate . '" data-button-action="add-to-cart">
                                                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                                    </a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            ';
                                                    }
                                                }
                                                ?>


                                            </div>
                                        </div>
                                    </div>

                                    <!-- end col-md-9-1 -->
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

    <!-- Template JS -->
    <script src="js/theme.js"></script>
    </body>


    <!-- product-grid-sidebar-left10:55-->

    </html>