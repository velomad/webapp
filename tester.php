<?php 
session_start(); 
include("db.php");
$id = isset($_GET['id']) ? $_GET['id'] : '';
$sql="select * from projects where id = $id";
$quey=mysqli_query($conn,$sql); 
$row = mysqli_fetch_assoc($quey);



/*
if(isset($_POST['submit']))
      
{
 
  $projects_id=$_POST['projects_id'];
  $item =  $_POST['item'];
  // $deadline = $_POST['deadline'];
  // $info =  $_POST['info'];
  $query = " INSERT INTO items (projects_id, item_name) VALUES ('$projects_id', '$item')";
  mysqli_query($conn, $query);
  header('location:project_report.php');

}*/



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="/script.js"></script>
    <title>project</title>
  </head>
  <body>
   
    <header>
        <button type="button"  class="btn btn-outline-danger">Logout</button>
    </header>

<div class="container">
<section id="project_details">
    <div class="container">
        <div class="container">
            <div class="row">
              <div class="col-sm">
                  <label for="title">Title :
                    <?php 
                      echo $row["title"];
                    ?>
                  </label>
                  
              </div>
              <div class="col-sm">
                  <label for="Deadline">Deadline : <?php 
                      echo $row["deadline"];
                    ?></label>
              </div>
              <div class="col-sm">
                  <label for="Description">Description : <?php 
                      echo $row["info"];
                    ?></label>
              </div>
            </div>
          </div>
</section>

<button type="button" id="additem" class="btn btn-primary additem">Add Item</button>

<section id="requirement_table">

  <div class="tableName">
    <p>Requirement Table</p> 
  </div>
       
  <style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg .tg-cly1{text-align:left;vertical-align:middle}
    .tg .tg-0lax{text-align:left;vertical-align:top}
    
    </style>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'].' ?id'.$id; ?>" target="_blank">
   <table id="tbl">
    <tr>
      <th>Items</th>
      <th colspan="16">Quantity</th>
      <th colspan="3" >Operations</th>
    </tr>
    <tr class=" repeat">
      <td rowspan="2"> <input type="text" id="item" name="item" size="10px" style="border: none; background-color: rgb(224, 224, 224);"> </td>
      <td>Size</td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td rowspan="2"> <button type="button" class="btn btn-primary clear">clear</button> <button class="btn btn-danger remove">Remove</button> </td>
      
    </tr>
    <tr class=" repeat " style="background-color: rgb(238, 208, 169);">
      <td>Pcs</td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
      <td><input type="number" min="0" class="small" size="1px" style="border: none; background-color: rgb(224, 224, 224);"></td>
    </tr>
  </table>

    <div class="row float-left" >

    <button type="button" class="btn btn-primary reqsubmit" >Save</button>


    <input type="hidden" name="projects_id" value="<?php echo $_GET["id"] ?>" >
    <button type="submit"  name="submit" class="btn btn-primary reqsubmit">Submit</button>
    </div>
   

                  </form>
</section>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>

// Add item row on ADD item button click

 $(document).ready(function(){
  $("#additem").click(function(){
    $('.repeat').not('.cloned').clone().addClass('cloned').appendTo("table").find('input').val('').end();
   
  });
});

// Remove items row on remove button click

$('table').on('click','tr .remove',function(e){
         e.preventDefault();
         if(confirm("want to remove ?")){    
        $(this).closest('tr').next().remove();
        $(this).closest('tr').remove();
      }
      });

// clear input values in row on click

$(document).ready(function() {
  $('.clear').click(function() {
    $(this).closest('tr').next().find('input').val('').end();
    $(this).closest('tr').find('input').val('');
  });
});

//saveing table data to localstorage to prevent dataloss of table after reload


 </script>

</body>
</html>


<section id="req_generator">
<div class="container">
    <div class="row">
        <p> requirement table </p>
    </div>
    <div class="row">
        <form action="" method="POST">
            <input type="file" name="file">

            <input type="submit" name="file_upload" value="Submit">
        </form>
    </div>
    <div class="row">
        <p>test</p>
    </div>
    </div>
</section>