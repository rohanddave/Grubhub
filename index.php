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
        <title>Mini Project</title>
        <style>
            body{
                background-image: url("resources/newHome.jpg");
                height: 99vh;
                background-size: cover;
                background-position: top; 
            }   
            
            .input-div{
                margin-top: 90px;
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
                height: 35px;
                overflow:show;
                font-weight:bold;
                font-size: 30px;
                transform: translate(-50%,-50%);
                /*animation:rotate 5s infinite;*/
            }

            @keyframes rotate{
                0%{
                    transform:translateY(0px);
                }
                20%{
                    transform:translateY(-40px);
                }
                40%{
                    transform:translateY(-80px);
                }
                60%{
                    transform: translateY(-120px);
                }
                80%{
                    transform:translateY(-160px);
                }
                100%{
                    transform: translateY(0px);
                }
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
                    <a href="#">About</a>
                    <a href="html/features.php">Features</a>
                    <a href="html/cart.php">Cart</a>
                    <a id="variable-navbar-btn" href="html/signInPage.php">Sign In</a>
                    <?php
                    if(isset($_SESSION['user_email'])){
                        $name = $_SESSION['fname'];
                        echo "<script>document.getElementById('variable-navbar-btn').innerHTML = '$name, Log Out?';document.getElementById('variable-navbar-btn').href='php/logout.php';</script>";
                        }
                    ?>
                </li>
            </ul>
        </div>
        <!--NavBar End-->

        <div class="input-div">
            <ul>
                <li>
                    <div id="label-div">
                        <span>Game Night?<br>Unexpected Guests?<br>Late Night At Work?<br>Cooking Gone Wrong?<span>
                    </div>
                    <label>Order food from favorite restaurants near you.</label>
                </li>

                <li>
                    <input id="find-food-input" text="text" placeholder="Enter City">
                    <button class="button" onclick="find()">Find Food</button>
                </li>
            </ul>                
        </div>
    </body>
</html>