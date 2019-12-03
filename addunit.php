<?php

include("db.php");

$unit_name = $_POST['unit_name'];


$query = " INSERT INTO units (unit_name) VALUES ('$unit_name') ";
mysqli_query($conn, $query);
header('Location:purchase.php');


?>