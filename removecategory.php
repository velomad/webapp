<?php 

include("db.php");

$eventSelect = $_POST['removecategory'];
if(isset($_POST['submit'])){

$query = "DELETE FROM categories WHERE id = '$eventSelect' LIMIT 1";
mysqli_query($conn, $query);
header('location:purchase.php');

}

?>