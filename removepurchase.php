<?php

include("db.php");

if(isset($_POST['submit'])){

    $id = $_GET['item_id'];
    
    $query = "DELETE FROM additem WHERE item_id = $id";
    mysqli_query($conn, $query);
    header('location:purchase.php');
}

?>