<?php

include("db.php");
// return '$_POST';

$title =  $_GET['title'];
$deadline = $_GET['deadline'];
$info =  $_GET['info'];
$id = rand ( 10000 , 99999 );
$password = rand ( 10000 , 99999 );

// echo $title;exit;



function functionName($id) {
  $query = "select school_id from projects where school_id='$id'";
  $result = mysqli_query($conn,$query);
  if($result){
  $id = rand ( 10000 , 99999 );
   functionName($id); 
  }
  else{
    return $id;
  }
}

// if(isset($_POST['submit']))     
// {
  $query = "select title from projects where title='$title'";
  // echo $query;
  $result1 = mysqli_query($conn,$query);
  // $row=mysqli_fetch_assoc($result1);
  // echo count($result);
// print_r($row);
$num_rows = mysqli_num_rows($result1);
// echo $num_rows;
  if ($num_rows>0) {
    echo "The title already exist";
  }
  else{
    $id = functionName($id);
    
  $query = " INSERT INTO projects (title, deadline, info,school_id,school_password) VALUES ('$title', '$deadline', '$info','$id','$password' )";
  mysqli_query($conn, $query);
  // header('location:view_project.php');
  }
// }

?>