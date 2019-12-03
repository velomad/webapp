<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
include("db.php");


$category = $_POST['category'];
$itemname = $_POST['itemname'];
$quantity = $_POST['quantity'];
$client = $_POST['client'];
$rate = $_POST['rate'];



$query = "INSERT INTO sales (category_id, item_name, quantity, client, rate) VALUES ('$category','$itemname','$quantity','$client','$rate')";
mysqli_query($conn, $query);
header('Location:sales.php');


?>

