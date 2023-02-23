    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "myshop";
    
    $connection =  new mysqli($servername, $username, $password, $db);

    if(!$connection){
        die("connect fail".mysqli_connect_error());
    }
    ?>