        <nav>
            <ul class="menu-nav">
                <li><a href="index.php">HOME</a></li>
                <li><a href="">ABOUT</a></li>
                <li><a href="">CONTACT</a></li>
                <li>
                    <form action="search.php" method="POST">
                        <p>ค้นหา</p>
                        <input type="text" name="searchword" placeholder="ค้นหาสินค้า">
                        <input type="submit" name="search" value="Search">
                    </form>
                </li>

            </ul>

            <ul class="login-nav">
                <?php if (isset($_SESSION["username"])): ?>
                <li>Welcome <strong><?php echo $_SESSION["username"] ?></strong></li>
                <li><i class="fa-solid fa-cart-shopping"><a class="cast" href="./shopping-cart.php?=<?php $getproductid = 0;
?>">ตระกร้า</a></i></li>
                <li><i class="fa-solid fa-rectangle-list"><a class="viewitems" href="./order.php">ดูรายการสินค้า</a></i>
                </li>
                <li><i class="fa-solid fa-arrow-right-from-bracket"><a class="login" href="login.php">logout</a></i>
                </li>

                <!-- <li><i class="fa-solid fa-arrow-right-from-bracket"><a class = "login" href="login.php?login=<?php echo $_SESSION["username"]; ?>">logout</a></i></li> -->

                <?php else: ?>
                <li><a href="regis.php">Register</a></li>
                <li><a href="login.php">login</a></li>
                <?php endif?>

            </ul>
        </nav>