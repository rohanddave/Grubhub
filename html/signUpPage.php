<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/navbarStyle.css">
        <link rel="stylesheet" href="../css/signUp.css">
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

        <div class="signIn-div">
            <form method="post" action="../php/signUp.php">                <!-- ../../../../../../xampp/htdocs/signUp.php-->
                <label><b>First Name</b></label>
                <input type="text" name="firstName" required>

                <label><b>Last Name</b></label>
                <input type="text" name="lastName" required>

                <label><b>Email Address</b></label>
                <input type="email"name="user_email"  required>

                <label><b>Password</b></label>
                <input type="password" name="pass" required>

                <label><b>Confirm Password</b></label>
                <input type="password" required>
                
                <button type="submit" name="signUp-submit"><b>Sign Up</b></button>

                <a href="signInPage.php"><b><em>Already A Memeber?</em></b></a>
            </form>
        </div>
    </body>
</html>