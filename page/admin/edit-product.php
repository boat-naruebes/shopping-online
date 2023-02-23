<?php
session_start();
include "server.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container nav-admin">
        <header class="title text-center p-3">
            <h1>Welcome admin!</h1>
        </header>
        <div class="d-flex">
            <div class="menu bg-primary">
                <ul class="p-0 m-0">
                    <li class="p-4 h4 m-0"><a href="./dashboard.php">Dashboard</a></li>
                    <li class="p-4 h4 m-0"><a href="./manage-product.php">จัดการสินค้า</a></li>
                    <li class="p-4 h4 m-0"><a href="./manage-catagories.php">จัดประเภทสินค้า</a></li>
                    <li class="p-4 h4 m-0"><a href="./manage-order.php">จัดการออเดอร์</a></li>
                    <li class="p-4 h4 m-0 bg-danger"><a href="admin.php">Logout</a></li>
                </ul>
            </div>

            <div class="all-manage-page add-product">
                <h2>แก้ไขสินค้า</h2>
                <?php
if (isset($_GET['edit-product'])) {
    $product_id = $_GET['edit-product'];
    $getdata = "SELECT * FROM products as P INNER JOIN products_type as T ON P.type_id = T.type_id WHERE product_id = '$product_id'";
    $query = mysqli_query($connection, $getdata);
    $result = mysqli_fetch_assoc($query);
    $type_id = $result['type_name'];

}
?>
                <form action="update_process.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value=<?php echo $result['product_id']; ?>>
                    <input type="hidden" name="type_name" value=<?php echo $result['type_name']; ?>>
                    <input type="hidden" name="pic" value=<?php echo $result['pic']; ?>>
                    <input type="text" name="product_name" value=<?php echo $result['product_name']; ?>
                        placeholder="ชื่อสินค้า" required>
                    <input type="number" name="product_price" value=<?php echo $result['price']; ?>
                        placeholder="ราคาสินค้า" required>
                    <input type="number" name="product_amount" value=<?php echo $result['product_qty']; ?>
                        placeholder="จำนวนสินค้า" required>

                    <div class="catagories">
                        <h4>ประเภทสินค้า</h4>
                        <select name="type_id">
                            <option value="เลือกประเภทสินค้า">
                                <?php echo $result['type_name'] ?>
                            </option>

                            <?php

$qurey_catagories = "SELECT * FROM products_type";
$query = mysqli_query($connection, $qurey_catagories);

foreach ($query as $data) {?>
                            <option value=" <?php echo $data['type_id'] ?>"
                                <?php if ($result['type_name'] == $data['type_name']) {echo "selected";}?>>
                                <?php echo $data['type_name'] ?>
                            </option>
                            <?php
}
?>
                        </select>

                    </div>

                    <div class="img-product">
                        <h4>ภาพสินค้า</h4>
                        <input type="file" name="product_pic">
                        <img width="50%" src="../../img/<?php echo $result['pic'] ?>" alt="">
                    </div>

                    <textarea class="detail" name="product_detail" id="" cols="30" rows="10"
                        placeholder="รายละเอียดสินค้า" required><?php echo $result['product_detail']; ?></textarea>
                    <input class="btn btn-success" name="update-product" type="submit" value="update">
                </form>
            </div>
        </div>
</body>

</html>