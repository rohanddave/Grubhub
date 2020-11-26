<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/navbarStyle.css">
        <link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>
        <script src="js/main.js"></script>

        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Mini Project</title>
        <style>
            body{
                background-image: url("resources/newHome.jpg");
                height: 99vh;
                background-size: cover;
                background-position: top; 
            }   
            
            .input-div{
                margin-top: 250px;
                margin-left: 2%;
            }

            .input-div ul{
                list-style: none;
            }

            .input-div ul li{
                /*padding: 10px;*/
            }
            
            .button {
                margin-left: 20px;
                background-color:orange; /* Green */
                border: none;
                color: white;
                padding: 8px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                border-radius: 5px;
                outline: none;
            }

            .button:hover{
                color:black;
                box-shadow: 0 5px #666;
                transition: 0.1s;
            }

            .button:active{     
                transform: translateY(2.5px);       
            }

            #find-food-input{
                width: 20%;
                background:transparent;
                outline:black;
                padding: 5px;
                border-radius: 5px;
                border-style: black solid;
                color:black;
            }

            #label-div{
                position: absolute;
                height: 35px;
                font-size: 30px;
                font-weight:bold;
                display: inline-block;
                overflow:hidden;
                margin-top:200px;
                margin-left:25px;
            }

            #label-div span{
                animation: rotate 10s ease infinite;
                position: relative;
            }

            @keyframes rotate{
                0%{ top: 0px }
                25%{ top: -35px }
                50%{ top: -70px}
                75%{ top: -105px }
                100%{ top: 0px}
            }
        </style>
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
                        echo "<script>document.getElementById('variable-navbar-btn').innerHTML = '$name';document.getElementById('variable-navbar-btn').href='html/user.php';</script>";
                        echo "<script>document.getElementById('logout-btn').style.display='inline-block';document.getElementById('logout-btn').innerHTML = 'Logout';document.getElementById('logout-btn').href='php/logout.php';</script>";
                        }
                    ?>
                </li>
            </ul>
        </div>
        <!--NavBar End-->
        

        <div id="label-div">
                    <span>Game Night?<br>Unexpected Guests?<br>Late Night At Work?<br>Cooking Gone Wrong?<span>
        </div>
        <div class="input-div">
            <ul>
                <li><label style="margin-top:200px;">Order food from favorite restaurants near you.</label></li>

                <li>
                    <input id="find-food-input" text="text" placeholder="Enter City">
                    <button class="button" onclick="find()">Find Food</button>
                </li>
            </ul>                
        </div>
    </body>
</html>