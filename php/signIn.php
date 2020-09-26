<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "ip_project";

$conn = mysqli_connect($servername,$username,$password,$dbName) or die("Unable to connect!");

$user_email = $_POST['user_email'];
$user_pass = $_POST['user_pass'];

$result = $conn->query("select * from users where email like '$user_email' and pass like '$user_pass';");
$row = $result->fetch_assoc();

session_start();

$_SESSION['fname'] = $row['fname'];
$_SESSION['user_email'] = $row['email'];
$name = $_SESSION['fname'];
 echo "<script>window.open('../index.php','_self');alert('Logged in as $name !');</script>";
?>  