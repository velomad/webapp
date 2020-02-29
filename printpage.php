<?php
session_start(); 
include("db.php");
$userprofile = $_SESSION['user_name'];
if($userprofile == true)
{
  
 
}
else
{
  header("Location:index.php");
}
$id = isset($_GET['id']) ? $_GET['id'] : '';

$sql = "SELECT * from studentinfo where id =" .$id;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Login</title>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="./css/style.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
<style>
#printContent {
  display: flex;
  justify-content: center;
  align-items: center;
}

body{
    font-size:30px;
}
</style>
</head>
<body>



<div class="container mt-3" id="printContent">

<table id="main" border = "1" class="text-center" style="width:50%">

<th>name</th>
<th>standard</th>
<th>house</th>

<tr>
    <td><?php echo $row['firstname'].' '.$row['lastname'] ?></td>
    <td><?php echo $row['selectstandard'] ?></td>
    <td><?php echo $row['selecthouse'] ?></td>
</tr>
<th>item</th>
<th>size</th>
<th>quantity</th>


<tbody>
<?php  
        $sqlsizeinfo = "SELECT * from sizeinfo where stud_id = $id";
        $resultsizeinfo = mysqli_query($conn, $sqlsizeinfo);

        while($rowsizeinfo = mysqli_fetch_assoc($resultsizeinfo)){
    ?>
<tr>
    <td><?php echo $rowsizeinfo['item_name'] ?></td>
    <td><?php echo $rowsizeinfo['size'] ?></td>
    <td ><?php echo $rowsizeinfo['quantity'] ?></td>
</tr>

<?php  
    }
    ?>
</tbody>

</tr>
</table>

<button class="btn btn-primary mt-4" id="printpage">PRINT</button>

</div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="jquery-3.4.1.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        feather.replace();
        
        document.getElementById("printpage").addEventListener("click", function(){

            var data = document.getElementById("printContent").innerHTML;
            var removebtn = document.getElementById("printpage");
            removebtn.remove();
            print(data)
            window.history.back() 
        });
    </script>
</body>

</html>