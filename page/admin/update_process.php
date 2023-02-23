<?php
session_start();
include "server.php";
$numrand = mt_rand();
if (isset($_POST['update-member'])) {
    $user_id = mysqli_real_escape_string($connection, $_POST['edit_id']);
    $user_name = mysqli_real_escape_string($connection, $_POST['edit_name']);
    $user_pass = md5(mysqli_real_escape_string($connection, $_POST['edit_pass']));
    $user_email = mysqli_real_escape_string($connection, $_POST['edit_email']);
    $user_phone = mysqli_real_escape_string($connection, $_POST['edit_phone']);
    $user_address = mysqli_real_escape_string($connection, $_POST['edit_address']);

    $update = "UPDATE users SET username = '$user_name', email = '$user_email', password = '$user_pass',
     phone = '$user_phone', address = '$user_address' WHERE user_id = $user_id";
    $result = mysqli_query($connection, $update);
    if ($result) {
        echo "<script type = 'text/javascript'>";
        echo "alert('แก้ไขสมาชิกเรียบร้อยแล้ว');";
        echo "window.location = 'dashboard.php';";
        echo "</script>";
    } else {
        echo "<script type = 'text/javascript'>";
        echo "alert('มีบางอย่างผิดพลาด');";
        echo "window.location = 'dashboard.php';";
        echo "</script>";
    }

}

if (isset($_POST['update-product'])) {
    $product_id = mysqli_real_escape_string($connection, $_POST['product_id']);
    $product_name = mysqli_real_escape_string($connection, $_POST['product_name']);
    $priduct_price = mysqli_real_escape_string($connection, $_POST['product_price']);
    $product_qty = mysqli_real_escape_string($connection, $_POST['product_amount']);
    $product_detail = mysqli_real_escape_string($connection, $_POST['product_detail']);
    $type_id = mysqli_real_escape_string($connection, $_POST['type_id']);
    $pic = mysqli_real_escape_string($connection, $_POST['pic']);

    $upload = $_FILES['product_pic']['name'];
    if ($upload != '') {
        $path = "../../img/";
        $type = strrchr($_FILES['product_pic']['name'], '.'); // strrchr คือการตัดคำตั้งแต่ ',' จะได้ผลลัพธ์.jpg
        $newname = 'img' . $numrand . $type; // ตั้งชื่อไฟล์ใหม่ $numrand > function for random number
        $path_copy = $path . $newname;
        $path_link = "../../img/" . $newname;

// คำสั่ง move_uploaded_file สำหรับอัปโหลดไฟล์เข้า Server
        move_uploaded_file($_FILES['product_pic']['tmp_name'], $path_copy); // tmp_name ย้ายต่ำแหน่งจากตรงที่เราเลือกไฟล์ ไปยัง $path_copy
    } else {
        $newname = $pic;
    }
    echo $_FILES['product_pic']['name'];
    $select = "SELECT * FROM products_type WHERE type_id = '$type_id'";
    $result1 = mysqli_query($connection, $select);
    $data = mysqli_fetch_assoc($result1);
    $type_id = $data['type_id'];
    $update = "UPDATE products SET pic = '$newname', product_name = '$product_name', price = '$priduct_price',
    product_qty = '$product_qty', product_detail = '$product_detail', type_id = '$type_id' WHERE product_id = $product_id";
    $result2 = mysqli_query($connection, $update);
    if ($result1 && $result2) {
        echo "<script type = 'text/javascript'>";
        echo "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
        echo "window.location = 'manage-product.php';";
        echo "</script>";
    } else {
        echo "<script type = 'text/javascript'>";
        echo "alert('มีบางอย่างผิดพลาด');";
        echo "window.location = 'manage-product.php';";
        echo "</script>";
    }
}

if (isset($_POST['update-catagories'])) {
    $type_id = mysqli_real_escape_string($connection, $_POST['type_id']);
    $type_name = mysqli_real_escape_string($connection, $_POST['name-catagorise']);
    $update = "UPDATE products_type SET type_name = '$type_name' WHERE type_id = $type_id";
    $result = mysqli_query($connection, $update);

    if ($result) {
        echo "<script type = 'text/javascript'>";
        echo "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
        echo "window.location = 'manage-catagories.php';";
        echo "</script>";
    } else {
        echo "<scritp type = 'text/javascript'>";
        echo "alert('มีบางอย่างผิดพลาด');";
        echo "window.location = 'manage-catagories.php';";
        echo "</script>";
    }
}

mysqli_close($connection);