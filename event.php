<?php
	include "include.php";

?>
<head>
	<title>Fishpi</title>
	<script>
function confirm_waterchange()
{
var r=confirm("You are about to log an entry.")
if (r==true)
  {
  location.href = "event-water-change-submit.php";
  }
else
  {
  location.href = "event.php";
  }
}

function confirm_fueldose()
{
var s=confirm("You are about to log an entry.")
if (s==true)
  {
  location.href = "event-fuel-dose-submit.php";
  }
else
  {
  location.href = "event.php";
  }
}

</script>

</head>

<body>

<?php
// Tempereaure record count
$query="SELECT dateset FROM event WHERE event='waterchange' ORDER BY dateset DESC LIMIT 1;";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while($rows = mysqli_fetch_array($result)) {
$waterchange = $rows['dateset'];
};

$query="SELECT dateset FROM event WHERE event='fueldose' ORDER BY dateset DESC LIMIT 1;";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while($rows = mysqli_fetch_array($result)) {
$fueldose = $rows['dateset'];
};


$query="SELECT DATEDIFF((SELECT dateset from event where event='waterchange' limit 1), NOW()) AS waterchangediff;";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while($rows = mysqli_fetch_array($result)) {
$waterchangediff = $rows['waterchangediff'];

};

$query="SELECT dateset,value FROM event WHERE event='ph' ORDER BY id DESC LIMIT 1;";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while($rows = mysqli_fetch_array($result)) {
$phdate = $rows['dateset'];
$phvalue = $rows['value'];
};

$query="SELECT dateset,value FROM event WHERE event='no2' ORDER BY id DESC LIMIT 1;";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while($rows = mysqli_fetch_array($result)) {
$no2date = $rows['dateset'];
$no2value = $rows['value'];
};
$query="SELECT dateset,value FROM event WHERE event='no3' ORDER BY id DESC LIMIT 1;";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while($rows = mysqli_fetch_array($result)) {
$no3date = $rows['dateset'];
$no3value = $rows['value'];
};
$query="SELECT dateset,value FROM event WHERE event='nh3' ORDER BY id DESC LIMIT 1;";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while($rows = mysqli_fetch_array($result)) {
$nh3date = $rows['dateset'];
$nh3value = $rows['value'];
};


if ( $waterchangediff == "-1") { $wcdv = "10%"; $alert="Safe";} else { };
if ( $waterchangediff == "-2") { $wcdv = "20%"; $alert="Safe";} else { };
if ( $waterchangediff == "-3") { $wcdv = "30%"; $alert="Safe"; } else { $wcdv2 = "0%";};
if ( $waterchangediff == "-4") { $wcdv = "40%"; $alert="Safe"; } else { $wcdv2 = "0%";};
if ( $waterchangediff == "-5") { $wcdv = "50%"; $alert="Safe"; } else { $wcdv2 = "0%";};
if ( $waterchangediff == "-6") { $wcdv = "50%"; $alert="Caution"; $wcdv2 = "10%";} else { $wcdv3 = "0%";};
if ( $waterchangediff == "-7") { $wcdv = "50%"; $alert="Caution";$wcdv2 = "20%";} else { $wcdv3 = "0%";};
if ( $waterchangediff == "-8") { $wcdv = "50%"; $alert="Danger"; $wcdv2 = "20%"; $wcdv3 = "10%";} else { };
if ( $waterchangediff == "-9") { $wcdv = "50%"; $alert="Danger";$wcdv2 = "20%"; $wcdv3 = "20%";} else { };
if ( $waterchangediff == "-10"){ $wcdv = "50%"; $alert="Danger";$wcdv2 = "20%"; $wcdv3 = "30%";} else { };
if ( $waterchangediff < -10 )  { $wcdv = "50%"; $alert="Danger";$wcdv2 = "20%"; $wcdv3 = "30%";} else { };


$query="SELECT DATEDIFF((SELECT dateset from event where event='fueldose' limit 1), NOW()) AS fueldosediff;";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while($rows = mysqli_fetch_array($result)) {
$fueldosediff = $rows['fueldosediff'];
};

?>


<div align="center" style="font-size: 1.0em;">
  <div style="width:<?php print $tablewidth; ?>px;"><br>
    <table class="<?php print $tablebackground_title; ?>" border="0">
    <td style="border:0px;"><div style="text-align: center;" class="customfont">EVENT LOGGER</div></td>
    <td style="border:0px;vertical-align: middle;">&nbsp&nbsp<a class="menubar" href="ph_graph.php"><i class="fa fa-bar-chart fa-2x"></i></a></td>
    </table>
    
    <table class="<?php print $tablebackground; ?>">
      <tbody>
	<th style="border:0px;">Event</th><th style="border:0px;">Action</th><th style="border:0px;">Last Logged</th><th style="border:0px;">Age</th><tr>
	<td>Water Change</td><td><a href="event-water-change-submit.php"><button  class="btn btn-danger" type="submit" onclick="confirm_waterchange()" value="Display a confirm box"></a>Log</button></td>
	</td>
	<td><?php echo $waterchange ?></td><td><?php echo $waterchangediff; ?></td><tr>
	<td>Fuel Dose</td><td><a href="event-fuel-dose-submit.php"><button  class="btn btn-danger" type="submit" onclick="confirm_fueldose()" value="Display a confirm box"></a>Log</button></td>
	</td>
	<td><?php echo $fueldose ?></td><td><?php echo $fueldosediff; ?></td><tr>
  
  <td colspan="4">&nbsp</td><tr>
  <th style="border:0px;">Chemical</th><th style="border:0px;">Last V</th><th style="border:0px;">Last Logged</th><th style="border:0px;">New V</th><tr>

  <!-- Form -->
  <form action="chempost.php" method="post">
  
  <td>PH</td><td><?php print $phvalue; ?></td><td><?php print $phdate; ?></td>
  <td><input class="form-control" name="ph" style="width:50px" value="" ></td><tr>
  
  <td>Nitrate</td><td><?php print $no3value; ?></td><td><?php print $no3date; ?></td>
  <td><input class="form-control"  name="no3" style="width:50px" value="" ></td><tr>
  
  <td>Nitrite</td><td><?php print $no2value; ?></td><td><?php print $no2date; ?></td>
  <td><input  class="form-control" name="no2" style="width:50px" value="" ></td><tr>
  
  <td>Ammonia</td><td><?php print $nh3value; ?></td><td><?php print $nh3date; ?></td>
  <td><input  class="form-control" name="no4" style="width:50px" value="" ></td><tr>

  <td colspan="3">Enter single or multiple values & click Save.<br>Empty values will be ignored.</td><td ><button class="btn btn-default" type="submit">Save</button></td>
  </form>
  </tbody>
</table>

</div>
</div>
</div>

<div align="center" width="<?php print $tablewidth; ?>px">

Water Change Danger Level:&nbsp;<strong><?php print $alert;?></strong> 

<table width="<?php print $tablewidth; ?>px"><td><Br>
<div class="progress">
  <div class="progress-bar progress-bar-success" style="width: <?php print $wcdv; ?>">
    <span class="sr-only">35% Complete (success)</span>
  </div>
  <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: <?php print $wcdv2; ?>">
    <span class="sr-only">20% Complete (warning)</span>
  </div>
  <div class="progress-bar progress-bar-danger" style="width: <?php print $wcdv3; ?>">
    <span class="sr-only">10% Complete (danger)</span>
  </div>
</div>
</td></table>

<br><br><br>


