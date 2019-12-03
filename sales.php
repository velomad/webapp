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

$query = " SELECT * FROM categories ";


$query2 = " SELECT * FROM additem ";

// $query3 = "SELECT * FROM sales";

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
    <a class="nav-link" href="stock.php">STOCKS</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="purchase.php">PURCHASE</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">SALES</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="dashboard.php">DASHBOARD</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="logout.php">SIGN OUT</a>
  </li>
</ul>


<div class="container">
<p style="background-color:#323232; padding:10px 50px; border-radius:5px; width:100%; text-align:left; font-size:20px; color:white;">SALES</p>

<button type="button" class="btn btn-primary mb-3" id="gensale">
  Generate Sale
</button>

<div class="row slider">
<div class="col-lg-6">
  <form id="formvalues">
        <!-- dropdown -->
        <select class="form-control mb-2" id="category" name="category">
                          <option value="">SELECT CATEGORY</option>
                          <?php
                          $sql = mysqli_query($conn, $query);
                         while($row = mysqli_fetch_assoc($sql)){ ?>  
				      	<option value=<?php echo $row['category_id']; ?>><?php echo $row['category_name'] ?></option>
                        <?php } ?>
				      </select>
        <!-- end dropdown -->
     <!-- dropdown -->
     <select class="form-control mb-2" id="itemname" name="itemname">
                          <option value="">SELECT ITEM</option>
                          <?php
                          $sql2 = mysqli_query($conn, $query2);
                         while($row = mysqli_fetch_assoc($sql2)){ ?>  
				      	<option value=<?php echo $row['category_id']; ?>><?php echo $row['item_name'] ?></option>
                        <?php } ?>
				      </select>
        <!-- end dropdown -->
      <input type="text" placeholder="Quantity" id="quantity" name="quantity" class="form-control mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
      
        
      <input type="text" placeholder="Client" id="client" name="client" class="form-control mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
      <input type="text" placeholder="Rate" id="rate" name="rate" class="form-control mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
    
    
        <button type="button" id="butclose" class="btn btn-secondary">Close</button>
        <button  id="butsave" class="btn btn-primary">Save changes</button>
        </form>
        <div class="alert alert-success alert-dismissible mt-4" id="success" style="display:none;">
	           <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        </div>
        </div>
      </div>
<table class="table mt-3">
  <thead class="thead-light">
    <tr>
      <th scope="col">Date &nbsp; | &nbsp; Time</th>
      <th scope="col">Category</th>
      <th scope="col">Item</th>
      <th scope="col">Quantity</th>
      <th scope="col">Unit</th>
      <th scope="col">client</th>
      <th scope="col">Rate</th>
      <th scope="col">Value</th>
      <th scope="col">option</th>
    </tr>
  </thead>
  <tbody id="table">
  
  </tbody>
</table>
</div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="jquery-3.4.1.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        feather.replace();

        // slider menu for adding sales

        $(document).ready(function(){
          $('.slider').hide();
          
          $('#gensale').click(function(){
            $('.slider').slideToggle("slow");
          });
          $('#butclose').click(function(){
            $('.slider').slideUp("slow");
          })
        });


// ajax fo inserting values in db



    function tp(){
    $.ajax({
		url: "viewsalestable.php",
		type: "POST",
		cache: false,
		success: function(data){
			$('#table').html(data); 
		}
	});
  }


tp();
$('#butsave').on('click', function() {
    $("#butsave").attr("disabled", "disabled");
    var category = $('#category').val();
		var itemname = $('#itemname').val();
		var quantity = $('#quantity').val();
		var client = $('#client').val();
    var rate = $('#rate').val();
		
			$.ajax({
				url: "addsales.php",
				type: "POST",
				data: {
          category: category,
					itemname: itemname,
					quantity: quantity,
					client: client,
          rate:rate				
				},
				cache: false,
				success: function(dataResult){
						$("#butsave").removeAttr("disabled");
            $('#formvalues').find('input:text').val('');
            $("#success").show();
						$('#success').html('Data added successfully !');
            tp();
				}
			});
		
	});


    </script>
</body>

</html>