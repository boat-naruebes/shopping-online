<?php
session_start();
include("server.php");
$errors = array();

if(isset($_POST["login_user"])){
    $username = mysqli_real_escape_string($connection, $_POST["username"]);
    $password = mysqli_real_escape_string($connection, $_POST["password"]); // mysqli_real_escape_string คือ การป้องกันใช้ตัวอักษรพิเศษ
    if(empty($username)){
        array_push($errors, "username is required");
    }
    if(empty($password)){
        array_push($errors, "password is required");

    }
    
    if(count($errors) == 0){
        echo count($errors);
         $password = md5($password);
        $getuser = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $query = mysqli_query($connection, $getuser);
            if(mysqli_num_rows($query) == 1){
                $_SESSION['username'] = $username;
                $_SESSION['sussess'] = "คุณได้เข้าสู่ระบบเรียบร้อยแล้ว";
                header("location: index.php");
            }
            else{
                $_SESSION['error'] = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
                header("location: login.php");
            }
    }
}
?>