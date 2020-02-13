<?php

error_reporting(0);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
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

$query = "SELECT * FROM categories";

$query2 = "SELECT * FROM additem";

$query3 = "SELECT * FROM units";

$query4 = "SELECT item_id,dates,category_name,item_name,quantity,vendor,rate FROM additem 
INNER JOIN categories ON categories.category_id = additem.category_id"; 

$query5 = "SELECT item_id,dates,item_name,quantity,unit_name,vendor,rate FROM additem 
 INNER JOIN units ON units.unit_id = additem.unit_id"; 
// $query5 = "SELECT unit_name FROM  units
// INNER JOIN additem ON units.unit_id = additem.unit_id"; 


$sql10 = mysqli_query($conn, $query5);

// $row = mysqli_fetch_assoc($sql10);

// print_r($row);


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
    <script src="jquery-3.4.1.min.js"></script>
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>
<body>

<ul class="nav justify-content-center mb-4">
<li class="nav-item">
    <a class="nav-link" href="stock.php">STOCKS</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">PURCHASE</a>
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

<div class="container">
<div class="row">
        <p style="background-color:#323232; padding:10px 50px; border-radius:5px; width:100%; text-align:left; font-size:20px; color:white;">PURCHASE</p>
    </div>

<div class="btn-group btn-group-md">
<button type="button" class="btn btn-primary" id="additem">add Item</button>
<button type="button" class="btn btn-primary pull-right">Remove category</button>
</div>


<div class="input-group mb-3 mt-3">
  <input type="text" id="mysearch" class="form-control" placeholder="Search" onkeyup="searchFunction()">
  <div class="input-group-append">
  </div>
</div>

  <div class="row mt-3" id="slider">
  <div class="col-lg-6">
  <form id="formvalues">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
        <!-- dropdown -->
        <select class="form-control mb-2" id="category" name="category" value="<?php echo $category; ?>">
                          <option value="">SELECT CATEGORY</option>
                          <?php
                          $sql = mysqli_query($conn, $query);
                         while($row = mysqli_fetch_assoc($sql)){ ?>  
				      	<option value=<?php echo $row['category_id']; ?>><?php echo $row['category_name'] ?></option>
                        <?php } ?>
				      </select>
        <!-- end dropdown -->
      <input type="text" placeholder="Item Name" id="itemname" name="itemname" class="form-control mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" autocomplete="off" value="<?php echo $itemname; ?>">
      <input type="text" placeholder="Quantity" id="quantity" name="quantity" class="form-control mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" autocomplete="off" value="<?php echo $quantity; ?>">
        <!-- dropdown -->
        <select class="form-control mb-2" id="unit" name="unit" value="<?php echo $unit; ?>">
                          <option value="">SELECT UNIT</option>
                          <?php
                          $sql = mysqli_query($conn, $query3);
                         while($row = mysqli_fetch_assoc($sql)){ ?>  
				      	<option value=<?php echo $row['unit_id']; ?>><?php echo $row['unit_name'] ?></option>
                        <?php } ?>
				      </select>
        <!-- end dropdown -->
      <input type="text" placeholder="Vendor" id="vendor" name="vendor" class="form-control mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" autocomplete="off" value="<?php echo $vendor; ?>">
      <input type="text" placeholder="Rate" id="rate" name="rate" class="form-control mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" autocomplete="off" value="<?php echo $rate; ?>">
    
    
        <button type="button" id="butclose" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  id="butsave"  class="btn btn-primary">Save changes</button>
        </form>
  </div>
  <div class="col-lg-6">
<input type="text" placeholder="Add category" id="addcategory" name="addcategory" class="form-control mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
<button  id="addcategorybtn"  class="btn btn-primary">Save changes</button>
<input type="text" placeholder="Add unit" id="addunit" name="addunit" class="form-control mt-3" aria-label="Small" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
<button  id="addunitbtn"  class="btn btn-primary mt-2">Save changes</button>
<div class="alert alert-success alert-dismissible mt-4" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
</div>
</div>
  


<!-- table -->

<table class="table mt-3">
  <thead class="thead-light">
    <tr>
      <th scope="col">Date &nbsp; | &nbsp; Time</th>
      <th scope="col">Category</th>
      <th scope="col">Item</th>
      <th scope="col">Quantity</th>
      <th scope="col">Unit</th>
      <th scope="col">Vendor</th>
      <th scope="col">Rate</th>
      <th scope="col">Value</th>
      <th scope="col">option</th>
    </tr>
  </thead>
  <tbody id="table">

  </tbody>
</table>
<!-- Modal -->


</div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="jquery-3.4.1.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        feather.replace();

// slider for div

$(document).ready(function(){
  $('#slider').hide();
  $('#butclose').click(function(){
    $('#slider').slideUp("slow");
  });
  $('#additem').click(function(){   
      $('#slider').slideToggle("slow");
  });

});

// table insertion using ajax

$(document).ready(function(){
  $('#butsave').on('click',function(){
    var categoryname = $('#category').val()
    var itemname = $('#itemname').val()
    var quantity = $('#quantity').val()
    var unit = $('#unit').val()
    var vendor = $('#vendor').val()
    var rate = $('#rate').val()
    
    $.ajax({
      url:"additem.php",
      type:"POST",
      data:{
      categoryname:categoryname,
      itemname:itemname,
      quantity:quantity,
      unit:unit,
      vendor:vendor,
      rate:rate
    },
    cache:false,
    success:function(data){
      $('#success').show();
      $('#success').html('Purchase Added !');
    }
    });
  });
});


// adding category using

  $(document).ready(function(){
      $("#addcategorybtn").click(function(){
        
        var addcategory = $('#addcategory').val();
        $.ajax({
          url:"addcategories.php",
          type:"post",
          data:{
            category_name:addcategory
          },
          cache:false,
          success: function(data){
            $('#addcategory').val('');
            $("#success").show();
						$('#success').html('Category Added !');
            location.reload();

          } 
        });

      });
  });




  // adding units using ajax

  $(document).ready(function(){
      $("#addunitbtn").click(function(){
        var addunit = $('#addunit').val();
        $.ajax({
          url:"addunit.php",
          type:"post",
          data:{
            unit_name:addunit
          },
          cache:false,
          success: function(data){
            $('#addcategory').val('');
            $("#success").show();
						$('#success').html('unit Added !');
            location.reload();

          }
        });

      });
  });

function delask(){
  alert("Are you sure ?");
}

</script>
</body>

</html>