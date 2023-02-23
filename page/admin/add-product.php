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
            <h1>Welcome admin! </h1>
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

        <div class = "all-manage-page add-product">
            <h2>ฟอร์มสินค้า</h2>
            <form action="add_data_process.php" method = "POST" enctype = "multipart/form-data"> 
                <!-- enctype = "multipart/form-data"  คือ คือคำสั่งสำหรับเข้ารหัสไฟล์ เพื่อทำให้ไฟล์สามารถส่งผ่านฟอร์มแบบ POST ได้ ใช้งานร่วมกับ input submit  -->
                <input type="text" name = "product_name" placeholder = "ชื่อสินค้า" required>
                <input type="number" name = "product_price" placeholder = "ราคาสินค้า" required>
                <input type="number" name = "product_amount" placeholder = "จำนวนสินค้า" required>

                <div class = "catagories">
                <h4>ประเภทสินค้า</h4>
                <select name="product_catagories" required>
                    <option value="product_catagories">
                        เลือกประเภทสินค้า
                    </option>
                        <?php
                        $qurey_catagories = "SELECT * FROM products_type";
                        $query = mysqli_query($connection, $qurey_catagories);
                        foreach($query as $results)
                        {?>
                            <option value="<?php echo $results['type_id'];?>">
                            <?php echo $results['type_name'];?>
                            </option>
                        <?php
                        }
                        ?>
                        
                </select>
                </div>

                <div class = "img-product">
                <h4>ภาพสินค้า</h4>
                <input name = "product_pic" type="file" >
                </div>

                <textarea class = "detail" name="product_detail"  id="" cols="30" rows="10" placeholder = "รายละเอียดสินค้า" required></textarea>
                <input class = "btn btn-success" name="add-product" type="submit" value = "add">
            </form>
        </div>
</div>

</body>
</html>