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

$unit_name = $_POST['unit_name'];

$query = " INSERT INTO units (unit_name) VALUES ('$unit_name') ";
mysqli_query($conn, $query);

?>