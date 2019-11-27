<?php

include("db.php");

$category_id = $_POST['category_id'];
$item_name = $_POST['item_name'];
$quantity = $_POST['quantity'];
$unit_id = $_POST['unit_id'];
$vendor = $_POST['vendor'];
$rate = $_POST['rate'];



if(isset($_POST['submit'])){

$query = " INSERT INTO additem (category_id, item_name, quantity, unit_id, vendor, rate) VALUES ('$category_id','$item_name','$quantity','$unit_id','$vendor','$rate') ";
mysqli_query($conn, $query);
header('Location:purchase.php');

}
?>