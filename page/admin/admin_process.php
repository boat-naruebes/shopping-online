<?php
session_start();
include "server.php";
// $errors = array();
if (isset($_POST["confic-admin"])) {
    $username = mysqli_real_escape_string($connection, $_POST["username"]);
    $password = mysqli_real_escape_string($connection, $_POST["password"]);

    $getdataadmin = "SELECT * FROM admin WHERE username = '$username' && password = '$password'";
    $query = mysqli_query($connection, $getdataadmin);
    $fetchdata = mysqli_fetch_assoc($query);

    if ($fetchdata) {
        $_SESSION['userid'] = $fetchdata['id'];
        $_SESSION['status'] = $fetchdata['status'];
        if ($fetchdata['status'] == 'admin') {
            header("location: dashboard.php");

        } else {
            header("location: index.php");
        }
    } else {
        header("location: index.php");
    }
    mysqli_close($connection);

}