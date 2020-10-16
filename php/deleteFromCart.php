<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "ip_project";

$conn = mysqli_connect($servername,$username,$password,$dbName) or die("Unable to connect!");

$user = $_SESSION['user_email'];
$name = $_POST['item_name'];

$stmt = $conn->prepare("delete from cart where email like ? and item_name like ?");
$stmt->bind_param("ss",$user,$name);
$stmt->execute() or die("FUCN TOU");
$stmt->close();
echo "<script>window.open('../html/cart.php','_self');</script>";
$conn->close();
?>