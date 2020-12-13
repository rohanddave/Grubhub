<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "ip_project";

$conn = mysqli_connect($servername,$username,$password,$dbName) or die("Unable to connect!");

if(isset($_SESSION['user_email'])){
    $user = $_SESSION['user_email'];
        
    $result = mysqli_query($conn,"select item_name,quantity,kind from cart where email like '$user';"); //item name is without space here
    $cart_items = array(); //items in cart
    while($row = mysqli_fetch_assoc($result)){
        $cart_items[]=$row;
    }

    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d");
    $time = date("h:i:sa");

    if(sizeof($cart_items) > 0){
        foreach($cart_items as $cart_item){
            $item_name = $cart_item['item_name'];
            $quantity = $cart_item['quantity'];
            $kind = $cart_item['kind'];     
            $t = time();
            
            $_SESSION['orderId'] = $t;
            $isDelivered = 0;
            $number_of_items = sizeof($cart_items);
            $total = $_SESSION['total'];
            
            $stmt = $conn->prepare("insert into previous_order values (?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssssssssss",$user,$item_name,$quantity,$kind,$t,$isDelivered,$number_of_items,$total,$date,$time);
            $stmt->execute() or die("insertion failed");
            $stmt->close();
        }
    
        $stmt = $conn->prepare("delete from cart where email like ?");
        $stmt->bind_param("s",$user);
        $stmt->execute() or die("deletion failed");
        $stmt->close();
        echo "<script>window.open('../html/orderConfirmed.php','_self');</script>";
    }

    else{
        echo "<script>alert('Empty Cart!');window.open('../html/cart.php','_self');</script>";
    }
}//if

else{  
    echo "<script>alert('Please login to place order!');window.open('../html/signInPage.php','_self');</script>";
}
$conn->close();
?>