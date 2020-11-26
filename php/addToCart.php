<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "ip_project";

$conn = mysqli_connect($servername,$username,$password,$dbName) or die("Unable to connect!");

$user = $_SESSION['user_email'];
$item = $_POST['item-name'];
print_r($item);
//$items = $_POST['items'];
//$number_of_items = count($items);

$query = mysqli_query($conn,"select name,kind from items"); //name is with space here
$kinds = array();
while($row = mysqli_fetch_assoc($query)){
    $kinds[]=$row;//pricings of all items
}

$final_kinds = array(); //dictionary of kinds

foreach($kinds as $kind){
    $final_kinds[$kind['name']] = $kind['kind'];
}


//foreach($items as $item){
    //inserting everything without space
    $qty_input_name = 'qty_'.$item;
    $qty = $_POST[$qty_input_name];
    $item = str_replace("-"," ",$item);
    $item_kind = $final_kinds[$item];
    $stmt = $conn->prepare("insert into cart values (?,?,?,?)");
    $stmt->bind_param("ssss",$user,$item,$qty,$item_kind);
    $stmt->execute() or die("FUCN TOU");
//}
$stmt->close();
echo "<script>window.open('../html/home.php','_self');</script>";
$conn->close();
?>