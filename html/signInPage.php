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

        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <a href="html/aboutus.php">About   <i class="fa fa-universal-access"></i></a>
                    <a href="html/features.php">Features     <i class="fa fa-certificate"></i></i></a>
                    <a href="html/cart.php">Cart     <i stlye="margin-left:5px;" class='fas fa-shopping-cart'></i></a>
                    <a id="variable-navbar-btn" href="html/signInPage.php">Sign In      <i id='fa fa-user-circle-o' class="fa fa-user-circle-o"></i></a>
                    
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