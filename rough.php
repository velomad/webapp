function closemodal(){
          $('.editmodal').removeClass('show');
          document.getElementById("editmodal").style.display = "none";
        }

        function closebox(){
          $('.editmodal').removeClass('show');
          document.getElementById("editmodal").style.display = "none";
        }


        $('.edit').click( (e)=>{
          console.log("Clicked");
          let textvalues = displayData(e);
          console.log("text",textvalues);
          $('.editmodal').addClass('show');
          document.getElementById("editmodal").style.display = "block";

          
                    
                    let s2 = $("input[name*='itemname']");
                    let s3 = $("input[name*='quantity']");
                    let s4 = $("input[name*='vendor']");
                    let s5 = $("input[name*='rate']");

                    
                    // $('#categoriesStatus').val(textvalues[1]);
                    // console.log("Selected",$('#categoriesStatus').val(textvalues[1]));
                    s2.val(textvalues[2]);
                    s3.val(textvalues[3]);
                    s4.val(textvalues[4]);
                    s5.val(textvalues[5]);
            
           
            
          
              
        });

        function displayData(e){
            let id = 0;
            const td = $("#tbody td");
            let textvalues = [];

            for(const value of td){
              
              
                if(value.dataset.id == e.target.dataset.id){
                    textvalues[id++] = value.textContent;

                }
            }
            
            return textvalues;
        }



		<div class="editmodal modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="padding-right: 17px; display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Item</h5>
        <button type="button" onclick="closemodal()" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="editpurchase.php" method="POST">
        <!-- dropdown -->
        <select class="form-control mb-2"  id="categoriesStatus" name="categoriesStatus" style="width:50%;">
				      	<option value="">SELECT CATEGORY</option>
                <?php 
                $sql = mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($sql)) {?>
				      	<option name="categoriesStatus" value=<?php echo $row['category_id'] ?> ><?php echo $row['category_name'] ?></option>
                <?php } ?>
				      </select>
        <!-- end dropdown -->
      <input type="text" name="itemname" placeholder="Item Name" class="form-control mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
      <input type="text" name="quantity" placeholder="Quantity" class="form-control mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
      <!-- dropdown -->
      <select class="form-control mb-2" id="unitstatus" name="unit_id" style="width:50%;">
                          <option value="">SELECT UNIT</option>
                          <?php
                          $sql = mysqli_query($conn, $query3);
                         while($row = mysqli_fetch_assoc($sql)){ ?>  
				      	<option value=<?php echo $row['unit_id']; ?>><?php echo $row['unit_name'] ?></option>
                        <?php } ?>
				      </select>
        <!-- end dropdown -->
      <input type="text" name="vendor" placeholder="Vendor" class="form-control mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
      <input type="number" name="rate" placeholder="Rate" class="form-control mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
      </div>
      <div class="modal-footer">
        <button type="button" onclick="closebox()" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit"  class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
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
        <button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button>
        
      </div>
    </div>
  </div>
</div>
<!-- Modal -->


<?php
  $sql4 = mysqli_query($conn, $query4);
    while ($row = $sql4->fetch_assoc()) { ?>
    <td data-id="<?php echo $row['item_id']; ?>"><?php echo $row['dates'] ?></td>
    <td data-id="<?php echo $row['item_id']; ?>"><?php echo $row['category_name'] ?></td>
    <td data-id="<?php echo $row['item_id']; ?>"><?php echo $row['item_name'];  ?></td>
    <td data-id="<?php echo $row['item_id']; ?>"><?php echo $row['quantity'];  ?></td>
    <td data-id="<?php echo $row['unit_id']; ?>"><?php $roww = $sql10->fetch_assoc(); echo $roww['unit_name'];  ?></td>
    <td data-id="<?php echo $row['item_id']; ?>"><?php echo $row['vendor'];  ?></td>
    <td data-id="<?php echo $row['item_id']; ?>"><?php echo $row['rate'];  ?></td>
    <td data-id="<?php echo $row['item_id']; ?>"><?php echo $row['quantity']*$row['rate'];  ?></td>
  
  
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
<?php } ?>



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

<div class="modal fade" id="addunit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Unit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="addunit.php" method="POST">
      <input type="text" placeholder="Add Category" name="unit_name" class="form-control" autocomplete="off" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
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