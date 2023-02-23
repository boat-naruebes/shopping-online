<?php
session_start();
include "server.php";
if (isset($_POST['submit'])) {

    $ordername = mysqli_real_escape_string($connection, $_POST['username']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $mail = mysqli_real_escape_string($connection, $_POST['mail']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $total = mysqli_real_escape_string($connection, $_POST['total']);
    $username = $_SESSION['username'];
    // $order_date = Date("Y-m-d G:i:s");

    $sql1 = "INSERT INTO orders(order_name, order_email, order_phone, order_address, total, cust_name)
    VALUE('$ordername', '$mail', '$phone', '$address', '$total', '$username');
    ";
    $query1 = mysqli_query($connection, $sql1);

    // get max order id

    $sql2 = "SELECT max(order_id) FROM orders WHERE order_name = '$ordername' && order_email = '$mail'";
    $query2 = mysqli_query($connection, $sql2);
    $rows = mysqli_fetch_assoc($query2);
    $o_id = $rows['max(order_id)'];

    foreach ($_SESSION['shopping-cart'] as $product => $qty) {
        $sql3 = "SELECT * FROM products WHERE product_id = '$product'";
        $query3 = mysqli_query($connection, $sql3);
        $rows2 = mysqli_fetch_assoc($query3);
        $total = $rows2['price'] * $qty;
        $sql4 = "INSERT INTO orders_detail(order_id, product_id, qty, total)
        VALUE('$o_id', '$product', ' $qty', '$total')";
        $query4 = mysqli_query($connection, $sql4);
        $amount = $rows2['product_qty'] - $qty;
        $sql6 = "UPDATE products SET product_qty = $amount WHERE product_id = '$product'";
        $query5 = mysqli_query($connection, $sql6);
    }

    if ($query4 && $query1) {
        foreach ($_SESSION['shopping-cart'] as $product) {
            unset($_SESSION['shopping-cart']);
        }
        echo "<script type text/javascript>";
        echo "alert('บันทึกข้อมูลเรียนร้อย');";
        echo "window.location = 'order.php';";
        echo "</script>";
    } else {
        echo "<script type text/javascript>";
        echo "alert('มีบางอย่างผิดพลาด');";
        echo "window.location = 'order.php';";
        echo "</script>";
    }
}
