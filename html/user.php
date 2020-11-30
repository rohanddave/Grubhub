<?php
session_start();
?>
<html>
    <head>
        <link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Amethysta' rel='stylesheet'>

        <link rel="stylesheet" href="../css/navbarStyle.css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            *{
                font-family: 'Amethysta';
            }

            #reorderButton:hover{
                color:orange;
                transition:0.3s;
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
                    <a href="cart.php">Cart     <i stlye="margin-left:5px;" class='fas fa-shopping-cart'></i></a>
                    <a id="variable-navbar-btn" href="signInPage.php">Sign In      <i class="fa fa-user-circle-o"></i></a>
                    <a id="logout-btn" style="display:none;">Logout</a>
                    <?php
                    if(isset($_SESSION['user_email'])){
                        $name = $_SESSION['fname'];
                        echo "<script>document.getElementById('variable-navbar-btn').innerHTML = '$name';document.getElementById('variable-navbar-btn').href='user.php';</script>";
                        echo "<script>document.getElementById('logout-btn').style.display='inline-block';document.getElementById('logout-btn').innerHTML = 'Logout';document.getElementById('logout-btn').href='../php/logout.php';</script>";
                        }
                    ?>
                </li>
            </ul>
        </div>
        <!--NavBar End-->

        <div style='float:left;width:50%;'>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbName = "ip_project";

                $conn = mysqli_connect($servername,$username,$password,$dbName) or die("Unable to connect!");
                $email = $_SESSION['user_email'];

                $res = mysqli_query($conn,"select item_name,quantity,orderID,number_of_items,total,orderDate,orderTime from previous_order where email like '$email' order by orderID desc;");
                $previous_orders = array();

                while($row = mysqli_fetch_assoc($res)){
                    $previous_orders[] = $row;
                }

                $arr = array();
                for($i = 0; $i < sizeof($previous_orders);){
                    $number_of_items = $previous_orders[$i]['number_of_items'];
                    for($j = 0; $j < $number_of_items && $i < sizeof($previous_orders) ; $j++){
                        $item_name = $previous_orders[$i+$j]['item_name'];
                        $quantity = $previous_orders[$i+$j]['quantity'];
                        $orderID = $previous_orders[$i+$j]['orderID'];
                        $total = $previous_orders[$i+$j]['total'];
                        $orderDate = $previous_orders[$i+$j]['orderDate'];
                        $orderTime = $previous_orders[$i+$j]['orderTime'];
                        $arr[$orderID][$j]= array($item_name,$quantity,$total,$orderID,$orderDate,$orderTime);
                    }//inner for 
                    $i+=$number_of_items;
                }//outer for
                
                //print_r($arr);
                $pointer = 0;
                foreach($arr as $order){
                    echo "<div style='box-shadow: 0 4px 8px 0 rgba(0,0,0,0.5);transition: 0.3s; margin-top:5%;margin-left:2%;width:100%;'>
                    <form method='POST' action='../php/reorder.php'>";
                    $order_ids = array_keys($arr);
                    //print_r($order);
                    $orderID = $order_ids[$pointer];
                    $orderDate = $order[0][4];
                    $orderTime = $order[0][5];
                    $pointer++;
                    echo "<h3 style='margin-left:5%;display:inline-block;'>Order #$orderID</h3><p style='margin-left:2%;display:inline-block;'><i>$orderDate , $orderTime</i></p><hr>";
                    for($x = 0; $x < sizeof($order); $x++){
                        $item_name = $order[$x][0];
                        $quantity = $order[$x][1];
                        $order_total = $order[$x][2]; 
                        echo "<p style='margin-left:5%;margin-top:2.5%;'>$item_name x $quantity</p>";
                    }
                    echo "
                        <hr style='margin-top:2%;'>
                        <p style='margin-left:5%;margin-top:1%;'><b><em>Total: ₹$order_total</em></b></p>
                        <button id='reorderButton' type='submit' style='margin-left:60%;margin-top:-20px;background:none;border:none;outline:none;'>Reorder</button>
                    </form>
                    </div>";
                }
            ?>
        </div>
        
        <div id="map" style="width:45%;height:70vh;background:grey;float:left;margin-left:2%;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15083.43291904906!2d72.83973144999999!3d19.06996985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa62aa753dc1d6df8!2sMadhu%20Park!5e0!3m2!1sen!2sin!4v1606761487849!5m2!1sen!2sin" width="576" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>    
    </body>
</html>