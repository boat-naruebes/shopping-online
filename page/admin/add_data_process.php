<?php
include "server.php";
$numrand = mt_rand();

// add member
if (isset($_POST['add-member'])) {
    $username = mysqli_real_escape_string($connection, $_POST['add_name']);
    $userpass = md5(mysqli_real_escape_string($connection, $_POST['add_pass']));
    $useremail = mysqli_real_escape_string($connection, $_POST['add_email']);
    $userphone = mysqli_real_escape_string($connection, $_POST['add_phone']);
    $useraddress = mysqli_real_escape_string($connection, $_POST['add_address']);

    $addmember = "INSERT INTO users(username, password, phone, email, address)
VALUE('$username', '$userpass', '$userphone', '$useremail', '$useraddress')
";
    $result = mysqli_query($connection, $addmember);
    if ($result) {

        echo "<script type = 'text/javascript'>";
        echo "alert('เพิ่มสมาชิกเรียบร้อยแล้ว');";
        echo "window.location = 'dashboard.php';";
        echo "</script>";
    } else {
        echo "<script type = 'text/javascript'>";
        echo "alert('มีบางอย่างผิดพลาด');";
        echo "window.location = 'dashboard.php';";
        echo "</script>";
    }
}

// add product
if (isset($_POST["add-product"])) {
    $product_name = mysqli_real_escape_string($connection, $_POST["product_name"]);
    $product_price = mysqli_real_escape_string($connection, $_POST["product_price"]);
    $product_amount = mysqli_real_escape_string($connection, $_POST["product_amount"]);
    $product_catagories = mysqli_real_escape_string($connection, $_POST["product_catagories"]);
    $product_detail = mysqli_real_escape_string($connection, $_POST["product_detail"]);
    $product_pic = (isset($_POST["product_pic"]) ? $_POST["product_pic"] : '');

    // ใช้คำสั่ง $_FILES สำหรับรับค่าตัวแปรชนิด file

    $upload = $_FILES['product_pic'];
    if ($upload != '') {
        $path = "../../img/";
        $type = strrchr($_FILES['product_pic']['name'], '.'); // strrchr คือการตัดคำตั้งแต่ ',' จะได้ผลลัพธ์.jpg
        $newname = 'img' . $numrand . $type; // ตั้งชื่อไฟล์ใหม่ $numrand > function for random number
        $path_copy = $path . $newname;
        $path_link = "../../img/" . $newname;
        // คำสั่ง move_uploaded_file สำหรับอัปโหลดไฟล์เข้า Server
        move_uploaded_file($_FILES['product_pic']['tmp_name'], $path_copy); // tmp_name ย้ายต่ำแหน่งจากตรงที่เราเลือกไฟล์ ไปยัง $path_copy

//           $_FILE['image']['type']    แทนชนิดของไฟล์ที่อัพโหลด เช่น .jpg
//   $_FILE['image']['size']    แทนขนาดของไฟล์
//   $_FILE['image']['tmp_name']   แทนตำแหน่งไดเรกทอรีที่เก็บไฟล์ไว้ชั่วคราว
//   $_FILE['image']['name']    แทนชื่อไฟล์ที่อัพโหลด
//   $_FILE['image']['error']    แทนข้อมูลที่ผิดพลาดจากการอัพโหลด โดยมีการคืนค่าดังนี้
//                                          คืนค่า 0 แสดงว่าไม่มีข้อผิดพลาด
//                                          คืนค่า 1 ไฟล์ที่อัพโหลดมีขนาดเกินกว่าค่าที่กำหนดใน php.ini  ปกติ2 MB
//                                          คืนค่า 2 ไฟล์มีขนาดเกินค่าที่กำหนดใน MAX_FILE_SIZE ของฟอร์ม
//                                          คืนค่า 3 ข้อผิดพลาดในการสื่อสารทำให้อัพโหลดไฟล์ไม่ได้
//                                          คืนค่า 4 ไม่มีไฟล์

    }

//เก็บ product_pic เป็น string ชื่อไฟล์ $newname
    $push_data = "INSERT INTO products(product_name, pic, price, product_qty,  product_detail, type_id)
VALUES('$product_name', '$newname', '$product_price', '$product_amount', '$product_detail', '$product_catagories')";
    $query = mysqli_query($connection, $push_data);
    if ($query) {
        echo "<script type = 'text/javascript'>";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
        echo "window.location = 'manage-product.php';";
        echo "</script>";
    } else {
        echo "<script type = 'text/javascript'>";
        echo "alert('มีบางอย่างผิดพลาด');";
        echo "window.location = 'manage-product.php';";
        echo "</script>";
    }

}

// add caragories
if (isset($_POST["add-catagories"])) {
    $add_catagories = mysqli_real_escape_string($connection, $_POST["name-catagorise"]);
    $qurey = "INSERT INTO products_type(type_name) VALUE('$add_catagories')";
    $result = mysqli_query($connection, $qurey);
    if ($result) {

        echo "<script type = 'text/javascript'>";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
        echo "window.location = 'manage-catagories.php';";
        echo "</script>";
    } else {
        echo "<script type = 'text/javascript'>";
        echo "alert('มีบางอย่างผิดพลาด');";
        echo "window.location = 'manage-catagories.php';";
        echo "</script>";
    }

}
mysqli_close($connection);
