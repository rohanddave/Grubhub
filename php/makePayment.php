<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "ip_project";

$conn = mysqli_connect($servername,$username,$password,$dbName) or die("Unable to connect!");

$user = $_SESSION['user_email'];
$result = mysqli_query($conn,"select item_name,quantity,kind from cart where email like '$user';"); //item name is without space here
$cart_items = array(); //items in cart
while($row = mysqli_fetch_assoc($result)){
    $cart_items[]=$row;
}

foreach($cart_items as $cart_item){
    $item_name = $cart_item['item_name'];
    $quantity = $cart_item['quantity'];
    $kind = $cart_item['kind'];     
    $t =time();
    $stmt = $conn->prepare("insert into previous_orders values (?,?,?,?,?)");
    $stmt->bind_param("sssss",$user,$item_name,$quantity,$kind,$t);
    $stmt->execute() or die("insertion failed");
    $stmt->close();
}

$stmt = $conn->prepare("delete from cart where email like ?");
$stmt->bind_param("s",$user);
$stmt->execute() or die("deletion failed");
$stmt->close();
$conn->close();
//echo "<script>window.open('../index.php','_self');</script>";
?>