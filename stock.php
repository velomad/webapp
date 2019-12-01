<?php session_start(); 
include("db.php");
$userprofile = $_SESSION['user_name'];
if($userprofile == true)
{
  
 
}
else
{
  header("Location:index.php");
} 

$query = "SELECT sum(rate*quantity) AS value_sum FROM additem";

$sql = mysqli_query($conn, $query);


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

</head>
<body>

<ul class="nav justify-content-center mb-4">
  <li class="nav-item">
    <a class="nav-link" href="purchase.php">PURCHASE</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="sales.php">SALES</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="dashboard.php">DASHBOARD</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="logout.php">SIGN OUT</a>
  </li>
</ul>


<!-- content -->
<div class="container">
<div class="row">


        <p class="mr-5" style="background-color:#323232; padding:10px 40px; border-radius:5px; width:30%; text-align:center; font-size:20px; color:white;">Stock Value <span class="badge badge-warning"><?php $row = mysqli_fetch_assoc($sql);  ?><?php echo $row['value_sum']; ?></span></p>
        <p class="mr-5" style="background-color:#323232; padding:10px 40px; border-radius:5px; width:30%; text-align:center; font-size:20px; color:white;">Revenue <span class="badge badge-warning">50</span></p>
        <p style="background-color:#323232; padding:10px 40px; border-radius:5px; width:30%; text-align:center; font-size:20px; color:white;">Other Cost <span class="badge badge-warning">50</span></p>
    </div>

<!-- purchase sale chart -->

<?php include("purchasesalechart.php"); ?>

<!-- end purchase sale chart -->
   
</div>

<!-- End content -->

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="jquery-3.4.1.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        feather.replace();
    </script>
</body>

</html>