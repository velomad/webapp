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

if(isset($_POST['deleteitemname'])){

    $id = $_GET['deleteitemname'];
    
    $query = "DELETE FROM additem WHERE item_id = $id";
    mysqli_query($conn, $query);
    header('location:purchase.php');
}

?>