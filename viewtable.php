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


?>
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
    <th scope="col">option</th>
  </tr>
</thead>
<tbody id="table">
<?php


$sql = "SELECT * FROM additem";
$result = mysqli_query($conn, $sql);


// $sql2 = "SELECT unit_name FROM units 
//         INNER JOIN additem ON units.unit_id = additem.unit_id";
// $result2 = mysqli_query($conn, $sql2);
// $row2 = mysqli_fetch_assoc($result2);


$sql3 = "SELECT item_id,dates,category_name,item_name,quantity,vendor,rate FROM additem 
INNER JOIN categories ON categories.category_id = additem.category_id"; 
$result3 = mysqli_query($conn, $sql3);

$sql4 = "SELECT item_id,dates,item_name,quantity,unit_name,vendor,rate FROM additem 
 INNER JOIN units ON units.unit_id = additem.unit_id"; 
$result4 = mysqli_query($conn, $sql4);

if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
?>    
  <tr>
          <td><?php $row['dates'] ?></td>
          <td><?php $row['category_id'] ?></td>
          <td><?php $row['item_name'] ?></td>
          <td><?php $row['quantity'] ?></td>
          <td><?php $row['unit_id'] ?></td>
          <td><?php $row['vendor'] ?></td>
          <td><?php $row['rate'] ?></td>
          <td><?php $row['rate'] ?></td>
          <td><button class = "btn btn-warning" value="edit">EDIT</button></td>
          <td><button class = "btn btn-danger" value="delete">DELETE</button></td>
        </tr>
<?php         
  }
  ?>
  </tbody>
</table>

<?php
}
else
{
echo "0 results found";
}

?>


