<?php
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
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Items', 'Qty Sold'],
          <?php 
          $sql = "SELECT * FROM saleschart";
          $data = mysqli_query($conn,$sql);
            while($result = mysqli_fetch_assoc($data)){
                echo "['".$result['items']."',".$result['units']."],";
            }
          ?>
          
        ]);

        var options = {
          title: 'Most selling Item',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 500px; height: 400px;"></div>
  </body>
</html>