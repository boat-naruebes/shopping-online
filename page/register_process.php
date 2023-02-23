<?php
session_start();
$errors = array();
        include("server.php");
if(isset($_POST["reg_user"])){ //isset คือ มี $_POST["reg_user"] ไหม้
 $username = mysqli_real_escape_string($connection, $_POST['name']); // mysqli_real_escape_string ตือ การ ป้องกันตัวอักษรพิเศษ ป้องกัน sql injection
        $email = mysqli_real_escape_string($connection, $_POST['email']) ;
        $password_one = mysqli_real_escape_string($connection, $_POST['password_one']);
        $password_two = mysqli_real_escape_string($connection, $_POST['password_two']);
        $phone = mysqli_real_escape_string($connection, $_POST['phone']);
        $address = mysqli_real_escape_string($connection, $_POST['ads']);
        if(empty($username)){
                array_push($errors, "username is required");
        }
        if(empty($email)){
                array_push($errors, "email is required");
        }
        if(empty($password_one)){
                array_push($errors, "password is required");
        }
        if(empty($phone)){
                array_push($errors, "phone is required");
        }
        if(empty($address)){
                array_push($errors, "address is required");
        }
        if($password_one != $password_two){
                array_push($errors, "รหัสผ่านไม่ตรงกัน");
        }
        $user_check_query = "SELECT * FROM users WHERE  username = '$username' || email = '$email'";
        $result = mysqli_query($connection, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if($user){
                if($user['username'] === $username || $user['email'] === $email){
                        array_push($errors, "ชื่อผู้ใช้หรืออีเมล์นี้มีผู้ใช้งานแล้ว");
                        $_SESSION['error'] = "ชื่อผู้ใช้หรืออีเมล์นี้มีผู้ใช้งานแล้ว";
                        header("location: regis.php");  // header คือ การเปลี่ยน path ไปยังหน้าต่างๆ
                }
        }
        if(count($errors) == 0){
                $password_one = md5($password_one); // เข้ารหัส password
                $query = "INSERT INTO users(username, email, password, phone, address)
                VALUES('$username', '$email', '$password_one', '$phone', '$address')";
                mysqli_query($connection, $query);
                $_SESSION['username'] = $username; // เก็บตัวแแปร username ใช้คู่กับ seseion_start()
                $_SESSION['success'] = "คุณได้เข้าสู่ระบบแล้ว";
                header("location: index.php"); // header คือ การเปลี่ยน path ไปยังหน้าต่างๆ
        }
}
?>