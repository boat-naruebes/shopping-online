<?php
SESSION_start(); // นิยมใส่ด้านบนสุด
include "server.php";

// if( !isset($_SESSION['username'])){
//     header("location: login.php");
// }
// if(isset($_GET["logout"])){
//     session_destroy();
//     unset($_SESSION["username"]);
//     header("location: login.php");

// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>

<body>
    <div class="container">
        <div class="banner">
            <img src="../img/banner.jpg" alt="">
        </div>

        <!-- navbar -->
        <?php include "nav.php";?>


        <section class="display">
            <div class="container-sidebar">
                <!-- sidebar -->
                <div class="sidebar">
                    <h2>หมวดหมู่สินค้า</h2>
                    <ul>
                        <?php
$qurey = "SELECT * FROM products_type";
$getdata = mysqli_query($connection, $qurey);
if (mysqli_num_rows($getdata) == 0): ?>
                        <li>ไม่มีหมวดหมู่สินค้า</li>


                        <?php else: ?>
                        <?php
while ($rows = mysqli_fetch_assoc($getdata)) {?>
                        <li><a
                                href='catagories.php?productid=<?php echo $rows['type_id']; ?>'><?php echo $rows['type_name']; ?></a>
                        </li>

                        <?php }?>

                        <?php endif?>

                    </ul>
                </div>

                <!-- priduct -->

                <div class="grid-continer">
                    <?php if (isset($_SESSION["sussess"]) || isset($_SESSION["username"])): ?>


                    <?php if (isset($_SESSION["sussess"])): ?>
                    <div class="sussess">
                        <h3>
                            <?php
echo $_SESSION["sussess"];
unset($_SESSION["sussess"]); ?>

                        </h3>
                    </div>
                    <?php endif?>


                    <?php endif?>



                    <div class="container-items">
                        <?php
$query = "SELECT * FROM products";
$getdata = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($getdata)) {?>

                        <div class='item'>
                            <div class='title'>
                                <h2><?php echo $rows['product_name']; ?></h2>
                            </div>

                            <div class='img'>
                                <a href='product-detail.php?detail=<?php echo $rows['product_id']; ?>'>
                                    <img width="100%" src='../img/<?php echo $rows['pic']; ?>' alt=''>
                                </a>
                            </div>

                            <?php if ($rows['product_qty'] > 0): ?>
                            <div class='info'>
                                <p class='price'>ราคา <?php echo $rows['price']; ?> บาท</p>
                                <a href='./shopping-cart.php?buy=<?php echo $rows['product_id']; ?>'>สั่งซื้อ</a>
                                <p class='amount'>จำนวนคงเหลือ <?php echo $rows['product_qty']; ?> ชิ้น</p>
                            </div>
                            <?php else: ?>
                            <h2 class='empy'>สินค้าหมด</h2>
                            <?php endif?>
                        </div>




                        <?php
}
?>
                    </div>
                </div>

            </div>
        </section>
    </div>
</body>

</html>