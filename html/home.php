<?php
session_start();
?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="../css/navbarStyle.css">
        <link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>
        <link rel="stylesheet" href="../css/home.css">
        <script src="../js/main.js"></script>
        <title>Home page</title>
    </head>

    <body>
        <!--NavBar Begining-->
        <div clas="nav-bar-div">
            <ul class="nav-bar-list">
                <li class="left-align-list-item">
                    <a href="../index.php">Grubhub</a>
                </li>

                <li class="right-align-list-item">
                    <a href="#">About</a>
                    <a href="features.php">Features</a>
                    <a href="cart.php">Cart</a>
                    <a id="variable-navbar-btn" href="signInPage.php">Sign In</a>
                    <?php
                    if(isset($_SESSION['user_email'])){
                        $name = $_SESSION['fname'];
                        echo "<script>document.getElementById('variable-navbar-btn').innerHTML = '$name, Log Out?';document.getElementById('variable-navbar-btn').href='../php/logout.php';</script>";
                        }
                    ?>
                </li>
            </ul>
        </div>
        <!--NavBar End-->

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbName = "ip_project";
        
        $conn = mysqli_connect($servername,$username,$password,$dbName) or die("Unable to connect!");

        $result = mysqli_query($conn,"select * from items;");
        $arr = array();
        while($row = mysqli_fetch_assoc($result)){
            $arr[]=$row;
        }

        $number_of_items = sizeof($arr);
        $number_of_sections = ceil($number_of_items/4);
        
        $pointer = 0;
        
        for($x = 1; $x <= $number_of_sections; $x++){
            echo "<section class='item-section'>";
            for($y = 0; $y < 4 && $pointer < $number_of_items; $y++){
                $img = $arr[$pointer]['img'];
                $price = $arr[$pointer]['price'];
                $time_to_deliver = $arr[$pointer]['time_to_deliver'];
                $rating = $arr[$pointer]['rating'];
                $cuisine = $arr[$pointer]['cuisine'];
                $name = $arr[$pointer]['name'];
                $pointer++;
                echo "
                <div class='item'>
                <img src=$img>
                <h3>$name</h3>
                <p>$cuisine</p>
                <ul>
                    <li style='margin-left: 0;'>$rating</li>
                    <li>$time_to_deliver</li>
                    <li id='price'>$price</li>
                </ul>
                <ul>
                    <li><button class='addToCartBtn' onclick='addToCart()'>Add To Cart</button></li>
                    <li><input style='margin: 0; padding: 0;' type='number'></li>
                </ul>
            </div>";
            }
            echo "</section>";
        }
        ?>
    </body>
</html>