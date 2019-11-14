<?php

include("db.php");

$title =  $_POST['title'];
$deadline = $_POST['deadline'];
$info =  $_POST['info'];

if(isset($_POST['submit']))
      
{

  $query = " INSERT INTO projects (title, deadline, info) VALUES ('$title', '$deadline', '$info' )";
  mysqli_query($conn, $query);
  header('location:view_project.php');

}

?>