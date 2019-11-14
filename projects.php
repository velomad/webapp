
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

$sql="SELECT * FROM projects ORDER BY title DESC;";

$quey=mysqli_query($conn,$sql);  

// if (mysqli_num_rows($quey) > 0) {
  //echo"test";
  // output data of each row
  
  // while($row = mysqli_fetch_assoc($quey)) {
  //     // echo $row['title'];
  // }
// } else {
//   echo "0 results";
// }
// $row=mysqli_fetch_assoc($quey);



?> 
<!doctype html>
<html lang="en"></a>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Dashboard</title>
  </head>
  <body>
  
   <div class="container">
   
    <header class="py-6 bg-dark text-light rounded">
        <a href="logout.php"><button type="button"  class="btn btn-outline-danger">Logout</button></a>
    </header>

    <section id="addproject">
            <button type="button" class="collapsible py-6 bg-dark text-light rounded">Add Project</button>
            <div class="content">
            <form action="insert.php" method="POST" name="add-project-form">
                    <div class="input-group mb-3">
                     
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                            </div>
                            <input type="text" class="form-control" name="title" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                          </div>

                          <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroup-sizing-default">DeadLine</span>
                                </div>
                                <input type="text" class="form-control" name="deadline" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                              </div>
                              
                          <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Description</span>
                          </div>
                          <textarea class="form-control" aria-label="With textarea" name="info" required></textarea>
                        </div>
            
                        <div class="row">
                                <div class="col text-center">
                        <button type="submit" name="submit" class="btn btn-outline-primary" onclick="submitForm()">Submit</button>
                        </form>
                        </div>
                        </div>
            </div>

            
    </section>

    <section id="viewprojects">
            <button type="button" class="collapsible  py-6 bg-dark text-light rounded">View Projects</button>
            <div class="content">
            <table class='table table-bordered bg-dark text-light rounded' id="pagination">
              <?php 
              //print_r($row);
              if (mysqli_num_rows($quey) > 0) {
                while($row = mysqli_fetch_assoc($quey)){
                 
?>
                 <tr><td><a href="project_report.php?id=<?php echo $row['id']?>" ><?php echo $row['title']  ?></td></tr>
               
<?php
               } }
               else {
                  echo "0 results";
                }
              ?>       </table>
            </div>
    </section>

    <section id="packaging">
      <button type="button" class="collapsible  py-6 bg-dark text-light rounded">Packaging Process</button>
      <div class="content">
              
      </div>
    </section>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>