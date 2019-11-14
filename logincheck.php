<?php
session_start();
include("db.php");

if(isset($_POST['submit'])){
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $query = " select * from users where user = '$username' && pass = '$password' ";

    $data = mysqli_query($conn, $query);  

    $total = mysqli_num_rows($data);
        
    if($total == 1)
    {
        $_SESSION['user_name'] = $username;
        header('Location:projects.php');
    }
    else 
    {
    
        header('location:index.php');
    }
    
    
    /*if ($row == 1) {  
            echo "successful login";
            $_SESSION['user'] = $username;
            header('Location:projects.php');
            
        }else{
            echo "login failed";
            header('location:index.php');
        }
    
}*/
}
?>