<?php
session_start();
include("server.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
        <div class = "container nav-admin">
        <header class = "title text-center p-3">
            <h1>Welcome admin!</h1>
        </header>
<div class = "d-flex">
        <div class = "menu bg-primary">
            <ul class = "p-0 m-0">
                <li class = "p-4 h4 m-0"><a href="./dashboard.php">Dashboard</a></li>
                <li class = "p-4 h4 m-0"><a href="./manage-product.php">จัดการสินค้า</a></li>
                <li class = "p-4 h4 m-0"><a href="./manage-catagories.php">จัดประเภทสินค้า</a></li>
                <li class = "p-4 h4 m-0"><a href="./manage-order.php">จัดการออเดอร์</a></li>
                <li class = "p-4 h4 m-0 bg-danger"><a href="index.php">Logout</a></li>
            </ul>
        </div>
        <?php
        if(isset($_GET['edit-member'])){
            $getid = $_GET['edit-member'];
            $getdata = "SELECT * FROM users WHERE user_id = '$getid'";
            $query = mysqli_query($connection, $getdata);
            $result = mysqli_fetch_assoc($query);
        }
        ?>
        <div class = "all-manage-page add-product">
            <h2>ฟอร์มแก้ไขเพิ่มสมาชิก</h2>
            <form action="update_process.php"  method = "POST">
                <input type="hidden" name="edit_id" value = <?php echo $result['user_id'];?> >
                <input type="text" name = "edit_name" value = <?php echo $result['username'];?> placeholder = "ใส่ชื่อผู้ใช้" required>
                <input type="password" name = "edit_pass" value = <?php echo $result['password'];?> placeholder = "ใส่รหัสผ่าน" required>
                <input type="text" name = "edit_email" value = <?php echo $result['email'];?> placeholder = "ใส่อีเมล์" required>
                <input type="text" name = "edit_phone" value = <?php echo $result['phone'];?> placeholder = "ใส่เบอร์โทรศัพท์" required>
                <textarea class = "detail" name="edit_address"    cols="30" rows="10" placeholder = "รายละเอียดสินค้า" required><?php echo $result['address'];?></textarea>
                <input class = "btn btn-success" name="update-member" type="submit" value = "Update">
            </form>
        </div>
</div>
</body>
</html>