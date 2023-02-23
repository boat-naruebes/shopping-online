<?php
session_start();
include "server.php";

if (isset($_GET['delete-product'])) {
    $getdata = mysqli_real_escape_string($connection, $_GET['delete-product']);
    $query = "DELETE FROM products WHERE product_id = '$getdata'";
    $deletedata = mysqli_query($connection, $query);
    if ($deletedata) {
        echo "<script type = 'text/javascript'>";
        echo "alert('ลบข้อมูลเรียบร้อย');";
        echo "window.location = 'manage-product.php';";
        echo "</script>";
    } else {
        echo "<script type = 'text/javascript'>";
        echo "alert('มีบางอย่างผิดพลาด');";
        echo "window.location = 'manage-product.php';";
        echo "</script>";
    }
}

if (isset($_GET['delete-catagories'])) {

    $catagories_id = mysqli_real_escape_string($connection, $_GET['delete-catagories']);
    $query = "DELETE FROM products_type WHERE type_id = ' $catagories_id'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo "<script type = 'text/javascript'>";
        echo "alert('ลบข้อมูลเรียบร้อย');";
        echo "window.location = 'manage-catagories.php';";
        echo "</script>";
    } else {
        echo "<script type = 'text/javascript'>";
        echo "alert('มีบางอย่างผิดพลาด');";
        echo "window.location = 'manage-catagories.php';";
        echo "</script>";
    }
}
if (isset($_GET['delete-order'])) {
    $getidorder = $_GET['delete-order'];
    $query1 = "DELETE FROM orders WHERE order_id = '$getidorder'";
    $result1 = mysqli_query($connection, $query);

    $query2 = "DELETE FROM orders_detail WHERE order_id = '$getidorder'";
    $result2 = mysqli_query($connection, $query);
    if ($result1 && $result2) {
        echo "<script type = 'text/javascript'>";
        echo "alert('ลบข้อมูลเรียบร้อย');";
        echo "window.location = 'manage-order.php';";
        echo "</script>";
    } else {
        echo "<script type = 'text/javascript'>";
        echo "alert('มีบางอย่างผิดพลาด');";
        echo "window.location = 'manage-order.php';";
        echo "</script>";

    }
}

mysqli_close($connection);
