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
$id = isset($_GET['id']) ? $_GET['id'] : '';
$sql = "SELECT * FROM showtimeline where timeline_id = $id";

$result = mysqli_query($conn,$sql);
//$result = mysqli_fetch_assoc($run);

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
    <script src="/dist/js/timeline.min.js"></script>
<link href="/dist/css/timeline.min.css" rel="stylesheet" />

<style>



img{
  position:Absolute;
  margin-left:332px;
  top:80px;
}
</style>
  </head>
  <body>

  <ul class="nav">
  <li class="nav-item">
    <a class="nav-link" href="logout.php">Logout</a>
  </li>
 
</ul>


<div class="container mt-2">
  <div class="row">
  <div class="col-lg-3 col-6">
  <?php $sql2 = "SELECT * FROM projects WHERE id =" .$id;
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
      ?>
      <form action="generatetimeline.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row2['id'] ?>">
          <input type="text" class="form-control" placeholder="Title" name="title" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required autocomplete="off">    
          </div>
          <div class="col-lg-3 col-6">
          <input type="date" class="form-control" name="date" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required autocomplete="off">
          </div>
          <div class="col-lg-3 col-12">
          <textarea class="form-control" placeholder="Note" rows="1" aria-label="With textarea" name="note" required  autocomplete="off"></textarea>
          </div>
          <div class="col-lg-3 col-12 justify-content-center">
          <button type="submit" name="submit" class="btn btn-outline-primary" onclick="submitForm()">Submit</button>
          </form>
          </div>    
    </div>
  </div>


<div class="container">
  <div class="row">
<?php 
$count = 0;
while($row =  mysqli_fetch_assoc($result)) { ?>  
  <div class="col-lg-4">
  <div class="card bg-primary mt-3">
    <div class="card-body text-white">
        <p class="card-text">                        
          <h4> <?php echo $row['title']; ?> </h4>
          <h6> <?php echo $row['dates']; ?> </h6>
          <p> <?php echo $row['note']; ?> </p>
        </p>
        <img src="./css/rightarrow.svg" alt="next_arrow" width="25px">
       
    </div>
    <div class="line" style="color:white; padding:10px">
      <?php  $count++; echo "In Process - " .$count;?>
    </div>
    </div>
    
  </div>

<?php } ?>
</div>

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
      

    </script>
</body>

</html>