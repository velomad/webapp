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

$query = "SELECT * FROM items";

$run = mysqli_query($conn, $query);


if (isset($_POST['names'])) {
    $names = $_POST['names'];
}

if (isset($_POST['pnumber'])) {
    $pnumber = $_POST['pnumber'];
}

if (isset($_POST['gender'])) {
    $gender = $_POST['gender'];
}

if (isset($_POST['house'])) {
    $house = $_POST['house'];
}

if (isset($_POST['size'])) {
    $valueofsize = $_POST['size'];
}

if (isset($_POST['qty'])) {
    $valueofqty = $_POST['qty'];
}



if(isset($_POST['submit']))
      
{

  $query = " INSERT INTO packaging (names, pnumber, gender, house, size, qty) VALUES ('$names', '$pnumber', '$gender','$house','$valueofsize','$valueofqty' )";
  mysqli_query($conn, $query);
 header('location:packaging.php');

}


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

<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Peaks & Arrow</a>
 
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">SIGN OUT</a>
    </li>
  </ul>
</nav>


<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="plus-circle"></span>
              Add Project
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="eye"></span>
              View Projects
            </a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="more-horizontal"></span>
              Timeline
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="package"></span>
              Packaging Process
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-3">
        
   
<form action="issue.php" method="POST">
  <div class="form-group">   
    <input type="text" class="form-control" id="name" name="names" aria-describedby="name" placeholder="name" autocomplete="off"> 
    <input type="number" class="form-control" id="name" name="pnumber" aria-describedby="number" placeholder="phone no." autocomplete="off"> 
  </div>
  
  <div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="option1" checked>
  <label class="form-check-label" for="exampleRadios1">
    Male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="option2">
  <label class="form-check-label" for="exampleRadios2">
    Female
  </label>
</div>



<div class="row">
<hr>
ITEMS
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="house" id="exampleRadios1" value="option1" checked>
  <label class="form-check-label" for="exampleRadios1">
    red
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="house" id="exampleRadios2" value="option2">
  <label class="form-check-label" for="exampleRadios2">
    green
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="house" id="exampleRadios1" value="option1" checked>
  <label class="form-check-label" for="exampleRadios1">
    blue
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="house" id="exampleRadios2" value="option2">
  <label class="form-check-label" for="exampleRadios2">
    yellow
  </label>
</div>

    <?php
        while($row = mysqli_fetch_assoc($run)){
    ?>
    <p class="mt-3"><?php echo $row['item_name']; ?> 
    <select name="size">
  <option value="10">10</option>
  <option value="20">20</option>
  <option value="30">30</option>
  <option value="40">40</option>
</select>

<select name="qty">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
</select>
    </p>

<?php
        }
?>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
        
      </div>
    </main>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        feather.replace();
    </script>
</body>

</html>