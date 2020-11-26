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
        <link rel="stylesheet" href='../css/new_cart.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <a href="aboutus.php">About   <i class="fa fa-universal-access"></i></a>
                    <a href="features.php">Features     <i class="fa fa-certificate"></i></i></a>
                    <a href="html/cart.php">Cart     <i stlye="margin-left:5px;" class='fas fa-shopping-cart'></i></a>
                    <a id="variable-navbar-btn" href="signInPage.php">Sign In      <i class="fa fa-user-circle-o"></i></a>
                    <a id="logout-btn" style="display:none;">Logout</a>
                    <?php
                    if(isset($_SESSION['user_email'])){
                        $name = $_SESSION['fname'];
                        echo "<script>document.getElementById('variable-navbar-btn').innerHTML = '$name';document.getElementById('variable-navbar-btn').href='#';</script>";
                        echo "<script>document.getElementById('logout-btn').style.display='inline-block';document.getElementById('logout-btn').innerHTML = 'Logout';document.getElementById('logout-btn').href='../php/logout.php';</script>";
                        }
                    ?>
                </li>
            </ul>
        </div>
        <!--NavBar End-->

        <div id="main">
            <div id="page-wrap">
                <h1>Choose a Delivery Address </h1>
                <p style='margin-left:2.5%;margin-top:0.5%;'>Multiple addresses in this location</p>
                
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbName = "ip_project";

                    $conn = mysqli_connect($servername,$username,$password,$dbName) or die("Unable to connect!");
                    $email = $_SESSION['user_email'];
                    $res = mysqli_query($conn,"select line1,line2,line3,name from addresses where email like '$email'");
                    $addresses = array();
                    while($row = mysqli_fetch_assoc($res)){
                        $addresses[] = $row;
                    }

                    $number_of_addresses = sizeof($addresses);
                    $number_of_sections = ceil($number_of_addresses/2);

                    $pointer = 0;

                    for($x = 1; $x <= $number_of_sections; $x++){
                        echo "<section height:auto;width:100%;>";
                        for($y = 0 ; $y < 2 && $pointer < $number_of_addresses; $y++){
                            $name = $addresses[$pointer]['name'];
                            $line1 = $addresses[$pointer]['line1'];
                            $line2 = $addresses[$pointer]['line2'];
                            $line3 = $addresses[$pointer]['line3'];
                            $pointer++;
                            echo"
                            <div id='address' style='width:45%;margin-left:2.5%;margin-right:2%;float:left;'>
                                <form method='POST' action='../php'>
                                    <h3 style='margin-left:2%;margin-top:2%;'><i class='fa fa-home' style='margin-right:2%;'></i>$name</h3>
                                    <p style='margin-left:2%;margin-top:2%;'>$line1</p>
                                    <p style='margin-left:2%;'>$line2 </p>
                                    <p style='margin-left:2%;'>$line3</p>
                                    <button type='submit' style='width:25%;height:5vh;margin-left:37.5%;margin-top:2%;margin-bottom:2%;background-color:green;color:white;border:none;text-decoration:none;'>Deliver Here</button>
                                </form> 
                            </div>";
                        }//inner for 
                        echo"</section>";
                    }//outer for
                ?>
                <div id='address' style='width:45%;margin-left:2.5%;margin-right:2%;float:left;'>
                    <form method='POST' action='../php/addLocation.php'>
                        <h3 style='margin-left:2%;margin-top:2%;'><i class='fa fa-home' style='margin-right:2%;'></i>Add New Address</h3>
                        <input style='margin-left:2%;margin-top:2%;'placeholder='Name' name = "name">
                        <input style='margin-left:2%;margin-top:2%;'placeholder='Line 1' name = "line1">
                        <input style='margin-left:2%;margin-top:2%;'placeholder='Line 2' name="line2">
                        <input style='margin-left:2%;margin-top:2%;'placeholder='Line 3' name="line3">
                        <button type='submit' style='width:25%;height:5vh;margin-left:37.5%;margin-top:2%;margin-bottom:2%;background-color:green;color:white;border:none;text-decoration:none;'>Add</button>
                    </form> 
                </div>

            </div>

            <div id="sidebar" style='overflow-y:auto;'>
            
            <div style='margin-left:5%;margin-top:5%;'>
                <h2>Cart<i class="fa fa-shopping-cart" style="font-size:24px;"></i></h2>
            </div>
            
                <?php
                    $total = 0 ;
                    $result = mysqli_query($conn,"select item_name,quantity,kind from cart where email like '$email';"); //item name is without space here
                    $cart_items = array(); //items in cart
                    while($row = mysqli_fetch_assoc($result)){
                    $cart_items[]=$row;
                    }

                    $query = mysqli_query($conn,"select name,price,kind from items"); //name is with space here
                    $pricings = array();
                    while($row = mysqli_fetch_assoc($query)){
                    $pricings[]=$row;//pricings of all items
                    }

                    $final_pricings = array(); //dictionary of prices

                    foreach($pricings as $pricing){
                        $final_pricings[$pricing['name']] = $pricing['price']; // [name with spaces : price ]
                    }

                    for($x = 0 ; $x < sizeof($cart_items);  $x++){
                        $name = $cart_items[$x]['item_name'];
                        $name_without_spaces = str_replace(" ","_",$name);
                        $name_without_spaces = strtolower($name_without_spaces);
                        $kind = $cart_items[$x]['kind'];
                        $kind=str_replace(" ","_",$kind);
                        $quantity = $cart_items[$x]['quantity'];
                        $price = $final_pricings[$name];  
                        $total+=$price*$quantity;  
                        echo "
                        <div>
                            <form method='POST' action='../php/deleteFromCart.php'>
                                <div style='width:20%;margin-left:5%;margin-top:5%;height:10vh;float:left;'>
                                    <img src='../resources/Menu/$kind/$name_without_spaces.jpg' style='width:100%;height:10vh;'>
                                </div>   

                                <div style='margin-top:5%;margin-left:5%;width:60%;height:10vh;float:left;'>
                                    <h4>$name ($quantity x ₹$price)</h4>
                                    <h4 style='color:green'>Available</h4>
                                    <input type = 'hidden' name = 'item_name' value = '$name'/>
                                    <button type='submit' style='background:none;border:none;'>Delete</button>
                                </div>     
                            </form>
                        </div>";
                    }//for 

                    echo "
                        <h3 style='margin-left:35%;'>Total: ₹$total</h3>";
                ?>
            </div>
        </div>
    </body>
<html>