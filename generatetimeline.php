<?php
require "db.php";


$title =  $_POST['title'];
$dates = $_POST['date'];
$note =  $_POST['note'];

if(isset($_POST['submit']))
      
{

  $query = " INSERT INTO timeline (title, dates, note) VALUES ('$title', '$dates', '$note' )";
  mysqli_query($conn, $query);
  header('location:timeline.php');

}
?>