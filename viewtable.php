<?php
include("db.php");

$query2 = "SELECT * FROM additem";
$sql2 = mysqli_query($conn, $query2);

$query4 = "SELECT item_id,dates,category_name,item_name,quantity,vendor,rate FROM additem 
INNER JOIN categories ON categories.category_id = additem.category_id"; 
$sql4 = mysqli_query($conn, $query4);

$query5 = "SELECT item_id,dates,item_name,quantity,unit_name,vendor,rate FROM additem 
 INNER JOIN units ON units.unit_id = additem.unit_id"; 



if($sql2->num_rows > 0){
    while($row = mysqli_fetch_assoc($sql4)){
        ?>

        <tr>
            <td><?php echo $row['dates'];?></td>
            <td><?php echo $row['category_name'];?></td>
            <td><?php echo $row['item_name'];?></td>
            <td><?php echo $row['quantity'];?></td>
            <td><?php $sql10 = mysqli_query($conn, $query5); $roww = mysqli_fetch_assoc($sql10); echo $roww['unit_name'];?></td>
            <td><?php echo $row['vendor'];?></td>
            <td><?php echo $row['rate'];?></td>
            <td><?php echo $row['quantity']*$row['rate'];?></td>
            <td><div class="dropdown" >
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    action
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="edit dropdown-item"  data-id="<?php echo $row['item_id'];?>" id="edit">edit</a>
    <a class="dropdown-item" data-toggle="modal" data-target="#remove" id="#remove">remove</a> 
  </div>
</div>
</td>
        </tr>
        <?php
    }
}
    else{
        echo "0 results";
    }

?>
