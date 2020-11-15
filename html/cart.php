<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/navbarStyle.css">
        <link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>
        <script src="../js/main.js"></script>
        <link rel="stylesheet" href="../css/cart.css">

        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Cart</title>
        <style>            
            button{
                color:blue;
            }

            button:hover{
                text-decoration:underline;
            }
            </style>
    </head>

    <body>
        <!--NavBar Begining-->
        <div clas="nav-bar-div">
            <ul class="nav-bar-list">
                <li class="left-align-list-item">
                    <a href="../index.php">Grubhub</a>
                </li>

                <li class="right-align-list-item">
                    <a href="#">About   <i class="fa fa-universal-access"></i></a>
                    <a href="features.php">Features     <i class="fa fa-certificate"></i></i></a>
                    <a href="cart.php">Cart     <i stlye="margin-left:5px;" class='fas fa-shopping-cart'></i></a>
                    <a id="variable-navbar-btn" href="signInPage.php">Sign In      <i class="fa fa-user-circle-o"></i></a>
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
        
        $email = $_SESSION['user_email'];
        $result = mysqli_query($conn,"select item_name,quantity from cart where email like '$email';"); //item name is without space here
        $arr = array(); //items in cart
        while($row = mysqli_fetch_assoc($result)){
        $arr[]=$row;
        }

        $query = mysqli_query($conn,"select name,price,kind from items"); //name is with space here
        $pricings = array();
        while($row = mysqli_fetch_assoc($query)){
        $pricings[]=$row;//pricings of all items
        }

        $final_pricings = array(); //dictionary of prices

        foreach($pricings as $pricing){
            $final_pricings[$pricing['name']] = $pricing['price'];
        }

        /*$query = mysqli_query($conn,"select name,kind,img from items"); //name is with space here
        $kinds = array();
        while($row = mysqli_fetch_assoc($query)){
            $kinds[]=$row;//pricings of all items
        }

        $final_kinds = array(); //dictionary of kinds

        foreach($kinds as $kind){
            $final_kinds[$kind['name']] = $kind['kind'];
        }*/

        $query = mysqli_query($conn,"select name,img from items"); //name is with space here
        $imgs = array();
        while($row = mysqli_fetch_assoc($query)){
            $imgs[]=$row;//pricings of all items
        }

        $final_imgs = array(); //dictionary of kinds

        foreach($imgs as $img){
            $final_imgs[$img['name']] = $img['img'];
        }

        $total = 0;
        if($arr){
            echo "<h1>Cart</h1>";
            foreach($arr as $item){
                $item_name = $item['item_name'];
                $img_location = $final_imgs[$item_name];
                $item_qty = $item['quantity'];
                $item_price = $final_pricings[$item_name];
                $item_total = $item_qty*$item_price;
                //$item_kind = $final_kinds[$item_name];
                //$item_kind = str_replace(" ","_",$item_kind);
                $total += $item_total;
                echo "<form method='POST' action='../php/deleteFromCart.php'>
                <section class = 'item-section' style='width:90%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3); '>
                <div class='img-div' style='width: 100px; float:left; height:100px;margin:10px'>
                    <img style='width:100px;height:15vh;'src = '$img_location'>
                </div>
                <div style='display:inline-block;width: fit; float:left; height:100px;margin:10px'>
                    <h3 style='padding-bottom:1%;'>$item_name (x$item_qty) &nbsp; ₹$item_total ($item_qty x ₹$item_price)</h3>
                    <p style='color:green;padding-bottom:1%;'>Available</p>
                    <p style='padding-bottom:1%;'>Free Delivery</p>
                    <button style='background:transparent;border:none;'type='submit'>Delete</button>
                    <input type = 'hidden' name = 'item_name' value = '$item_name'/>
                </div>
                </section>
                </form>
                ";
            }
        }
        else{
            echo "
            <div>
            <h1 style='margin-left:45%; margin-top:15%;'>Empty Cart</h1>
            <a style='margin-left:49%; margin-top:20%;' href='home.php'>Order Now</a>
            </div>

            ";
        }
        
        
        $conn->close();
        ?>
    </body>
</html>