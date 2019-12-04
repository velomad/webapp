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

$query = "SELECT * FROM additem";


?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['items', 'Stock', 'Sales'],
          <?php 
          $query = "SELECT * FROM additem";
          $sql = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_assoc($sql)){ 
                    $items=$row['item_name'];
                    $stock=$row['quantity'];
                    $sales=$row['rate']; 
                ?>  
                ['<?php echo $items; ?>',<?php echo $stock; ?>,<?php echo $sales ?>],
                <?php
                }
                ?>       
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 1200px; height: 500px"></div>
  </body>
</html>
