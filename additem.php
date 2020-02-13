<?php

error_reporting(0);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
session_start(); 
include("db.php");
$userprofile = $_SESSION['user_name'];
if($userprofile == true)
{
 
}
else
{
  header("Location:index.php");
} 


$categoryname = $_POST['category'];
$itemname = $_POST['itemname'];
$quantity = $_POST['quantity'];
$unit = $_POST['unit'];
$vendor = $_POST['vendor'];
$rate = $_POST['rate'];

if(isset($_GET['del'])){
    $id = $_GET['del']; 
    $query2 = "delete from additem where item_id = $id";
    $sql = mysqli_query($conn, $query2);
    header('location:purchase.php');
}

$query = " INSERT INTO additem (category_id, item_name, quantity, unit_id, vendor, rate) VALUES ('$categoryname','$itemname','$quantity','$unit','$vendor','$rate') ";
mysqli_query($conn, $query);

?>