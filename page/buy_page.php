<?php
session_start();
include "./server.php";
if (!isset($_SESSION['username'])) {
    header("location: login.php");
}
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
    <div class="container">
        <div class="banner">
            <img src="../img/banner.jpg" alt="">
        </div>

        <!-- navbar -->
        <?php include "nav.php";?>

        <header>
            <h1>รายละเอียดการส่งสินค้า</h1>
        </header>

        <section>
            <form action="send_detail.php" method="POST">

                <table class="cart">
                    <tr>
                        <td>สินค้า</td>
                        <td>ราคา</td>
                        <td>จำนวน</td>
                        <td>รวม</td>

                    </tr>
                    <?php

$total = 0;
foreach ($_SESSION['shopping-cart'] as $getproductid => $amount) {
    $query = "SELECT * FROM products WHERE product_id = '$getproductid'";
    $result = mysqli_query($connection, $query);
    $data = mysqli_fetch_assoc($result);
    $sum = $data['price'] * $amount;
    $total += $sum;
    ?>
                    <tr>
                        <td><?php echo $data['product_name']; ?></td>
                        <td><?php echo $data['price']; ?></td>
                        <td><?php echo $amount ?></td>
                        <td><?php echo $sum; ?></td>

                    </tr>
                    <?php

}?>
                    <?php
if (isset($_SESSION['shopping-cart'][$getproductid])): ?>
                    <tr>
                        <td colspan="3">ราคารวม</td>
                        <td><?php echo $total; ?></td>
                    </tr>

                    <?php endif?>
                </table>

                <div class="send-detail">
                    <h3>รายละเอียดการส่งสินค้า</h3>
                    <input type="hidden" name="total" value="<?php echo $total ?>">
                    <table>
                        <tr class="test">
                            <td>ชื่อ</td>
                            <td><input type="text" name="username" placeholder="ชื่อ-นามสกุล" required></td>

                        </tr>
                        <tr>

                            <td>เบอร์โทรศัพท์</td>
                            <td><input type="text" name="phone" placeholder="เบอร์โทรศัพท์" required></td>

                        </tr>
                        <tr>

                            <td>อีเมล์</td>
                            <td><input type="text" name="mail" placeholder="อีเมล์" required></td>

                        </tr>
                        <tr>

                            <td>ที่อยู่</td>
                            <td><textarea name="address" placeholder="ที่อยู่"></textarea></td>

                        </tr>
                        <tr>

                            <td colspan="2"><input type="submit" name="submit" value="ส่ง"></td>
                        </tr>
                    </table>

                </div>
            </form>
        </section>
    </div>
</body>

</html>