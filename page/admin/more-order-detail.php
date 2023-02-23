<?php
include 'server.php';
session_start();
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
                    <li class="p-4 h4 m-0 bg-danger"><a href="index.php">Logout</a></li>
                </ul>
            </div>

            <div class="all-manage-page">
                <h2>ออเดอร์ทั้งหมด</h2>
                <table>
                    <tr>
                        <td>Oder Id</td>
                        <td>Product id</td>
                        <td>Order qty</td>
                        <td>Order Total</td>
                        <td>Action</td>
                    </tr>

                    <?php
if (isset($_GET['more-detail'])):
    $query = "SELECT * FROM orders_detail";
    $result = mysqli_query($connection, $query);

    while ($rows = mysqli_fetch_assoc($result)) {
        ?>
	                    <tr>
	                        <td><?php echo $rows['order_id']; ?></td>
	                        <td><?php echo $rows['product_id']; ?></td>
	                        <td><?php echo $rows['qty']; ?></td>
	                        <td><?php echo $rows['total']; ?></td>
	                        <td><a href="manage-order.php">กลับ</a></td>
	                    </tr>
	                    <?php }
endif;?>
                </table>
            </div>
        </div>
</body>

</html>