
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>JayFish</title>

<!-- CSS -->

<!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.css">
<!-- CUSTOM CSS -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">

<!-- FONT AWESOME CSS -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!-- GOOGLE FONTS - LRG FONTS custom.css -->
    <link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<!-- MENU FONT-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
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
<!-- TOP MENU BAR -->
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

<!-- ------------------------------------------------------ MENU BAR -->

<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img src="images/logo.png" width="40"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php"><i class="fa fa-home fa-1x"></i>Home</a></li>
        <!-- <li>&nbsp&nbsp  </li> -->
        <li style="padding-left:5px;"><?php print $maintenance_led;?></li>
        <li><a href="power.php">&nbspPower</a></li>
        <li><a href="scheduler.php">Schedule</a></li>
        <li><a href="statistics.php">Statistics</a></li>


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Maintenance<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="chem.php">Chemical Readings</a></li>
            <li class="divider"></li>
            <li><a href="filter.php">Filter Maintenance</a></li>
          <li class="divider"></li>
        <li><a href="waterchange.php">Water Change</a></li>


          </ul>
        </li>



        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Species<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="species.php">View Species</a></li>
            <li class="divider"></li>
            <li><a href="add_species.php">Add Species</a></li>
          </ul>
        </li>


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Settings<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="admin_theme.php">Look and Feel</a></li>
            <li class="divider"></li>
            <li><a href="admin_general.php">General Settings</a></li>
            <li class="divider"></li>
            <li><a href="admin_gpio.php">GPIO Settings</a></li>
            <li class="divider"></li>
            <li><a href="admin_matrix.php">Phase Matrix</a></li>

          </ul>
        </li>




        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Temperature <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="temperature.php">Table View</a></li>
            <li class="divider"></li>
            <li><a href="temperature_graphs.php">Graph View</a></li>
          </ul>
        </li>


          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Help<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="http://www.subzerobc.com/ticket" target="_blank">Support Ticket</a></li>
            <li class="divider"></li>
            <li><a href="http://www.subzerobc.com/jayfish/help" target="_blank">User Guide</a></li>
          </ul>
        </li>

 	<ul class="nav navbar-nav">
         <li><a href="admin-submit.php?optionget=logout">Logout</a></li>
    </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- ------------------------------------------------------ MENU BAR -->

<body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap-confirmation.js"></script>
    </body>

<nav class="nav navbar-fixed-bottom">
<?php

$query="SELECT * FROM codes WHERE code='thermtype'";
$result=mysqli_query($con,$query)or die(mysqli_error($con));
while ($rows = mysqli_fetch_array($result))
{
  $thermtype=$rows['state'];
}



$query="SELECT * FROM `therm` ORDER BY ID DESC LIMIT 1;";
  $result = mysqli_query($con,$query) or die (mysqli_error($con));
  while($rows = mysqli_fetch_array($result)) {
    $therm = $rows['therm'];
    $thermii = $rows['thermii'];
  }

if ($thermtype=='1')
{
$thermclass="&deg;C";
  }
else {
  $therm=$therm * 9 / 5 + 32;
  $thermii=$thermii * 9 / 5 + 32;
  $thermclass="&deg;F";
}

?>


<!-- ------------------------------------------------------ FOOTER BAR -->
<table border="1" style="width:100%;">
  <td style="background-color: white;color: black;text-align: center;">
        Water Temp:&nbsp<?php print $therm." ".$thermclass; ?>  Air: <?php print $thermii." ".$thermclass; ?>
        &nbsp Phase: <?php print $phase;?>
  </td>
</table>

</nav>
<!-- ------------------------------------------------------ FOOTER BAR -->
