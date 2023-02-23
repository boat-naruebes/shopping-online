<?php
session_start();
include "./server.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <title>Document</title>
</head>

<body>
    <div class="container product-detail">
        <div class="banner">
            <img src="../img/banner.jpg" alt="">
        </div>

        <!-- navbar -->
        <?php include "nav.php";?>

        <main>
            <?php
if (isset($_GET['detail'])) {
    $productid = $_GET['detail'];
    $query = "SELECT * FROM products WHERE product_id = '$productid'";
    $result = mysqli_query($connection, $query);
    $fetchdata = mysqli_fetch_assoc($result);
}

?>
            <div class="item">
                <div class="title">
                    <h2><?php echo $fetchdata['product_name']; ?></h2>
                </div>

                <div class="img">
                    <img width="50%" src="../img/<?php echo $fetchdata['pic']; ?>" alt="">
                </div>
                <div class="detail">
                    <p><?php echo $fetchdata['product_detail'] ?></p>
                </div>
                <div class="info">
                    <p class="price"></p>
                    <a class="buy" href="shopping-cart.php">สั่งซื้อ</a>
                    <a class="amount" href="index.php">กลับไปหน้าแรก</a>
                </div>
            </div>
        </main>
    </div>
</body>

</html>