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
    <div class="container">
        <div class="banner">
            <img src="../img/banner.jpg" alt="">
        </div>

        <!-- navbar -->
        <?php include "nav.php";?>

        <header>
            <h1>รายการสั่งซื้อของคุณ <?php echo $_SESSION['username'] ?></h1>
        </header>


        <section>
            <table class="order">
                <tr>
                    <td>Oder Id</td>
                    <td>Oder Date</td>
                    <td>Order Name</td>
                    <td>Order Email</td>
                    <td>Order Phone</td>
                    <td>Order Address</td>
                    <td>Order Total</td>
                </tr>

                <?php
$username = $_SESSION['username'];
$query = "SELECT * FROM orders WHERE order_name = '$username'";
$result = mysqli_query($connection, $query);
while ($rows = mysqli_fetch_assoc($result)) {?>
                <tr>
                    <td><?php echo $rows['order_id']; ?></td>
                    <td><?php echo $rows['order_date']; ?></td>
                    <td><?php echo $rows['order_name']; ?></td>
                    <td><?php echo $rows['order_email']; ?></td>
                    <td><?php echo $rows['order_phone']; ?></td>
                    <td><?php echo $rows['order_address']; ?></td>
                    <td><?php echo $rows['total']; ?></td>
                </tr>
                <?php }
?>
            </table>
        </section>
    </div>
</body>

</html>