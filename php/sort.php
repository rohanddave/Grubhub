<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "ip_project";

$conn = mysqli_connect($servername,$username,$password,$dbName) or die("Unable to connect!");

$sortBy = $_POST['sortBy'];
?>