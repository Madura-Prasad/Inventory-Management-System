<?php

require_once 'core.php';

$orderId = $_POST['orderId'];

$sql = "SELECT order_date, client_name, client_contact, sub_total, vat, total_amount, discount, grand_total, paid, due, payment_place,gstn FROM orders WHERE order_id = $orderId";

$orderResult = $connect->query($sql);
$orderData = $orderResult->fetch_array();

$orderDate = $orderData[0];
$clientName = $orderData[1];
$clientContact = $orderData[2];
$subTotal = $orderData[3];
$vat = $orderData[4];
$totalAmount = $orderData[5];
$discount = $orderData[6];
$grandTotal = $orderData[7];
$paid = $orderData[8];
$due = $orderData[9];
$payment_place = $orderData[10];
$gstn = $orderData[11];

$orderItemSql = "SELECT order_item.product_id, order_item.rate, order_item.quantity, order_item.total,
product.product_name FROM order_item
   INNER JOIN product ON order_item.product_id = product.product_id 
 WHERE order_item.order_id = $orderId";
$orderItemResult = $connect->query($orderItemSql);

$currentDateTime = date('Y-m-d H:i:s');

$table = '<style>
.invoice-box {
    font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
    margin: auto;
    padding: 30px;
    border: 1px solid #eee;
    box-shadow: 0 0 10px rgba(0, 0, 0, .15);
    font-size: 16px;
    line-height: 24px;
    color: #555;
}

.invoice-box table {
    width: 100%;
    line-height: inherit;
    text-align: left;
}

.invoice-box table td {
    padding: 5px;
    vertical-align: top;
}

.invoice-box table tr td:nth-child(2) {
    text-align: right;
}

.invoice-box table tr.top table td {
    padding-bottom: 20px;
}

.invoice-box table tr.top table td.title {
    font-size: 45px;
    line-height: 45px;
    color: #333;
}

.invoice-box table tr.information table td {
    padding-bottom: 40px;
}

.invoice-box table tr.heading td {
    background: #eee;
    border-bottom: 1px solid #ddd;
    font-weight: bold;
}

.invoice-box table tr.details td {
    padding-bottom: 20px;
}

.invoice-box table tr.item td {
    border-bottom: 1px solid #eee;
}

.invoice-box table tr.item.last td {
    border-bottom: none;
}

.invoice-box table tr.total td:nth-child(2) {
    border-top: 2px solid #eee;
    font-weight: bold;
}

.invoice-box table tr.heading th,
.invoice-box table tr.details th {
    background-color: #f2f2f2;
    border-bottom: 1px solid #ddd;
    text-align: left;
    padding: 10px;
}

.invoice-box table tr.item td {
    padding: 10px;
}

.invoice-box table tr.item.last td {
    border-bottom: none;
}

@media only screen and (max-width: 600px) {
    .invoice-box table tr.top table td {
        width: 100%;
        display: block;
        text-align: center;
    }

    .invoice-box table tr.information table td {
        width: 100%;
        display: block;
        text-align: center;
    }
}
</style>

<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <h3>Cyber Deck</h3>
                        </td>
                        <td>
                            <br>
                            Created Date: ' . $currentDateTime . '<br>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            Customer Name: ' . $clientName . '<br>
                            Mobile No: ' . $clientContact . '<br>
                        </td>

                        <td>
                            Company Name: Cyber Deck<br>
                            Company Email: help@cyberdeck.com
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <th style="background-color:black; color:white;">
               Product Description
            </th>
            <th style="background-color:black; color:white;">
               Quantity
            </th>
            <th style="background-color:black; color:white;">
               Price (LKR)
            </th>
      </tr>';

// Fetching order items
while ($row = $orderItemResult->fetch_array()) {
    $table .= '
        <tr class="details">
            <th>' . $row[4] . '</th>
            <th>' . $row[2] . '</th>
            <th>' . $row[1] . '</th>
        </tr>';
}

// Adding totals
$table .= '
        <tr class="total">
            <td></td>
            <td></td>
            <td style="font-weight:bold; background-color:black; color:white;">Total:  ' . $subTotal . '</td>
        </tr>
       
    </table>
    <h4 style="text-align:center; margin-top:100px;">Thank you Come Again !!!</h4>
</div>';

$connect->close();

echo $table;
