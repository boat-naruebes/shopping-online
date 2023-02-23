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
    <link rel="stylesheet" href="../../css/admin.css">
    <title>Document</title>
</head>
<body>
    <main class = "admin">
        <div class = "container">
            <div class = "logo-admin">
                <img src="../../img/admin.jpg" alt="">
            </div>
            <div class = "title">
                <h1>ADMINISTRATOR LOGIN</h1>
            </div>

            <div class = "form">
                <form action="admin_process.php" method = "POST">
                    <div class = "username">
                        Username: <input type="text" name = "username" placeholder = "Enter yout username" require>
                    </div>
                    <div class = "pass">
                        Passwork: <input type="password" name = "password" placeholder = "Enter yout passwork" require>
                    </div>
                    <div class = "submit">
                        <input type="submit" name = "confic-admin" value = "Login">
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>