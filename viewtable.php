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


$sql = "SELECT * FROM additem";
$result = mysqli_query($conn, $sql);



$data = '<table class="table mt-3">
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
<tbody id="table">';  

$sql2 = "SELECT unit_name FROM units 
        INNER JOIN additem ON units.unit_id = additem.unit_id";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);

if(mysqli_num_rows($result) > 0){
  $number = 1;
  while($row = mysqli_fetch_assoc($result)){
    
    $data .= '<tr>
          <td>'.$row['dates'].'</td>
          <td>'.$row['category_id'].'</td>
          <td>'.$row['item_name'].'</td>
          <td>'.$row['quantity'].'</td>
          <td>'.$row['unit_id'].'</td>
          <td>'.$row['vendor'].'</td>
          <td>'.$row['rate'].'</td>
          <td>'.$row['rate'].'</td>
          <td><button class = "btn btn-warning" value="edit">EDIT</button></td>
          <td><button class = "btn btn-danger" value="delete">DELETE</button></td>
        </tr>';
$number++;
  }

  $data .= '</tbody>
        </table>';
echo $data;

}else{

  $errorMsg ='<div class="row" style="background-color:blue"; color:white;>';
              echo "0 results found";
  $errorMsg .=  '</div>';
}


?>


