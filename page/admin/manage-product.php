<?php
session_start();
include "server.php";
if ($_SESSION['userid'] == "") {
    header("location: index.php");
    exit();
}
if ($_SESSION['status'] != "admin") {
    echo "This page is for admin only";
    exit();
}
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
                    <li class="p-4 h4 m-0 bg-danger"><a href="logout.php">Logout</a></li>
                </ul>
            </div>

            <div class="all-manage-page">
                <a class="btn btn-success my-3" href="add-product.php">เพิ่มสินค้า</a>
                <table>
                    <tr>
                        <td>Product Id</td>
                        <td>Product Pic</td>
                        <td>Product Name</td>
                        <td>Product Pric</td>
                        <td>Product Qty</td>
                        <td>Product type</td>
                        <td colspan='2'>Actions</td>
                    </tr>

                    <?php
$querydata = "SELECT * FROM products as P INNER JOIN products_type as T ON P.type_id = T.type_id ORDER BY P.product_id";
$query = mysqli_query($connection, $querydata);
while ($rows = mysqli_fetch_assoc($query)) {?>
                    <tr>
                        <td> <?php echo $rows["product_id"]; ?></td>
                        <td><img width='30%' src="../../img/<?php echo $rows["pic"]; ?>" alt="fail"></td>
                        <td> <?php echo $rows["product_name"]; ?></td>
                        <td> <?php echo $rows["price"]; ?></td>
                        <td> <?php echo $rows["product_qty"]; ?></td>
                        <td> <?php echo $rows["type_id"]; ?></td>
                        <td><a href="edit-product.php?edit-product=<?php echo $rows['product_id']; ?>">แก้ไข</a></td>
                        <td><a href="delete_process.php?delete-product=<?php echo $rows['product_id']; ?>"
                                onclick="return confirm('คุณต้องการลบสินค้านี้ใช่ไหม');">ลบ</a></td>
                    </tr>
                    <?php
}?>

                </table>

            </div>
        </div>

</body>

</html>