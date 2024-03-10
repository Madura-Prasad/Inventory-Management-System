<?php require_once 'inc/Header.php';
include("DB_Files/db.php");
?>
<br><br><br><br><br><br>
<!-- main content -->
<div class="main-content">
    <div class="wrap-banner">

        <div class="acount head-acount">
            <div class="container">
                <div id="main">
                    <h1 class="title-page">Purchase History</h1>


                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                </div> <!-- /panel-heading -->
                                <div class="panel-body">
                                    <div class="remove-messages"></div>

                                    <?php
                                    $cname = $_SESSION['username'];
                                    $sql = "SELECT * FROM orders WHERE client_name='$cname'";
                                    $result = $conn->query($sql);
                                    ?>

                                    <table class="table" id="manageUserTable">
                                        <thead>
                                            <tr>
                                                <th style="width:20%;">User Name</th>
                                                <th style="width:20%;">Email</th>
                                                <th style="width:20%;">Total Order</th>
                                                <th style="width:20%;">Order Date</th>
                                                <th style="width:20%;">Order Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $Id = $row['order_id'];
                                                    $cname = $row['client_name'];
                                                    $email = $row['client_contact'];
                                                    $status = $row['payment_place'];
                                                    $date = $row["order_date"];
                                                    $total = $row["total_amount"];
                                            ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($cname); ?></td>
                                                        <td><?php echo htmlspecialchars($email); ?></td>
                                                        <td><?php echo htmlspecialchars($total); ?></td>
                                                        <td><?php echo htmlspecialchars($date); ?></td>
                                                        <td>
                                                            <?php
                                                            if ($status == 1) {
                                                                echo "Pending";
                                                            } else if ($status == 2) {
                                                                echo "Order Processing";
                                                            } else if ($status == 3) {
                                                                echo "Dispatched";
                                                            } else if ($status == 4) {
                                                                echo "Deliver";
                                                            } else {
                                                                echo htmlspecialchars($status);
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "<tr><td colspan='5'>No orders found</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <!-- /table -->
                                </div> <!-- /panel-body -->

                            </div> <!-- /panel -->
                        </div> <!-- /col-md-12 -->
                    </div> <!-- /row -->



                </div>

            </div>
        </div>
    </div>
</div>
<!-- footer -->

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


<!-- user-acount11:10-->

</html>