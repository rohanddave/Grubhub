<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/navbarStyle.css">
        <link rel="stylesheet" href="../css/signIn.css">
        <link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>
        <title>Mini Project</title>
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
                    <a href="signIn.php">Sign In</a>
                    
                </li>
            </ul>
        </div>
        <!--NavBar End-->

        <div class="signIn-div">
            <form method="post" action="../php/signIn.php">
                <label><b>Email Address</b></label>
                <input type="email" name="user_email" required>
                <label><b>Password</b></label>
                <input type="password" name="user_pass" required>
                <button type="submit" name="signIn-submit"><b>Login</b></button>
                <a href="signUpPage.php"><b><em>Not a member? Sign Up Now</em></b></a>
            </form>
        </div>
    </body>
</html>