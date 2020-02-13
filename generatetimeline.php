<?php session_start(); 
include("db.php");

//echo $id;
//exit();

$userprofile = $_SESSION['user_name'];
if($userprofile == true)
{
  
 
} 
else
{
  header("Location:index.php");
}

if(isset($_POST['submit']))
{
$id = $_POST['id'];
$title =  $_POST['title'];
$dates = $_POST['date'];
$note =  $_POST['note'];

}     

$sql = "INSERT INTO showtimeline (timeline_id, title, dates, note) VALUES ('$id','$title', '$dates', '$note' )";
mysqli_query($conn, $sql);
  header('location:show_timeline.php?id='.$id);


?>