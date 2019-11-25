<?php
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

$query4 = "SELECT dates,category_name,item_name,quantity,vendor,rate FROM additem 
INNER JOIN categories ON categories.category_id = additem.category_id"; 



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
    <div class="row">
        <!-- Button trigger modal -->
<div class="btn-group mb-3">    
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcategory">
  Add Category
</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#additem">
  Add Item
</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#removecategory">
  Remove Category
</button>
</div>   

<!-- Modal -->

<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="addcategories.php" method="POST">
      <input type="text" placeholder="Add Category" name="category_name" class="form-control" autocomplete="off" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
</form>
      </div>  
    </div>
    
  </div>
</div>

<!-- Modal -->

<!-- Modal -->

<div class="modal fade" id="removecategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="removecategory.php" method="POST">
      <select class="form-control mb-2" id="removecategory" name="removecategory" style="width:50%;">
      <option value="">SELECT CATEGORY</option>
                          <?php
                          $sql = mysqli_query($conn, $query);
                         while($row = mysqli_fetch_assoc($sql)){ ?>  
				      	<option value=<?php echo $row['category_id']; ?>><?php echo $row['category_name'] ?></option>
                        <?php } ?>
				              </select>
                   </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Remove</button>
      </form>
      </div>  
    </div>
    
  </div>
</div>

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="additem.php" method="POST">
        <!-- dropdown -->
        <select class="form-control mb-2" id="categoriesStatus" name="category_id" style="width:50%;">
                          <option value="">SELECT CATEGORY</option>
                          <?php
                          $sql = mysqli_query($conn, $query);
                         while($row = mysqli_fetch_assoc($sql)){ ?>  
				      	<option value=<?php echo $row['category_id']; ?>><?php echo $row['category_name'] ?></option>
                        <?php } ?>
				      </select>
        <!-- end dropdown -->
      <input type="text" placeholder="Item Name" name="item_name" class="form-control mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
      <input type="text" placeholder="Quantity" name="quantity" class="form-control mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
      <input type="text" placeholder="Vendor" name="vendor" class="form-control mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
      <input type="text" placeholder="Rate" name="rate" class="form-control mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit"  class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->


    </div>
    <div class="row">

        <!-- table -->

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Category</th>
      <th scope="col">Item</th>
      <th scope="col">Quantity</th>
      <th scope="col">Vendor</th>
      <th scope="col">Rate</th>
      <th scope="col">Value</th>
      <th scope="col">option</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql4 = mysqli_query($conn, $query4);
    while ($row = $sql4->fetch_assoc()) { ?>
    <td><?php echo $row['dates'] ?></td>
    <th><?php echo $row['category_name'] ?></th>
    <td><?php echo $row['item_name'];  ?></td>
    <td><?php echo $row['quantity'];  ?></td>
    <td><?php echo $row['vendor'];  ?></td>
    <td><?php echo $row['rate'];  ?></td>
    <td><?php echo $row['quantity']*$row['rate'];  ?></td>
  
  
      <td><div class="dropdown" >
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    action
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" data-toggle="modal" data-target="#edit" id="#edit">edit</a>
    <a class="dropdown-item" data-toggle="modal" data-target="#remove" id="#remove">remove</a> 
  </div>
</div>
</td>
</tr>
<?php } ?>

  </tbody>
</table>

        <!-- table -->

<!-- Modal -->

<div class="modal fade" id="remove" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">remove</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <?php 
      $result = mysqli_query($conn, $query2);
      $row = mysqli_fetch_assoc($result); ?>
      <p>Are you sure ?</p>
      </div>    
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <a name="submit" href="removepurchase.php?id=<?echo $row['item_id'];?>">Delete</a>
        
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- dropdown -->
        <select class="form-control mb-2" id="categoriesStatus" name="categoriesStatus" style="width:50%;">
				      	<option value="">SELECT CATEGORY</option>
                <?php 
                $sql = mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($sql)) {?>
				      	<option value=<?php echo $row['category_id'] ?> ><?php echo $row['category_name'] ?></option>
                <?php } ?>
				      </select>
        <!-- end dropdown -->
      <input type="text" placeholder="Item Name" class="form-control mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
      <input type="text" placeholder="Quantity" class="form-control mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
      <input type="text" placeholder="Vendor" class="form-control mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
      <input type="number" placeholder="Rate" class="form-control mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

    </div>
</div>

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