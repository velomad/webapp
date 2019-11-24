<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
include("db.php");

$category_id = $_POST['categoriesstatus_sales'];
$categoriesitem = $_POST['categoriesitem'];
$quantity = $_POST['quantity'];
$client = $_POST['client'];
$rate = $_POST['rate'];

if(isset($_POST['submit'])){

$query = "INSERT INTO sales (category_id, item_name, quantity, client, rate) VALUES ('$category_id','$categoriesitem','$quantity','$client','$rate')";
mysqli_query($conn, $query);
header('Location:sales.php');


$query2 = "UPDATE additem SET additem.quantity = additem.quantity - $quantity WHERE item_id = $categoriesitem ";
mysqli_query($conn,$query2);
header('Location:sales.php');
}
?>

