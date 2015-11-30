<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>JayFish</title>

<!-- CSS -->

<!-- BOOTSTRAP -->
    <link rel="stylesheet" href="css/bootstrap.css">
<!-- CUSTOM CSS -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">

<!-- FONT AWESOME CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
<!-- GOOGLE FONTS - LRG FONTS custom.css -->
    <link href='css/font-poiret-one.css' rel='stylesheet' type='text/css'>
<!-- MENU FONT-->
    <link href='css/open-sans.css' rel='stylesheet' type='text/css'>
<!-- PHP -->


<?php
session_start();
include "connection.php";

$query="SELECT * FROM admin WHERE setting='passcode';";
  $result=mysqli_query($con,$query)or die(mysqli_error($con));
  while ($rows=mysqli_fetch_array($result))
  {
     $passcode=$rows['value'];
    }

if ($_SESSION['passcode'] == $passcode) {;}else{print '<meta HTTP-EQUIV="REFRESH" content="0; url=login.php">';}


// THRESHOLD FETCH & CHECK

$query="SELECT * FROM codes WHERE code='threshold';";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while($rows = mysqli_fetch_array($result)) {
  $threshold=$rows[2];

  }

$query = "SELECT * FROM event WHERE event='tablebackground'";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while ($rows = mysqli_fetch_array($result))
    {
      $value = $rows['value'];
      global $value;
      if ($value == "Dark"){$tablefontcolor = "#FFFFFF";} else { $tablefontcolor = "#000000";}
    }
?>

<style type="text/css">
html {
    background: url(images/wallpaper.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;

}

body {
color: <?php print $tablefontcolor;?>;

}

.table th {border-top: 5px !important;}
</style>
<style>
  table.menubar
  {
        text-align: center;
        border-radius: 5px;
  }

  a.menubar
  {
    color: white;
  }
</style>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap-confirmation.js"></script>

</head>

<?php

$query = "SELECT * FROM event WHERE event='tablebackground';";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while ($rows = mysqli_fetch_array($result)) {
$table_theme = $rows['value'];
}

$today = date("Y-m-d",strtotime('-0 day'));
$yesterday = date("Y-m-d",strtotime('-1 day'));
$tablewidth = "340";
$tablewidth_two = "1000";


if ($table_theme == "Dark") {
$tablebackground = "table dark";
$tablebackground_nolines = "plaindark";
$tablebackground_nolines_header = "plaindark_header";
$tablebackground_nolines_menubar = "plaindark";
$tablebackground_light = "table light";
$tablebackground_title = "table title"; }
else {
$tablebackground = "table tableclear";
$tablebackground_light = "table";
$tablebackground_title = "table";
$tablebackground_nolines = "tableclear";
$tablebackground_nolines_header = "tableclearheader";
$tablebackground_nolines_menubar = "menubar";
}

$query="SELECT * FROM sched";
$result=mysqli_query($con,$query)or die(mysqli_error($con));
while ($rows = mysqli_fetch_array($result))
{
  $phase =$rows[13];
}

$query="SELECT * FROM codes WHERE code='maintenance';";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while($rows = mysqli_fetch_array($result)) {
  $maintenance_state = $rows[2];
  if ($maintenance_state == "on") {$maintenance_led='<div class="mini-led-red-on"></div>';}
  // if ($maintenance_state == "on") {$maintenance_led='<div class="led-red-on"></div><font size="1">MAINTENANCE MODE ON</font>';};
  if ($maintenance_state == "off"){$maintenance_led='<div class="mini-led-on"></div>';}
   // if ($maintenance_state == "off"){$maintenance_led='<div class="led-on"></div><font size="1">SCHEDULE MODE ON</font>';};
  }

?>