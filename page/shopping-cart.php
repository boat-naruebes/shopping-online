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
            <h1>ตะกร้าสินค้า</h1>
        </header>

        <section>

            <?php
if (isset($_GET['buy'])) {
    $getproductid = $_GET['buy'];

    if (isset($_SESSION['shopping-cart'][$getproductid])) {

        $_SESSION['shopping-cart'][$getproductid]++;
    } else {
        $_SESSION['shopping-cart'][$getproductid] = 1;
    }
}
if (isset($_GET['delete'])) {
    $getproductid = $_GET['delete'];
    unset($_SESSION['shopping-cart'][$getproductid]);
}
if (isset($_POST['update'])) {
    $newamount = $_POST['amount'];
    foreach ($newamount as $getproductid => $amount) {
        $_SESSION['shopping-cart'][$getproductid] = $amount;
    }
}
?>
            <form action="shopping-cart.php" method="POST">

                <table class="cart">
                    <tr>
                        <td>สินค้า</td>
                        <td>ราคา</td>
                        <td>จำนวน</td>
                        <td>รวม</td>
                        <td>ลบ</td>
                    </tr>

                    <?php

$total = 0;
if (isset($_SESSION['shopping-cart'])) {
    foreach ($_SESSION['shopping-cart'] as $getproductid => $amount) {
        $query = "SELECT * FROM products WHERE product_id = '$getproductid'";
        $result = mysqli_query($connection, $query);
        $data = mysqli_fetch_assoc($result);
        $sum = $data['price'] * $amount;
        $total += $sum;
        ?>
                    <tr>
                        <td><?php echo $data['product_name']; ?></td>
                        <td><?php echo number_format($data['price'], 2); ?></td>
                        <td><input type="number" name="amount[<?php echo $getproductid; ?>]"
                                value='<?php echo $amount; ?>' </td>
                        <td><?php echo number_format($sum, 2); ?></td>
                        <td><a href="shopping-cart.php?delete=<?php echo $data['product_id'] ?>"><i
                                    class="fa-solid fa-trash-can"></i></a></td>
                    </tr>
                    <?php

    }}?>
                    <?php
if (isset($_SESSION['shopping-cart'][$getproductid])): ?>
                    <tr>
                        <td colspan="3">ราคารวม</td>
                        <td><?php echo number_format($total, 2); ?></td>
                    </tr>
                    <tr>
                        <td class="product_page" colspan="3"><a href="index.php">กลับไปหน้าสินค้า</a></td>
                        <td> <input style="background-color: rgb(51, 185, 238);" type="submit" name="update"
                                value="ปรับปรุง"></td>
                        <td><input style="background-color:green;" type="botton" name="buy" value="สั่งซื้อ"
                                onclick="window.location='buy_page.php';"></td>

                    </tr>
                    <?php endif?>

                </table>
            </form>
        </section>
    </div>
</body>

</html>