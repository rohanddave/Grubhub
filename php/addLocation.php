<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "ip_project";

$conn = mysqli_connect($servername,$username,$password,$dbName) or die("Unable to connect!");

if(isset($_SESSION['user_email'])){
    $user = $_SESSION['user_email'];
}
else{
    $user = 'guest@guest.com';
}
$name = $_POST['name'];
$line1 = $_POST['line1'];
$line2 = $_POST['line2'];
$line3 = $_POST['line3'];

$stmt = $conn->prepare("insert into addresses values (?,?,?,?,?)");
$stmt->bind_param("sssss",$user,$line1,$line2,$line3,$name);
$stmt->execute() or die("FUCN TOU");
$stmt->close();
echo "<script>window.open('../html/cart.php','_self');</script>";
$conn->close();
?>