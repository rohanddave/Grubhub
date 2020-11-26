<?php
session_start();
?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/navbarStyle.css">
        <link rel="stylesheet" href="../css/features.css">
        <link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Amethysta' rel='stylesheet'>

        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>About Us</title>
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
                        echo "<script>document.getElementById('variable-navbar-btn').innerHTML = '$name';document.getElementById('variable-navbar-btn').href='#';</script>";
                        echo "<script>document.getElementById('logout-btn').style.display='inline-block';document.getElementById('logout-btn').innerHTML = 'Logout';document.getElementById('logout-btn').href='../php/logout.php';</script>";
                        }
                    ?>
                </li>
            </ul>
        </div>
        <!--NavBar End-->

        <div class="div1">
            <h2 style= "font-size: xx-large; ">About Us</h2>
            <p style="font-size: small;"><em>Grubhub is the only solution which is built as a food ordering portal or marketplace, along with 
                white label food ordering system for restaurant owners. We believe if we give best solution to
                hospitality business owners, they will be able to take control of their own business.</em>
            </p>
        </div>

        <section class="section1">
                <table>
                    <tr>
                        <td valign="top">
                            
                            <p style = "font-size: x-large;">Since our modest beginnings in 2019 with a little space in Mumbai’s stylish Dadar locale, Grubhubs‘s development has been enlivened with the energy to cook and serve solid, Indian-roused takeout food. In contrast to other Indian eateries, Grubhub was made with the explicit expectation to appear as something else. We realize numerous individuals love Indian sustenance, yet a large number of them loathe or are unconscious of the regularly unfortunate fixings that make run of the mill Indian nourishment taste so great. Our menu highlights things that utilization the sound and fragrant flavors, however forgets the stuffing ghee, spread, oil, and overwhelming cream.

                            </p>
                        </td>

                        
                    </tr>
                </table>
        </section>

        <section class="section1">
            <table>
                <tr>

                    <td>
                        <p style = "font-size: x-large;">Grubhub has developed to incorporate four superb takeout areas in Mumbai with additional to come sooner rather than later. Our group takes pride in the way that we can furnish our new and faithful clients with extraordinary tasting Indian-roused nourishment that is not normal for that at some other Indian eatery you visit. We perceive that a few people are as yet searching for the run of the mill Indian nourishment, and that is fine with us.</p>                          
                    </td>
                </tr>
            </table>
        </section>

        <section class="section1">
            <table>
                <tr>
                    <td valign="center">
                        <p style = "font-size: x-large">Our disclaimer is that on the off chance that you’re anticipating overwhelming, slick, undesirable Indian nourishment, Grubhub isn’t the place for you. Our expectation is that you’ll join the developing pattern that such a large number of others have officially found and you will attempt Grubhub as a remarkable option to other Indian eateries as well as to all other solid sustenance alternatives out there!</p>
                    </td>

                </tr>
            </table>
        </section>
        <section class="section1" style="font-size: 20px;"><center><a href="feedback.php">Give Feedback</a></center></section>
    </body>
</html>