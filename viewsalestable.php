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


$query = " SELECT * FROM categories ";
$sql = mysqli_query($conn, $query);

$query2 = "SELECT item_id, item_name, unit_id FROM additem";
$sql2 = mysqli_query($conn, $query2);

$query3 = "SELECT * FROM sales";
$sql3 = mysqli_query($conn, $query3);




if($sql3->num_rows > 0){ 
        while($row = mysqli_fetch_assoc($sql3)){
    ?>
    <tr>
      <td><?php echo $row['dates'] ?></td>
      <th><?php echo $row['category_id'] ?></th>
      <td><?php echo $row['item_name'] ?></td>
      <td><?php echo $row['quantity'] ?></td>
      <td><?php $roww=mysqli_fetch_assoc($sql2); echo $roww['unit_id']; ?></td>
      <td><?php echo $row['client'] ?></td>
      <td><?php echo $row['rate'] ?></td>
      <td><?php echo $row['quantity']*$row['rate']; ?></td>
      
      <td><div class="dropdown">
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

<?php
}

}else{
    echo "0 results found";
}
?>