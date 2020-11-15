<?php
session_start();
function addItemToCart(){
    $stmt = $conn->prepare('insert into cart values (?,?,?)');
    $stmt->bind_param('sss',$_SESSION['user_email'],$name,$cuisine);
    $stmt->execute() or die('not working');
}
?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/navbarStyle.css">
        <link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>
        <link rel="stylesheet" href="../css/home.css">
        
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="../js/main.js"></script>
        <title>Home page</title>
    </head>

    <body>
        <!--NavBar Begining-->
        <div class="nav-bar-div">
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
        
        if($_SESSION['showSearchRes']){
            $arr = $_SESSION['searchRes'];
            $_SESSION['showSearchRes'] = false;
        }

        else{
            $result = mysqli_query($conn,"select * from items;");
            $arr = array();
            while($row = mysqli_fetch_assoc($result)){
                $arr[]=$row;
            }
        }
        

        $number_of_items = sizeof($arr);
        $number_of_sections = ceil($number_of_items/3);
        
        $pointer = 0;
        
        echo "<form method='POST' action = '../php/addToCart.php'> ";
        for($x = 1; $x <= $number_of_sections; $x++){
            echo "<section class='item-section' style='float:left;width:75%;margin-top:100px;'>";
            for($y = 0; $y < 3 && $pointer < $number_of_items; $y++){
                $img = $arr[$pointer]['img'];
                $price = $arr[$pointer]['price'];
                $time_to_deliver = $arr[$pointer]['time_to_deliver'];
                $rating = $arr[$pointer]['rating'];
                $cuisine = $arr[$pointer]['cuisine'];
                $name = $arr[$pointer]['name'];
                $name_without_spaces = str_replace(" ","-",$name);
                $kind = $arr[$pointer]['kind'];
                $description = $arr[$pointer]['description'];
                $pointer++;
                echo "
                <div class='item' id='$name'>
                <img src=$img>
                <h3 id='name-of-item'>$name</h3>
                <p>$kind, $cuisine</p>
                <br>
                <p>$description</p>
                <ul>
                    <li style='text-align:center;margin-left: 0;'><div style='background: #08E25F;color:white;height:25px;width:40px;padding-top:6px;'>$rating    <span style='color:white;'class='fa fa-star checked'></span></div></li>
                    <li><div><i style='margin-right:5px;font-size:8px;'class='fa fa-circle'></i>$time_to_deliver</div></li>
                    <li id='price'><div><i style='margin-right:5px;font-size:8px;'class='fa fa-circle'></i>₹$price</div></li>
                </ul>
                <ul>
                    <li style='margin-left:30%'>
                    <select name='qty_$name_without_spaces'>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                                <option value='5'>5</option>
                                <option value='6'>6</option>
                                <option value='7'>7</option>
                                <option value='8'>8</option>
                                <option value='9'>9</option>
                                <option value='10'>10</option>
                    </select>
                    <input style='margin:0;' type='checkbox' name='items[]' id='items' value='$name_without_spaces'>
                    </li>
                </ul>
            </div>";
            }//inner for
            echo "</section>";
        }//outer for
        echo "<div class='sidebar' style='height: 50%;width:27%;float:left;position: fixed;z-index: 1;top: 200px;right: 10px;overflow-x: hidden;border-style: solid;border-color: rgb(197, 197, 197);box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3);'>
                <button id='addToCartBtn' style='margin:0 0 0 25%;background:transparent;border:none;'type = 'submit'>Add Items To Cart</button>
            </form>

            <form method='POST' action='../php/search.php'>
                <fieldset>
                    <legend>Search</legend>
                    <label>Search By:</label>
                    <select name='searchBy'>
                        <option value='name'>Name</option>
                        <option value='cuisine'>Cuisine</option>
                        <option value='kind'>Kind</option>
                    </select>
                    <input name='search-item'>

                    <label>Sort By:</label>
                    <select name='sortBy'>
                        <option value=''></option>
                        <option value='rating'>Rating</option>
                        <option value='time_to_deliver'>Time To Deliver</option>
                        <option value='price'>Price</option>
                    </select>
                    <select name='asc/desc'>
                        <option value='asc'>Lowest to Highest</option>
                        <option value='desc'>Highest to Lowest</option>
                    </select>
                    <button type='submit'>Search Now</button>
                </fieldset>
            </form>
            </div>";
        ?>        
    </body>
</html>