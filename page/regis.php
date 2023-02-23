<?php
session_start();
include("server.php");
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
    <div class = "container">
        <div class = "banner">
            <img src="../img/banner.jpg" alt="">
        </div>

        <nav>
            <ul class = "menu-nav">
                <li><a href="index.php">HOME</a></li>
                <li><a href="">ABOUT</a></li>
                <li><a href="">CONTACT</a></li>
            </ul>

            <ul class = "login-nav">
                <li><a href="login.php">LOGIN</a></li>
                <li><a href="regis.php">REGISTER</a></li>
            </ul>
        </nav>

        <!-- Register -->
        <main class = "regis">
            <div class = "container">
                <div class = "logo">
                    <img src="../img/register.jpg" alt="">
                </div>

                <?php if(isset($_SESSION["error"])):?>
                    <div class = "error">
                        <?php echo 
                        $_SESSION["error"];
                        unset($_SESSION["error"]);
                        ?>
                    </div>
                    <?php endif?>
                <div class = "title">
                    <h2>Register - สมัครสมาชิก</h2>
                </div>
                <div class = "form">
                    <form action="register_process.php" method = "POST">
                        <input type="text" name = "name" placeholder = "Enter yout username" required>
                        <input type="text" name = "email" placeholder = "Enter yout emil" required>
                        <input type="password" name = "password_one" placeholder = "Enter yout passwork" required>
                        <input type="password" name = "password_two" placeholder = "Enter yout passwork" required>
                        <input type="number" name = "phone" placeholder = "Enter yout phon number" required>
                        <textarea name = "ads" placeholder="Enter yout address"></textarea>
                        <input type="submit" name = "reg_user" value = "Register">
                    </form>
                    <a class = "go-login" href="login.php">เข้าสู่ระบบ</a>
                </div>
            </div>
        </main>
    </div>
</body>
</html>