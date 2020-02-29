<?php
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
$id = isset($_GET['id']) ? $_GET['id'] : '';

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
<style>
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td{
    text-align: center;
}

.print{
    width: 280px;
}
</style>
</head>
<body>



  <div class="printstudent">
    <style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;border-color:#9ABAD9; width: 100%;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#9ABAD9;color:#444;background-color:#EBF5FF;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#9ABAD9;color:#fff;background-color:#409cff;}
    .tg .tg-34fe{background-color:#c0c0c0;border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-fq1u{border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-8bgf{font-style:italic;border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-jtou{background-color:#c0c0c0;color:#ffffff;border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-svo0{background-color:#D2E4FC;border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-rqtf{background-color:#c0c0c0;border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-0r1j{color:#ffffff;border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-1teh{background-color:#fe0000;color:#ffffff;border-color:inherit;text-align:center;vertical-align:middle}
    </style>

    <?php  
    $query1 = "SELECT * FROM studentinfo WHERE schoolid = $id";
    $result1 = mysqli_query($conn, $query1);
    $num = 1;
    while($row1 = mysqli_fetch_assoc($result1))
        { 
    $idname = 'id'.$num;
          
    ?>
    <table class="tg" >
      <tr>
      <input type="hidden" value="<?php echo $row1['id'] ?>">
        <th class="tg-8bgf"><?php echo $num ?></th>
        <th class="tg-c3ow">Name</th>
        <th class="tg-c3ow">Gender</th>
        <th class="tg-c3ow">Standard</th>
        <th class="tg-fq1u" style="background-color:<?php echo $row1['selecthouse'] ?>">House</th>
        <?php  
          $itemnamesql = "select item_name from sizeinfo where stud_id = $num";
          $itemnameresult = mysqli_query($conn, $itemnamesql);
          while($itemnamerow = mysqli_fetch_assoc($itemnameresult)){
            ?>
            <th class="tg-jtou"><?php  echo $itemnamerow['item_name'] ?></th>
            <?php
          }
        ?>
        
        <th class="tg-c3ow">Phone No.</th>
        <th class="tg-c3ow">Print</th>
      </tr>
      <tr>
        <td class="tg-svo0"></td>
        <td class="tg-svo0"><?php echo $row1['firstname'].' '.$row1['lastname'] ?></td>
        <td class="tg-svo0"><?php echo $row1['gender'] ?></td>
        <td class="tg-svo0"><?php echo $row1['selectstandard'] ?></td>
        <td class="tg-0r1j" style="background-color:<?php echo $row1['selecthouse'] ?>;"><?php echo $row1['selecthouse'] ?></td>
        <?php  
          $sizesql = "SELECT * from sizeinfo where stud_id = $num";
          $sizeresult = mysqli_query($conn, $sizesql);
          while($sizerow = mysqli_fetch_assoc($sizeresult)){
            ?>
            <th class="tg-jtou"><?php  echo $sizerow['size'] ?> - <?php  echo $sizerow['quantity'] ?></th>
            <?php
          }
        ?>
        <td class="tg-svo0"><?php echo $row1['phonenumber'] ?></td>
        <td class="tg-svo0"><a href="printpage.php?id=<?php echo $row1['id'] ?>"><button>Print</button></a></td>
      </tr>
    </table> 
    <br>
      <?php
      $num++;
        }
      ?>
</div>
 

<div id="data">

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