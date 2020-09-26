<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "ip_project";

$conn = mysqli_connect($servername,$username,$password,$dbName) or die("Unable to connect!");

$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$user_email= $_POST['user_email'];
$pass = $_POST['pass'];

$stmt = $conn->prepare("insert into users values (?,?,?,?)");
$stmt->bind_param("ssss",$user_email,$fname,$lname,$pass);
$stmt->execute() or die("FUCN TOU");

echo "<script>window.open('../html/signInPage.php','_self');alert('Account created please login in!');</script>";

$stmt->close();
$conn->close();
?>