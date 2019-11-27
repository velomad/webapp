<?php

include("db.php");

$categoriesStatus = $_POST['categoriesStatus'];
$item_name = $_POST['itemname'];
$quantity = $_POST['quantity'];
$unit_id = $_POST['unit_id'];
$vendor = $_POST['vendor'];
$rate = $_POST['rate'];

if(isset($_POST['submit'])){

    $query = " UPDATE additem SET category_id = '$categoriesStatus', item_name = '$item_name', quantity = '$quantity', unit_id = '$unit_id', vendor = '$vendor', rate = '$rate' WHERE item_id = item_id";
    mysqli_query($conn, $query);
    header('Location:purchase.php');
    
    }

?>