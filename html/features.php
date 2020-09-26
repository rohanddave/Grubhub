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
        <title>Feature</title>
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
                    <a id="variable-navbar-btn" href="signInPage.php">Sign In</a>
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

        <div class="div1">
            <h2 style= "font-size: xx-large; ">Main Features of Grubhub - Food Ordering Software</h2>
            <p style="font-size: small;"><em>Grubhub is the only solution which is built as a food ordering portal or marketplace, along with 
                white label food ordering system for restaurant owners. We believe if we give best solution to
                hospitality business owners, they will be able to take control of their own business.</em>
            </p>
        </div>

        <section class="section1">
                <table>
                    <tr>
                        <td valign="top">
                            <h2 style="font-size: xx-large">1. Take Away Ordering:</h2><br>
                            <p style = "font-size: x-large;">The take away ordering is a win-win solution for restaurant owners and customers. Restaurant 
                                owners get paid in advance, they save lot of time as they don't have to take manual orders over the 
                                phone which can even cause errors and confusion. Customers don't have to wait for the restaurant 
                                to answer the phone or ask the pickup time. They can simply go on to the website, see the menu, 
                                and place the order for the time they'd like to pick their food. This solution has helped restuarant 
                                owners increase their sales as they don't miss a single order when the phone is occupied during 
                                busy hours.</p>
                        </td>

                        <td>
                            <img src="../resources/delivery.jpg" style="height: 65vh; border-radius: 5px;box-shadow: gray 2px 2px 2px 2px;">                            
                        </td>
                    </tr>
                </table>
        </section>

        <section class="section1">
            <table>
                <tr>
                    <td>
                        <img src="../resources/catering.jpg" style="height: 50vh; border-radius: 5px; box-shadow: 5px 0 5px -5px #333;">  
                    </td>

                    <td>
                        <h2 style="font-size: xx-large; margin-left: 2%;margin-right:2%;">2. Catering Orders:</h2><br>
                        <p style = "font-size: x-large; margin-left:2%;margin-right:2%;">Many restaurant owners provide catering or party orders at a 
                        discounted rate. Somehow, they don't have any tool to showcase This
                        to potential customers. Grubhub Catering ordering system
                        allows them to publish a separate meny for discounted pricing for
                        bulk orders. Example of catering orders is Meal for 20 people, 
                        including 1 Starter, 1 main course and 1 dessert at {Price}.</p>                          
                    </td>
                </tr>
            </table>
        </section>

        <section class="section1">
            <table>
                <tr>
                    <td valign="center">
                        <h2 style="font-size: xx-large;margin-right:2%;">3. Unique Webpage:</h2><br>
                        <p style = "font-size: x-large;margin-right: 2%;">Why spend thousands of dollars in building a website, when you get a
                        unique webpage on Grubhub Food Ordering Portal with ZERO 
                        advertisements. Showcase your menu, items, gallery, amenities.
                        You even get online table reservation service and online ordering solution for your 
                        customers. With the unique webpage, your customers can contact you directly.</p>
                    </td>

                    <td>
                        <img src="../resources/website.png" style="height: 50vh; border-radius: 5px; box-shadow: gray 2px 2px 2px 2px;">                            
                    </td>
                </tr>
            </table>
    </section>
    </body>
</html>