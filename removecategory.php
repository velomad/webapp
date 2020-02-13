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


$eventSelect = $_POST['removecategory'];
if(isset($_POST['submit'])){

$query = "DELETE FROM categories WHERE id = '$eventSelect' LIMIT 1";
mysqli_query($conn, $query);
header('location:purchase.php');

}

?>