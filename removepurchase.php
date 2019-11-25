<?php

include("db.php");

if(isset($_POST['deleteitemname'])){

    $id = $_GET['deleteitemname'];
    
    $query = "DELETE FROM additem WHERE item_id = $id";
    mysqli_query($conn, $query);
    header('location:purchase.php');
}

?>