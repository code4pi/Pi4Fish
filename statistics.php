<?php
	include "include.php";
?>

<head>
	<script>
<script>
function show_alert() {
  if(confirm("Do you really want to do this?"))
    document.forms[0].submit();
  else
    return false;
}
</script>


</head>



<body>


<?php



// Tempereaure record count
$query="SELECT count(id) FROM therm;";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while($rows = mysqli_fetch_array($result)) {
$record_count = $rows['count(id)'];
};

// pi cpu temperature
$query="select * from therm order by id desc limit 1;";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while($rows = mysqli_fetch_array($result)) {
if ($thermtype=='1'){
$cputemp = $rows['thermiii'];
} else { $cputemp = $rows['thermiii'] *9/5+32;}

$cputemp_date = $rows['dateset'];
};


// max water temp
$query="select * from therm order by therm desc limit 1";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while($rows = mysqli_fetch_array($result))
 {
 	if ($thermtype=='1'){
 	$maxwatertemp = $rows['therm'];
 } else {$maxwatertemp = $rows['therm']*9/5+32;};

 	$maxwatertemp_dateset = $rows['dateset'];
 };


 // min water temp
 $query="select * from therm order by therm asc limit 1";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while($rows = mysqli_fetch_array($result))
 {
 	if ($thermtype=='1'){
 	$minwatertemp = $rows['therm'];
 	} 
 	else {$minwatertemp = $rows['therm'] * 9 / 5 + 32;};
 	$minwatertemp_dateset = $rows['dateset'];
 };

// max pi cpu temp
 $query="select * from therm order by thermiii desc limit 1";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while($rows = mysqli_fetch_array($result))
 {
 	if ($thermtype=='1'){
 	$maxcputemp = $rows['thermiii'];
 }else {$maxcputemp = $rows['thermiii']*9/5+32;}
 	$maxcputemp_dateset = $rows['dateset'];
 };

// min pi cpu temp
  $query="select * from therm order by thermiii asc limit 1";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while($rows = mysqli_fetch_array($result))
 {
 	if ($thermtype=='1'){
 	$mincputemp = $rows['thermiii'];
 } else {$mincputemp = $rows['thermiii']*9/5+32;}
 	$mincputemp_dateset = $rows['dateset'];

 };


// Max air temp

$query="select * from therm order by thermii desc limit 1";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while($rows = mysqli_fetch_array($result))
 {
 	if ($thermtype=='1'){
 	$maxairtemp = $rows['thermii'];
 } else {$maxairtemp = $rows['thermii']*9/5+32;};
 	$maxairtemp_dateset = $rows['dateset'];
 };

// Min air temp


$query="select * from therm order by thermii asc limit 1";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while($rows = mysqli_fetch_array($result))
 {
 	if ($thermtype=='1'){
 	$minairtemp = $rows['thermii'];
 } else {$minairtemp = $rows['thermii']*9/5+32;}
 	$minairtemp_dateset = $rows['dateset'];
 };


?>


<div align="center" >

<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine|Inconsolata|Droid+Sans">
<div style="width:<?php print $tablewidth; ?>px;">
<table class="<?php print $tablebackground; ?>">
<div class="<?php print $tablebackground_nolines_header;?>"><div class="customfont" align="center">Statistics</div></div>
	<th style="border:0px;">Stat</th><th style="border:0px;">Value</th><th style="border:0px;">Date</th><tr>
	<td>Temperature Records</td><td><?php echo $record_count;?></td><td><?php print $today; ?></td><tr>
	<td>Cpu Temperature</td><td><?php echo $cputemp; ?></td><td><?php echo $cputemp_date ; ?><tr>
	<td>Max Cpu Temp Ever</td><td style="border-color: #C20000;border-style: dashed;border-radius: 10px;"><?php echo $maxcputemp; ?></td><td><?php echo $maxcputemp_dateset ; ?></td><tr>
	<td>Min Cpu Temp Ever</td><td><?php echo $mincputemp; ?></td><td><?php echo $mincputemp_dateset ; ?></td><tr>
	<td>Max Water Temp Ever</td><td style="border-color: #C20000;border-style: dashed;border-radius: 10px;"><?php echo $maxwatertemp; ?></td><td><?php echo $maxcputemp_dateset ; ?></td><tr>
	<td>Min Water Temp Ever</td><td><?php echo $minwatertemp; ?></td><td><?php echo $minwatertemp_dateset; ?></td><tr>
	<td>Max Air Temp Ever</td><td style="border-color: #C20000;border-style: dashed;border-radius: 10px;"><?php echo $maxairtemp; ?></td><td><?php echo $maxairtemp_dateset; ?></td><tr>
	<td>Min Air Temp Ever</td><td><?php echo $minairtemp; ?></td><td><?php echo $minairtemp_dateset; ?></td><tr>
</table>
<form action="general-submit.php" onSubmit="if(!confirm('If you click OK all therm records will be purged. Are you sure?')){return false;}" method="post">
<input name="option" value="flushstats" hidden>
<button class="btn btn-default" type="submit">FLUSH THERM HISTORY</button>
</form>
</div>
</div>
</div>
</body>
