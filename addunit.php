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

$addunit = $_POST['addunit'];

$sql = "INSERT INTO units (unit_name) VALUES ('$addunit')";
mysqli_query($conn, $sql)
?>