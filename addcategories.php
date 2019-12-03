<?php

include("db.php");

$category_name = $_POST['category_name'];


$query = " INSERT INTO categories (category_name) VALUES ('$category_name') ";
mysqli_query($conn, $query);





?>