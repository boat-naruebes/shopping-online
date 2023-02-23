<?php
session_start();
include "server.php";
if ($_SESSION['userid'] == "") {
    header("location: index.php");
    exit();
}
if ($_SESSION['status'] != "admin") {
    echo "This page is for admin only";
    exit();
}
$sql = "SELECT * FROM admin WHERE id =" . "'" . $_SESSION['userid'] . "'";
$query = mysqli_query($connection, $sql);
$result = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container nav-admin">
        <header class="title text-center p-3">
            <h1>Welcome admin! <?php echo $result['username'] ?></h1>
        </header>
        <div class="d-flex">
            <div class="menu bg-primary">
                <ul class="p-0 m-0">
                    <li class="p-4 h4 m-0"><a href="./dashboard.php">Dashboard</a></li>
                    <li class="p-4 h4 m-0"><a href="./manage-product.php">จัดการสินค้า</a></li>
                    <li class="p-4 h4 m-0"><a href="./manage-catagories.php">จัดประเภทสินค้า</a></li>
                    <li class="p-4 h4 m-0"><a href="./manage-order.php">จัดการออเดอร์</a></li>
                    <li class="p-4 h4 m-0 bg-danger"><a href="logout.php">Logout</a></li>
                </ul>
            </div>

            <div class="all-manage-page ">
                <a class="btn btn-success my-3" href="add-member.php">เพิ่มสมาชิก</a>
                <table>
                    <?php
$query = "SELECT * FROM users ORDER BY user_id";
$result = mysqli_query($connection, $query);
?>

                    <tr>
                        <td>User Id</td>
                        <td>Username</td>
                        <td>Password</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Address</td>
                        <td colspan="2">Actions</td>
                    </tr>
                    <?php
while ($rows = mysqli_fetch_assoc($result)) {
    ?>
                    <tr>
                        <td><?php echo $rows['user_id'] ?></td>
                        <td><?php echo $rows['username'] ?></td>
                        <td><?php echo $rows['password'] ?></td>
                        <td><?php echo $rows['email'] ?></td>
                        <td><?php echo $rows['phone'] ?></td>
                        <td><?php echo $rows['address'] ?></td>
                        <td><a href=edit-member.php?edit-member=<?php echo $rows['user_id']; ?>">แก้ไข</a></td>
                        <!-- ?edit edit คือ ชื่อ get -->
                        <td><a href="delete_process.php?delete-member=<?php echo $rows['user_id']; ?>"
                                onclick="return confirm('คุณต้องการลบผู้ใช้นี้ใช่ไหม');">ลบ</a></td>
                    </tr>
                    <?php
}
?>
                </table>
            </div>
        </div>
</body>

</html>