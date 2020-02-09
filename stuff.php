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

$query = "SELECT * FROM packaging";

$run = mysqli_query($conn, $query);

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
<!-- 
<table style="width: 100%;">
    <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Standard</th>
        <th>House</th>
        <th class="print">Print</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Sagar Chavan</td>
        <td>Male</td>
        <td>10th</td>
        <td>Red</td>
    </tr>
    <tr>
        <th>Regular Uniform</th>
        <td>shirt : 32</td>
        <td>pant : 32</td>
        <td>tie : 32</td>
        <td>belt : 32</td>
        <td>socks : 32</td>
    </tr>
    <tr>
        <th>PT uniform</th>
        <td>T-shirt : 32</td>
        <td>Track Pant : 32</td>
        <td>PT socks : 28</td>
    </tr>
</table> -->

<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;border-color:#9ABAD9; width: 100%;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#9ABAD9;color:#444;background-color:#EBF5FF;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#9ABAD9;color:#fff;background-color:#409cff;}
    .tg .tg-34fe{background-color:#c0c0c0;border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-fq1u{background-color:#fe0000;border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-8bgf{font-style:italic;border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-jtou{background-color:#c0c0c0;color:#ffffff;border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-svo0{background-color:#D2E4FC;border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-rqtf{background-color:#c0c0c0;border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-0r1j{background-color:#fe0000;color:#ffffff;border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-1teh{background-color:#fe0000;color:#ffffff;border-color:inherit;text-align:center;vertical-align:middle}
    </style>
    <table class="tg">
      <tr>
        <th class="tg-8bgf">No.</th>
        <th class="tg-c3ow">Name</th>
        <th class="tg-c3ow">Standard</th>
        <th class="tg-c3ow">Gender</th>
        <th class="tg-jtou">Shirt</th>
        <th class="tg-34fe">Pant</th>
        <th class="tg-34fe">Tie</th>
        <th class="tg-34fe">Belt</th>
        <th class="tg-34fe">Socks</th>
        <th class="tg-fq1u">House</th>
        <th class="tg-fq1u">PT T-shirt</th>
        <th class="tg-fq1u">PT track pant</th>
        <th class="tg-fq1u">PT socks</th>
        <th class="tg-c3ow">Phone No.</th>
        <th class="tg-c3ow"></th>
        <th class="tg-c3ow">Print</th>
      </tr>
      <tr>
        <td class="tg-svo0">1</td>
        <td class="tg-svo0">Sagar chavan</td>
        <td class="tg-svo0">10th</td>
        <td class="tg-svo0">Male</td>
        <td class="tg-rqtf">32</td>
        <td class="tg-rqtf">32</td>
        <td class="tg-rqtf">L</td>
        <td class="tg-rqtf">8</td>
        <td class="tg-rqtf">6</td>
        <td class="tg-0r1j">red</td>
        <td class="tg-0r1j">32</td>
        <td class="tg-1teh">32</td>
        <td class="tg-0r1j">4</td>
        <td class="tg-svo0">1254256874</td>
        <td class="tg-svo0"></td>
        <td class="tg-svo0"><button>Print</button></td>
      </tr>
    </table>

    <br>
<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;border-color:#9ABAD9; width: 100%;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#9ABAD9;color:#444;background-color:#EBF5FF;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#9ABAD9;color:#fff;background-color:#409cff;}
    .tg .tg-34fe{background-color:#c0c0c0;border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-fq1u{background-color:#fe0000;border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-8bgf{font-style:italic;border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-jtou{background-color:#c0c0c0;color:#ffffff;border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-svo0{background-color:#D2E4FC;border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-rqtf{background-color:#c0c0c0;border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-0r1j{background-color:#fe0000;color:#ffffff;border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-1teh{background-color:#fe0000;color:#ffffff;border-color:inherit;text-align:center;vertical-align:middle}
    </style>
    <table class="tg">
      <tr>
        <th class="tg-8bgf">No.</th>
        <th class="tg-c3ow">Name</th>
        <th class="tg-c3ow">Standard</th>
        <th class="tg-c3ow">Gender</th>
        <th class="tg-jtou">Shirt</th>
        <th class="tg-34fe">Pant</th>
        <th class="tg-34fe">Tie</th>
        <th class="tg-34fe">Belt</th>
        <th class="tg-34fe">Socks</th>
        <th class="tg-fq1u">House</th>
        <th class="tg-fq1u">PT T-shirt</th>
        <th class="tg-fq1u">PT track pant</th>
        <th class="tg-fq1u">PT socks</th>
        <th class="tg-c3ow">Phone No.</th>
        <th class="tg-c3ow"></th>
        <th class="tg-c3ow">Print</th>
      </tr>
      <tr>
        <td class="tg-svo0">1</td>
        <td class="tg-svo0">Sagar chavan</td>
        <td class="tg-svo0">10th</td>
        <td class="tg-svo0">Male</td>
        <td class="tg-rqtf">32</td>
        <td class="tg-rqtf">32</td>
        <td class="tg-rqtf">L</td>
        <td class="tg-rqtf">8</td>
        <td class="tg-rqtf">6</td>
        <td class="tg-0r1j">red</td>
        <td class="tg-0r1j">32</td>
        <td class="tg-1teh">32</td>
        <td class="tg-0r1j">4</td>
        <td class="tg-svo0">1254256874</td>
        <td class="tg-svo0"></td>
        <td class="tg-svo0"><button>Print</button></td>
      </tr>
    </table>

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