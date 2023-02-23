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
                    <li class="p-4 h4 m-0 bg-danger"><a href="index.php">Logout</a></li>
                </ul>
            </div>

            <?php
if (isset($_GET['edit-catagories'])) {
    $getproductid = ($_GET['edit-catagories']);
    $getdata = "SELECT * FROM products_type WHERE type_id = '$getproductid'";
    $query = mysqli_query($connection, $getdata);
    $result = mysqli_fetch_assoc($query);
}
?>

            <div class="all-manage-page">
                <h2>แก้ไขประเภทสินค้า</h2>
                <form class="d-flex flex-column " style="width: 300px;" action="update_process.php" method="POST">
                    <input type="hidden" name="type_id" value=<?php echo $result['type_id']; ?>>
                    <input type="text" name="name-catagorise" value=<?php echo $result['type_name']; ?>
                        placeholder="ใส่ประเภทสินค้า" required>
                    <input class="btn btn-success" name="update-catagories" type="submit" value=update>
                </form>
            </div>
        </div>
</body>

</html>