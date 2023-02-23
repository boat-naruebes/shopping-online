<?php
session_start();
include("server.php");
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="banner">
            <img src="../img/banner.jpg" alt="">
        </div>

        <nav>
            <ul class="menu-nav">
                <li><a href="index.php">HOME</a></li>
                <li><a href="">ABOUT</a></li>
                <li><a href="">CONTACT</a></li>
            </ul>

            <ul class="login-nav">
                <li><a href="login.php">LOGIN</a></li>
                <li><a href="regis.php">REGISTER</a></li>
            </ul>
        </nav>

        <main class="login">
            <div class="container">


                <img src="../img/login.jpg" alt="">
                <h1 class="title">Login - เข้าสู่ระบบ</h1>
                <?php if(isset($_SESSION["error"])):?>
                <div class="error">
                    <h4>
                        <?php echo $_SESSION["error"];
                      unset($_SESSION["error"]);
                    ?>
                    </h4>

                </div>
                <?php endif?>
                <form action="login_process.php" method="POST">
                    <?php include("errors.php");?>
                    <input type="text" name="username" placeholder="Enter your username" required>
                    <input type="password" name="password" placeholder="Enter yout passwork" required>
                    <input type="submit" name="login_user" value="Login">
                </form>
                <a class="go-regis" href="regis.php">สมัครสมาชิก</a>

            </div>
        </main>
    </div>
</body>

</html>