<?php
SESSION_start(); // นิยมใส่ด้านบนสุด
include "server.php";
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


                <h1>Results : </h1>
                <div class="container-items">

                    <?php
$getidproduct = $_GET['productid'];
$query = "SELECT * FROM products WHERE type_id = '$getidproduct'";
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

                        <div class='info'>
                            <p class='price'>ราคา <?php echo $rows['price']; ?> บาท</p>

                        </div>
                    </div>
                    <?php
}?>
                </div>
            </div>


        </section>
    </div>
</body>

</html>