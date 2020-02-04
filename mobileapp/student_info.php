<?php

session_start();
include('db.php');

$query = 'SELECT * FROM projects';

$result = mysqli_query($conn, $query);

if($_SESSION['schoolid']){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Uniform Issued</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mobilestyle.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
        crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
        crossorigin="anonymous"></script>
</head>

<body>

    <!-- <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <div class="banner"><a href="mobiledashboard.php">Peaks&Arrow</a></div>
        <ul class="nav_menu">
            <a href="u_distribution.php">
                <li>Start Distributon</li>
            </a>
            <a href="u_issued.php">
                <li>Uinform Issued</li>
            </a>
            <a href="u_distributed.php">
                <li>Uniform Distributed</li>
            </a>
        </ul>
        <div class="logout"><a href="mobilelogout.php">Logout</a></div>
    </nav> -->

    
    <div class="pos-f-t">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
      <h5 class="text-white h4">Peaks & Arrow</h5>
      <a href="u_distribution.php"><li>Start Distributon</li></a>
      <a href="u_issued.php"><li>Uinform Issued</li></a>
      <a href="u_distributed.php"><li>Uniform Distributed</li></a>
      <a href="mobilelogout.php"><div class="logout">Logout</div></a>
  
    </div>
  </div>
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</div>


    <div class="container">
        <div class="distribution_grid">
            <div class="heading">General Info</div>
        </div>

        <form class="general_info_form" action="" methdo="POST">
            <div class="firstname">
                First Name : <input type="text" name="firstname" id="fistName" placeholder="First Name">
            </div>
            <div class="lastname">
                Last Name : <input type="text" name="lastname" id="lastName" placeholder="Last Name">
            </div>
            <div class="gender">
                Select Gender :
                <input type="radio" name="gender" value="male"> Male
                <input type="radio" name="gender" value="female"> Female
            </div>
            <div class="standard">
                Standard : <select>
                    <option value="volvo">Jr.</option>
                    <option value="saab">Sr.</option>
                    <option value="mercedes">1st</option>
                    <option value="audi">2nd</option>
                    <option value="audi">3rd</option>
                    <option value="audi">4th</option>
                    <option value="audi">5th</option>
                    <option value="audi">6th</option>
                    <option value="audi">7th</option>
                    <option value="audi">8th</option>
                    <option value="audi">9th</option>
                    <option value="audi">10th</option>
                    <option value="audi">11th</option>
                    <option value="audi">12th</option>
                </select>
            </div>
            <div class="house">
                House : <select>
                    <option value="volvo">Red</option>
                    <option value="saab">Green</option>
                    <option value="mercedes">Blue</option>
                    <option value="audi">Yellow</option>
                </select>
            </div>

            <div class="phone">
                Phone No : <input type="number" name="phonenumber" id="phoneNumber" placeholder="Phone Number">
            </div>
            <div class="distribution_grid">
                <div class="heading">Product Info</div>
            </div>

            <p class="sub_heading">Regular Items</p>

            <div class="shirt">
                shirt : <select>
                    <option value="volvo">28</option>
                    <option value="saab">30</option>
                    <option value="mercedes">32</option>
                    <option value="audi">34</option>
                </select>
            </div>

            <div class="shirt">
                shirt : <select>
                    <option value="volvo">28</option>
                    <option value="saab">30</option>
                    <option value="mercedes">32</option>
                    <option value="audi">34</option>
                </select>
            </div>

            <div class="shirt">
                shirt : <select>
                    <option value="volvo">28</option>
                    <option value="saab">30</option>
                    <option value="mercedes">32</option>
                    <option value="audi">34</option>
                </select>
            </div>

            <div class="shirt">
                shirt : <select>
                    <option value="volvo">28</option>
                    <option value="saab">30</option>
                    <option value="mercedes">32</option>
                    <option value="audi">34</option>
                </select>
            </div>

            <p class="sub_heading">PT Items</p>

            <div class="shirt">
                T-shirt : <select>
                    <option value="volvo">28</option>
                    <option value="saab">30</option>
                    <option value="mercedes">32</option>
                    <option value="audi">34</option>
                </select>
            </div>

            <div class="shirt">
                T-shirt : <select>
                    <option value="volvo">28</option>
                    <option value="saab">30</option>
                    <option value="mercedes">32</option>
                    <option value="audi">34</option>
                </select>
            </div>

            <div class="shirt">
                T-shirt : <select>
                    <option value="volvo">28</option>
                    <option value="saab">30</option>
                    <option value="mercedes">32</option>
                    <option value="audi">34</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary two"><a class="textcolor" href="#">Submit</a></button>

        </form>
    </div>



    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="jquery-3.4.1.min.js"></script>

    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>


</body>

</html>
<?php
}else{
header('location:mobilelogout.php');
}

?>