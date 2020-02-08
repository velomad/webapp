
<?php
session_start(); 
include("db.php");
require_once("operations.php");
$id = isset($_GET['id']) ? $_GET['id'] : '';
$sql=" SELECT * FROM projects WHERE id = $id ";
$quey=mysqli_query($conn,$sql); 
//echo $quey;
// echo "test";
$row = mysqli_fetch_assoc($quey);

$userprofile = $_SESSION['user_name'];
if($userprofile == true)
{
  
 
}
else
{
  header("Location:index.php");
} 
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
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f2f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
</style>
</head>
<body>

<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Peaks & Arrow</a>
 
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="logout.php">SIGN OUT</a>
    </li>
  </ul>
</nav>


<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add_project.php">
              <span data-feather="plus-circle"></span>
              Add Project
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="view_project.php">
              <span data-feather="eye"></span>
              View Projects
            </a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="timeline.php">
              <span data-feather="more-horizontal"></span>
              Timeline
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="packaging.php">
              <span data-feather="package"></span>
              Packaging Process
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row pt-3 ml-3"><a class="pr-3" href="view_project.php"><button class="btn btn-success">projects</button></a> 
    <a class="pr-3" href="timeline.php"><button class="btn btn-success">View Tiemline</button></a>
    <a href="inventory_insights.php"><button class="btn btn-success">Inventory insights</button></a>
  
    <h4 style="margin-left:60px;">
      ID : <?php echo $row['school_id'] ?>
    </h4>
    <h4 style="margin-left:100px;">
      Password : <?php echo $row['school_password']; ?>
    </h4>

  
  
  </div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        
     

<div class="container text-center ">
    
    <h5 class="py-4 bg-dark text-light rounded row">
        <div class="col">Project Title : <?php echo $row["title"];?></div>
        <div class="col">Deadline : <?php echo $row["deadline"];?></div>
       
    </h5> 
    <div class="py-4 mb-2 bg-secondary text-light rounded row">
    <div class="col-sm-8 text-left">Description : <?php echo $row["info"];?></div>
    </div>
    <div class="d-flex justify-content-center">
        <form action="" method="POST" class="w-40">
            <div class="py-1">
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend ">
                <span class="input-group-text" id="inputGroup-sizing-sm">item</span>
                </div>
                <input type="hidden" autocomplete="off" placeholder="id" name="id" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="" >
                <input type="text" autocomplete="off" placeholder="item name" name="item_name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="" >
                </div>
            </div>
            <div class="pt-1">
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend ">
                <span class="input-group-text" id="inputGroup-sizing-sm">size</span>
                </div>
                <input type="number" autocomplete="off" name="s1" placeholder="size" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="">
                <input type="number" autocomplete="off" name="s2" placeholder="size" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="">
                <input type="number" autocomplete="off" name="s3" placeholder="size" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="">
                <input type="number" autocomplete="off" name="s4" placeholder="size" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="">
                <input type="number" autocomplete="off" name="s5" placeholder="size" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="">
                <input type="number" autocomplete="off" name="s6" placeholder="size" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="">
                <input type="number" autocomplete="off" name="s7" placeholder="size" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="">
                <input type="number" autocomplete="off" name="s8" placeholder="size" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="">
                <input type="number" autocomplete="off" name="s9" placeholder="size" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="">
                <input type="number" autocomplete="off" name="s10" placeholder="size" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="">
                <input type="number" autocomplete="off" name="s11" placeholder="size" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="">
                <input type="number" autocomplete="off" name="s12" placeholder="size" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="">
                <input type="number" autocomplete="off" name="s13" placeholder="size" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="">
                <input type="number" autocomplete="off" name="s14" placeholder="size" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="">
                <input type="number" autocomplete="off" name="s15" placeholder="size" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="">

                </div>
            </div>
            <div class="pt-1">
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend ">
                <span class="input-group-text" id="inputGroup-sizing-sm">pcs</span>
                </div>
                <input type="number" autocomplete="off" placeholder="pcs" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="" name="p1">
                <input type="number" autocomplete="off" placeholder="pcs" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="" name="p2">
                <input type="number" autocomplete="off" placeholder="pcs" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="" name="p3">
                <input type="number" autocomplete="off" placeholder="pcs" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="" name="p4">
                <input type="number" autocomplete="off" placeholder="pcs" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="" name="p5">
                <input type="number" autocomplete="off" placeholder="pcs" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="" name="p6">
                <input type="number" autocomplete="off" placeholder="pcs" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="" name="p7">
                <input type="number" autocomplete="off" placeholder="pcs" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="" name="p8">
                <input type="number" autocomplete="off" placeholder="pcs" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="" name="p9">
                <input type="number" autocomplete="off" placeholder="pcs" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="" name="p10">
                <input type="number" autocomplete="off" placeholder="pcs" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="" name="p11">
                <input type="number" autocomplete="off" placeholder="pcs" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="" name="p12">
                <input type="number" autocomplete="off" placeholder="pcs" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="" name="p13">
                <input type="number" autocomplete="off" placeholder="pcs" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="" name="p14">
                <input type="number" autocomplete="off" placeholder="pcs" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="" name="p15">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-success" name="create">Create</button>&nbsp;
                <!-- <button class="btn btn-success" name="read">read</button>&nbsp; -->
                <button class="btn btn-success" onClick=" prompt()" name="update">update</button>&nbsp;
                <button class="btn btn-success" onClick=" prompt()" name="delete">delete</button>&nbsp;
            </div>
        </form>
    </div>

    <div class="d-flex table-data pt-3">
        <table class="table table-striped table-dark">
            <thead class="thead-dark">
                <tr>
                    <th>
                        ID
                    </th>
                    <th >
                        Items
                    </th>
                    <th colspan="16">
                        Quantity
                    </th>
                    <th colspan ="5">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody id="tbody">
            <?php
            if(isset($_POST['create']) || isset($_POST['update']) || isset($id)){
              // $id = isset($_GET['id']) ? $_GET['id'] : '';
                $result = getData($id);

                if($result){
                    while($row = mysqli_fetch_assoc($result)){?>

                    <tr>
                    <td data-id="<?php echo $row['id']; ?>" rowspan="2" style="vertical-align:middle;"><?php echo $row['id']; ?></td>
                    <td data-id="<?php echo $row['id']; ?>" rowspan="2" style="vertical-align:middle;"><?php echo $row['item_name']; ?></td>
                    <td>Size</td>
                    
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['s1']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['s2']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['s3']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['s4']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['s5']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['s6']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['s7']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['s8']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['s9']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['s10']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['s11']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['s12']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['s13']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['s14']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['s15']; ?></td>
  <td rowspan="2"  style="vertical-align:middle;"> <p class="btnedit" data-id="<?php echo $row['id']; ?>"> EDIT </p></td>
                    </tr>
                    <tr>
                    <td>Pcs</td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['p1']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['p2']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['p3']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['p4']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['p5']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['p6']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['p7']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['p8']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['p9']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['p10']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['p11']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['p12']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['p13']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['p14']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo $row['p15']; ?></td>
                    </tr>
            <?php
                    }
                }
            }
            ?>
              <!--  <tr>
                <td rowspan="2" style="vertical-align:middle;">Shirt</td>
  <td>Size</td>
  <td>18</td>
  <td>20</td>
  <td>22</td>
  <td>24</td>
  <td>26</td>
  <td>28</td>
  <td>30</td>
  <td>32</td>
  <td>34</td>
  <td>36</td>
  <td>38</td>
  <td>40</td>
  <td>42</td>
  <td>44</td>
  <td>46</td>
  <td rowspan="2"  style="vertical-align:middle;"> <a href="">Edit</a> </td>
                </tr>
                <tr>
                <td>Pcs</td>
  <td>50</td>
  <td>50</td>
  <td>50</td>
  <td>50</td>
  <td>50</td>
  <td>50</td>
  <td>50</td>
  <td>50</td>
  <td>50</td>
  <td>50</td>
  <td>50</td>
  <td>50</td>
  <td>50</td>
  <td>50</td>
  <td>50</td>
  
                </tr> -->
            </tbody>
        </table>
    </div>

</div>
  
      </div>
    </main>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="jquery-3.4.1.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        feather.replace();

        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });

        $('.btnedit').click(e=>{
            let textvalues = displayData(e);
            let id = $("input[name*='id']");
            let itemname = $("input[name*='item_name']");
            let s1 = $("input[name*='s1']");
            let s2 = $("input[name*='s2']");
            let s3 = $("input[name*='s3']");
            let s4 = $("input[name*='s4']");
            let s5 = $("input[name*='s5']");
            let s6 = $("input[name*='s6']");
            let s7 = $("input[name*='s7']");
            let s8 = $("input[name*='s8']");
            let s9 = $("input[name*='s9']");
            let s10 = $("input[name*='s10']");
            let s11 = $("input[name*='s11']");
            let s12 = $("input[name*='s12']");
            let s13 = $("input[name*='s13']");
            let s14 = $("input[name*='s14']");
            let s15 = $("input[name*='s15']");
            let p1 = $("input[name*='p1']");
            let p2 = $("input[name*='p2']");
            let p3 = $("input[name*='p3']");
            let p4 = $("input[name*='p4']");
            let p5 = $("input[name*='p5']");
            let p6 = $("input[name*='p6']");
            let p7 = $("input[name*='p7']");
            let p8 = $("input[name*='p8']");
            let p9 = $("input[name*='p9']");
            let p10 = $("input[name*='p10']");
            let p11 = $("input[name*='p11']");
            let p12 = $("input[name*='p12']");
            let p13 = $("input[name*='p13']");
            let p14 = $("input[name*='p14']");
            let p15 = $("input[name*='p15']");



            id.val(textvalues[0]);
            itemname.val(textvalues[1]);
            s1.val(textvalues[2]);
            s2.val(textvalues[3]);
            s3.val(textvalues[4]);
            s4.val(textvalues[5]);
            s5.val(textvalues[6]);
            s6.val(textvalues[7]);
            s7.val(textvalues[8]);
            s8.val(textvalues[9]);
            s9.val(textvalues[10]);
            s10.val(textvalues[11]);
            s11.val(textvalues[12]);
            s12.val(textvalues[13]);
            s13.val(textvalues[14]);
            s14.val(textvalues[15]);
            s15.val(textvalues[16]);
            p1.val(textvalues[17]);
            p2.val(textvalues[18]);
            p3.val(textvalues[19]);
            p4.val(textvalues[20]);
            p5.val(textvalues[21]);
            p6.val(textvalues[22]);
            p7.val(textvalues[23]);
            p8.val(textvalues[24]);
            p9.val(textvalues[25]);
            p10.val(textvalues[26]);
            p11.val(textvalues[27]);
            p12.val(textvalues[28]);
            p13.val(textvalues[29]);
            p14.val(textvalues[30]);
            p15.val(textvalues[31]);



        });

        function displayData(e){
          console.log("e",e);
            let id = 0;
            const td = $("#tbody tr td");
            let textvalues = [];

            for(const value of td){
              console.log("Value",value);
              console.log("value.dataset.id",value.dataset.id);
              
                if(value.dataset.id == e.target.dataset.id){

                    textvalues[id++] = value.textContent;

                }
            }
            
            return textvalues;
        }
    

        function prompt(){
          alert("are you sure ?");
        }
    </script>
</body>

</html>