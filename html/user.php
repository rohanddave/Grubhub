<?php
session_start();
?>
<html>
    <head>
        <link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>
        <link rel="stylesheet" href="../css/navbarStyle.css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
         <!--NavBar Begining-->
        <div clas="nav-bar-div">
            <ul class="nav-bar-list">
                <li class="left-align-list-item">
                    <a href="index.php">Grubhub</a>
                </li>

                <li class="right-align-list-item">
                    <a href="html/aboutus.php">About   <i class="fa fa-universal-access"></i></a>
                    <a href="html/features.php">Features     <i class="fa fa-certificate"></i></i></a>
                    <a href="html/cart.php">Cart     <i stlye="margin-left:5px;" class='fas fa-shopping-cart'></i></a>
                    <a id="variable-navbar-btn" href="html/signInPage.php">Sign In      <i class="fa fa-user-circle-o"></i></a>
                    <a id="logout-btn" style="display:none;">Logout</a>
                    <?php
                    if(isset($_SESSION['user_email'])){
                        $name = $_SESSION['fname'];
                        echo "<script>document.getElementById('variable-navbar-btn').innerHTML = '$name';document.getElementById('variable-navbar-btn').href='#';</script>";
                        echo "<script>document.getElementById('logout-btn').style.display='inline-block';document.getElementById('logout-btn').innerHTML = 'Logout';document.getElementById('logout-btn').href='php/logout.php';</script>";
                        }
                    ?>
                </li>
            </ul>
        </div>
        <!--NavBar End-->

        <div>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbName = "ip_project";

                $conn = mysqli_connect($servername,$username,$password,$dbName) or die("Unable to connect!");
                $email = $_SESSION['user_email'];

                $res = mysqli_query($conn,"select item_name,quantity,orderID,number_of_items from previous_order where email like '$email' order by orderID desc;");
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
                        $arr[$orderID][$j]= array($item_name,$quantity);
                    }//inner for 
                    $i+=$number_of_items;
                }//outer for
                
                //print_r($arr);

                foreach($arr as $order){
                    echo "<div style='background-color:red;margin-top:10%;>";
                    echo "<div style='background-color:blue;>";
                    for($x = 0; $x < sizeof($order); $x++){

                        $item_name = $order[$x][0];
                        $quantity = $order[$x][1];
                        
                        echo "<h2>$item_name x $quantity</h2>";
                    }
                    echo "</div>";
                }
            ?>
        </div>
    </body>
</html>