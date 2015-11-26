<!DOCTYPE html>

<html>
<head>

       <script src="js/Chart.js"></script>
</head>

<!-- MY CODE -->

<?php
  include "include.php";
?>


<head></head>
<body>



<?php

$count = array(1,2,3,4,5,6,7,8,9,10,11,12);
$collect = array("08","10","12","14","16","18","20","22","00","02","04","06");

foreach ($count as $key => $value) {
$timeslot = $collect[$key];

$query="SELECT * FROM `therm` WHERE `timeset` BETWEEN '$timeslot:00:00' AND '$timeslot:15:00' AND dateset='$yesterday' LIMIT 1;";
  $result = mysqli_query($con,$query) or die (mysqli_error($con));
  while($rows = mysqli_fetch_array($result)) {

    if ($thermtype=="1") {
    
    $yesterday_therm = "yesterday_therm" . $value;
    $$yesterday_therm = $rows['therm'];
    $yesterday_thermii = "yesterday_thermii" . $value;
    $$yesterday_thermii = $rows['thermii'];
  }
  else
  {
    $yesterday_therm = "yesterday_therm" . $value;
    $$yesterday_therm = $rows['therm'] * 9 / 5 + 32;
    $yesterday_thermii = "yesterday_thermii" . $value;
    $$yesterday_thermii = $rows['thermii'] * 9 / 5 + 32;
   
    
  };
  }


};


$count = array(1,2,3,4,5,6,7,8,9,10,11,12);
foreach ($count as $key => $value) {
$yesterday_therm = "yesterday_therm" . $value;
if (is_null($$yesterday_therm)) {$$yesterday_therm=0;};

$yesterday_thermii = "yesterday_thermii" . $value;
if (is_null($$yesterday_thermii)) {$$yesterday_thermii=0;};
  # code...
};


?>

  <script>
    var lineChartData_yesterday = {
      labels : ["24","2","4","6","8","10","12","14","16","18","20","22"],
      datasets : [
        {
           label: "Water",
          fillColor : "rgba(151,187,205,0.2)",
          strokeColor : "rgba(151,187,205,1)",
          pointColor : "rgba(151,187,205,1)",
          pointStrokeColor : "#fff",
          pointHighlightFill : "#fff",
          pointHighlightStroke : "rgba(151,187,205,1)",
          data : [<?php echo $yesterday_therm9; ?>,<?php echo $yesterday_therm10; ?>,<?php echo $yesterday_therm11; ?>,<?php echo $yesterday_therm12; ?>,<?php echo $yesterday_therm1; ?>,<?php echo $yesterday_therm2; ?>,<?php echo $yesterday_therm3; ?>,<?php echo $yesterday_therm4; ?>,<?php echo $yesterday_therm5; ?>,<?php echo $yesterday_therm6; ?>,<?php echo $yesterday_therm7; ?>,<?php echo $yesterday_therm8; ?>]
        },
        {
           label: "Air",
          fillColor : "rgba(200,200,200,0.6)",
          strokeColor : "rgba(220,220,220,1)",
          pointColor : "rgba(220,220,220,1)",
          pointStrokeColor : "#fff",
          pointHighlightFill : "#fff",
          pointHighlightStroke : "rgba(220,220,220,1)",
          data : [<?php echo $yesterday_thermii9; ?>,<?php echo $yesterday_thermii10; ?>,<?php echo $yesterday_thermii11; ?>,<?php echo $yesterday_thermii12; ?>,<?php echo $yesterday_thermii1; ?>,<?php echo $yesterday_thermii2; ?>,<?php echo $yesterday_thermii3; ?>,<?php echo $yesterday_thermii4; ?>,<?php echo $yesterday_thermii5; ?>,<?php echo $yesterday_thermii6; ?>,<?php echo $yesterday_thermii7; ?>,<?php echo $yesterday_thermii8; ?>]
        }
      ]

    }

  // window.onload = function(){
  //   var ctxa = document.getElementById("canvas").getContext("2d");
  //   window.myLine = new Chart(ctxa).Line(lineChartData_yesterday, {responsive: false});
  // }


  </script>




<!-- ---------------------------------------------------- -->

<?php


$count = array(1,2,3,4,5,6,7,8,9,10,11,12);
$collect = array("08","10","12","14","16","18","20","22","00","02","04","06");

foreach ($count as $key => $value) {
$timeslot = $collect[$key];

$query="SELECT * FROM `therm` WHERE `timeset` BETWEEN '$timeslot:00:00' AND '$timeslot:15:00' AND dateset=current_date() LIMIT 1;";
  $result = mysqli_query($con,$query) or die (mysqli_error($con));
  while($rows = mysqli_fetch_array($result)) {
    
    if ($thermtype=="1") {
    $therm = "therm" . $value;
    $$therm = $rows['therm'];
    $thermii = "thermii" . $value;
    $$thermii = $rows['thermii'];
  }
  else
  {
    $therm = "therm" . $value;
    $$therm = $rows['therm']* 9 / 5 + 32;
    $thermii = "thermii" . $value;
    $$thermii = $rows['thermii']* 9 / 5 + 32;
  };
 };


};

$count = array(1,2,3,4,5,6,7,8,9,10,11,12);
foreach ($count as $key => $value) {
$therm = "therm" . $value;
if (is_null($$therm)) {$$therm=0;};

$thermii = "thermii" . $value;
if (is_null($$thermii)) {$$thermii=0;};
  # code...
};


?>

  <script>
    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
    var lineChartData_today = {
      labels : ["24","2","4","6","8","10","12","14","16","18","20","22"],
      datasets : [
       {
           label: "Water",
          fillColor : "rgba(151,187,205,0.2)",
          strokeColor : "rgba(151,187,205,1)",
          pointColor : "rgba(151,187,205,1)",
          pointStrokeColor : "#fff",
          pointHighlightFill : "#fff",
          pointHighlightStroke : "rgba(151,187,205,1)",
          data : [<?php echo $therm9; ?>,<?php echo $therm10; ?>,<?php echo $therm11; ?>,<?php echo $therm12; ?>,<?php echo $therm1; ?>,<?php echo $therm2; ?>,<?php echo $therm3; ?>,<?php echo $therm4; ?>,<?php echo $therm5; ?>,<?php echo $therm6; ?>,<?php echo $therm7; ?>,<?php echo $therm8; ?>]
        },
        {
           label: "Air",
          fillColor : "rgba(200,200,200,0.6)",
          strokeColor : "rgba(220,220,220,1)",
          pointColor : "rgba(220,220,220,1)",
          pointStrokeColor : "#fff",
          pointHighlightFill : "#fff",
          pointHighlightStroke : "rgba(220,220,220,1)",
          data : [<?php echo $thermii9; ?>,<?php echo $thermii10; ?>,<?php echo $thermii11; ?>,<?php echo $thermii12; ?>,<?php echo $thermii1; ?>,<?php echo $thermii2; ?>,<?php echo $thermii3; ?>,<?php echo $thermii4; ?>,<?php echo $thermii5; ?>,<?php echo $thermii6; ?>,<?php echo $thermii7; ?>,<?php echo $thermii8; ?>]
        }
      ]

    }

  window.onload = function(){
    var ctxb = document.getElementById("canvas_today").getContext("2d");
    window.myLine = new Chart(ctxb).Line(lineChartData_today, {responsive: false});

    var ctxa = document.getElementById("canvas_yesterday").getContext("2d");
    window.myLine = new Chart(ctxa).Line(lineChartData_yesterday, {responsive: false});
  }


  </script>


<div class="row">
<div align="center" >
<div class="col-md-2"></div>
  <div class="col-md-4"  style="margin-bottom:10px;">
    <table class="<?php print $tablebackground_nolines;?>" border="0">
      <td style="padding-left:10px; padding-right:10px;"><div align="center" class="plaindark customfont">Yesterdays Graph</div></td><tr>
        <td>
          <div style="width:100%">
          <div><canvas id="canvas_yesterday" height="250" width="<?php print $tablewidth;?>"></canvas></div>
          </div>
        </td>
    </table>
  </div>
</tr>
<td> </td><tr>

  <div class="col-md-4">
    <table class="<?php print $tablebackground_nolines;?>" border="0" width="<?php print $tablewidth;?>">
     <td style="padding-left:10px; padding-right:10px;"><div align="center" class="plaindark customfont">Todays Graph</div></td><tr>
<!--       <td style="padding-left:10px; padding-right:10px;"><div class="customfont">Today's Graph</div></td><tr>
 -->      <td>
          <div style="width:100%;">
            <div>
              <canvas id="canvas_today" height="250" width="<?php print $tablewidth;?>"></canvas>
            </div>
          </div> 
      </td>
    </table> 
  </div>
</div>
<div class="col-md-2"></div>
</div>
<br>


</body>
</html>






