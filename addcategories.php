<?php

include("db.php");

$category_name = $_POST['category_name'];

if(isset($_POST['submit'])){

$query = " INSERT INTO categories (category_name) VALUES ('$category_name') ";
mysqli_query($conn, $query);
header('Location:purchase.php');

}
?>