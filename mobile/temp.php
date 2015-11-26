<meta http-equiv="refresh" content="60">

<head>

       

</head>

<?php
include "../connection.php";
include "includes.php";




$count = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23);
$collect = array();


$query="SELECT * FROM therm ORDER BY id DESC LIMIT 24";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while ($rows = mysqli_fetch_array($result)){


array_push($collect, $rows[1]);
// print $rows[1] . " ";

};

$query="SELECT * FROM therm ORDER BY id DESC LIMIT 1";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while ($rows = mysqli_fetch_array($result)){


$currentwatertemp = $rows[1];

};


?>

  <body>
  <?php
include "footer.php";
?>
  <div style="margin-left:0%;">
    <div style="width:90%;">
<table width="100%"><td width="10%" valign="bottom">
<div align="center"><p><h3><img src="water.png" width="40">&nbsp<?php print $currentwatertemp; ?></h3></p></div>
            
</td><td width="100%">

             <canvas id="canvas" height="10%" width="20%"></canvas></td></table>
      </div>
    </div>


  <script>
    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
    var lineChartData = {
      labels : [<?php $x =0; while ($x <= 119){  $x = $x + 5; print $x .",";} ?>],
      datasets : [
        {
          label: "My First dataset",
          fillColor : "rgba(220,220,220,0.2)",
          strokeColor : "rgba(220,220,220,1)",
          pointColor : "rgba(220,220,220,1)",
          pointStrokeColor : "#fff",
          pointHighlightFill : "#fff",
          pointHighlightStroke : "rgba(220,220,220,1)",
          data : [<?php foreach ($collect as $key => $value) {  print $value .",";};?>]
        },
      
      ]

    }

  window.onload = function(){
    var ctx = document.getElementById("canvas").getContext("2d");
    window.myLine = new Chart(ctx).Line(lineChartData, {responsive: true});
  }


  </script>
  </body>