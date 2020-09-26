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

        <section class="item-section">
        <!--Item Begining-->
        <div class="item">
            <img src="../resources/pizza.jpg">
            <h3>Name of place</h3>
            <p>Cuisine</p>
            <ul>
                <li style="margin-left: 0;">Rating</li>
                <li>Time to deliver</li>
                <li id="price">Price</li>
            </ul>
            <ul>
                <li><button class="addToCartBtn" onclick="addToCart()">Add To Cart</button></li>
                <li><input style="margin: 0; padding: 0;" type="number"></li>
            </ul>
            
        </div>
        <!--Item End-->

        <!--Item Begining-->
        <div class="item">
            <img src="../resources/pizza.jpg">
            <h3>Name of place</h3>
            <p>Cuisine</p>
            <ul>
                <li style="margin-left: 0;">Rating</li>
                <li>Time to deliver</li>
                <li>Price</li>
            </ul>
            <ul>
                <li><button onclick="addToCart()">Add To Cart</button></li>
                <li><input style="margin: 0; padding: 0;" type="number"></li>
            </ul>
        </div>
        <!--Item End-->

        <!--Item Begining-->
        <div class="item">
            <img src="../resources/pizza.jpg">
            <h3>Name of place</h3>
            <p>Cuisine</p>
            <ul>
                <li style="margin-left: 0;">Rating</li>
                <li>Time to deliver</li>
                <li>Price</li>
            </ul>
            <ul>
                <li><button onclick="addToCart()">Add To Cart</button></li>
                <li><input style="margin: 0; padding: 0;" type="number"></li>
            </ul>
        </div>
        <!--Item End-->

        <!--Item Begining-->
        <div class="item">
            <img src="../resources/pizza.jpg">
            <h3>Name of place</h3>
            <p>Cuisine</p>
            <ul>
                <li style="margin-left: 0;">Rating</li>
                <li>Time to deliver</li>
                <li>Price</li>
            </ul>
            <ul>
                <li><button onclick="addToCart()">Add To Cart</button></li>
                <li><input style="margin: 0; padding: 0;" type="number"></li>
            </ul>
        </div>
        <!--Item End-->
    </section>

    <section class="item-section">
        <!--Item Begining-->
        <div class="item">
            <img src="../resources/pizza.jpg">
            <h3>Name of place</h3>
            <p>Cuisine</p>
            <ul>
                <li style="margin-left: 0;">Rating</li>
                <li>Time to deliver</li>
                <li>Price</li>
            </ul>
            <ul>
                <li><button onclick="addToCart()">Add To Cart</button></li>
                <li><input style="margin: 0; padding: 0;" type="number"></li>
            </ul>
        </div>
        <!--Item End-->

        <!--Item Begining-->
        <div class="item">
            <img src="../resources/pizza.jpg">
            <h3>Name of place</h3>
            <p>Cuisine</p>
            <ul>
                <li style="margin-left: 0;">Rating</li>
                <li>Time to deliver</li>
                <li>Price</li>
            </ul>
            <ul>
                <li><button onclick="addToCart()">Add To Cart</button></li>
                <li><input style="margin: 0; padding: 0;" type="number"></li>
            </ul>
        </div>
        <!--Item End-->

        <!--Item Begining-->
        <div class="item">
            <img src="../resources/pizza.jpg">
            <h3>Name of place</h3>
            <p>Cuisine</p>
            <ul>
                <li style="margin-left: 0;">Rating</li>
                <li>Time to deliver</li>
                <li>Price</li>
            </ul>
            <ul>
                <li><button onclick="addToCart()">Add To Cart</button></li>
                <li><input style="margin: 0; padding: 0;" type="number"></li>
            </ul>
        </div>
        <!--Item End-->

        <!--Item Begining-->
        <div class="item">
            <img src="../resources/pizza.jpg">
            <h3>Name of place</h3>
            <p>Cuisine</p>
            <ul>
                <li style="margin-left: 0;">Rating</li>
                <li>Time to deliver</li>
                <li>Price</li>
            </ul>
            <ul>
                <li><button onclick="addToCart()">Add To Cart</button></li>
                <li><input style="margin: 0; padding: 0;" type="number"></li>
            </ul>
        </div>
        <!--Item End-->
    </section>
    </body>
</html>