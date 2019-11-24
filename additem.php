<?php

include("db.php");

$category_id = $_POST['category_id'];
$item_name = $_POST['item_name'];
$quantity = $_POST['quantity'];
$vendor = $_POST['vendor'];
$rate = $_POST['rate'];



if(isset($_POST['submit'])){

$query = " INSERT INTO additem (category_id, item_name, quantity, vendor, rate) VALUES ('$category_id','$item_name','$quantity','$vendor','$rate') ";
mysqli_query($conn, $query);
header('Location:purchase.php');

}
?>