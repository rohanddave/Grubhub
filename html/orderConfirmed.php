<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/orderConfirmed.css">
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
        <div>
            <img src='../resources/orderConfirmed.jpg' style='width:10%;height:10vh;margin-left:42.5%;'>
            <?php
                $name = $_SESSION['fname'];
                echo "<h3 style='margin-left:40%;'>Hey $name,</h3>";
            ?>

             <?php
                $orderId = $_SESSION['orderId'];
                echo "<h2 style='margin-left:25%;'>Your Order ID is $orderId </h2>";
             ?>

            <p style='margin-left:28.5%;'>Thank you for ordering from Grubhub!</p>

            <a href = '../index.php' style='text-decoration:none;margin-left:40%;'>Back To Home</a>
        </div>
    </body>
</html>