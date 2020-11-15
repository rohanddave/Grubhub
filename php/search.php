<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "ip_project";

$conn = mysqli_connect($servername,$username,$password,$dbName) or die("Unable to connect!");

$searchBy = $_POST['searchBy'];
$search_item = $_POST['search-item'];
$sortBy = $_POST['sortBy'];
$order = $_POST['asc/desc'];

if($sortBy!='')
$query = mysqli_query($conn,"select * from items where $searchBy like '%$search_item%' order by $sortBy $order;");
else
$query = mysqli_query($conn,"select * from items where $searchBy like '%$search_item%';");
$arr = array();
while($row = mysqli_fetch_assoc($query)){
    $arr[]=$row;//pricings of all items
}

$_SESSION['searchRes'] = $arr;
$_SESSION['showSearchRes'] = true;
echo "<script>window.open('../html/home.php','_self');;</script>"
?>