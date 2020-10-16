<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "ip_project";

$conn = mysqli_connect($servername,$username,$password,$dbName) or die("Unable to connect!");

$user = $_SESSION['user_email'];
$items = $_POST['items'];
$number_of_items = count($items);

foreach($items as $item){
    $qty_input_name = 'qty_'.$item;
    $qty = $_POST[$qty_input_name];
    $stmt = $conn->prepare("insert into cart values (?,?,?)");
    $stmt->bind_param("sss",$user,$item,$qty);
    $stmt->execute() or die("FUCN TOU");
}
$stmt->close();
echo "<script>window.open('../html/cart.php','_self');</script>";
$conn->close();
?>