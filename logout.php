<?php
session_start();
unset( $_SESSION['user_name']); 
session_destroy( $_SESSION['user_name']);
header('Location:index.php')
?>
