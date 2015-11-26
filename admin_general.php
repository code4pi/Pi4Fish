
<?php
include "include.php";

$query = "SELECT * FROM admin where setting = 'wallpaper' ";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while ($row = mysqli_fetch_array($result)) {
	$wallpaper = $row[2];
	}
$query = "SELECT * FROM codes WHERE code='maintenance'";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
 while ($row = mysqli_fetch_array($result)) 
 {
 	 	$maintenance_mode=$row[2];

 	};

 	$query = "SELECT * FROM codes WHERE code='thermtype'";
	$result = mysqli_query($con,$query) or die (mysqli_error($con));
 	while ($row = mysqli_fetch_array($result)) 
 			{
 	 	$thermclassvalue=$row['state'];
 	 	if ($thermclassvalue=='1'){$thermclassvalue="Celcius";} else {$thermclassvalue="Fahrenheit";};

 			};



 $query='SELECT * FROM admin WHERE setting like "%therm%" ORDER BY id ASC;';
 $result = mysqli_query($con,$query) or die (mysqli_error($con));
 // print '<br><bR><br><br><br><br>';
 $key = 0;
 while ($row = mysqli_fetch_array($result)){
 		$therm="therm" . $key++;
 		$$therm = $row[2];
 		// print $therm;

 };

 $query="SELECT * FROM codes WHERE code='relaypolarity'";
 $result = mysqli_query($con,$query) or die (mysqli_error($con));
 while ($row = mysqli_fetch_array($result)){
 	$relaypolarity = $row[2];
 };

 
 ?>
<style>
 td {border: 0px !important;}
</style>

<div align="center">
<table class="<?php print $tablebackground; ?>" style="width:<?php print $tablewidth;?>px;">
<div class="<?php print $tablebackground_nolines_header;?>" style="width:<?php print $tablewidth;?>px;"><div class="customfont" align="center">General Settings</div></div>
	

<form action="admin-submit.php" method="post">
	<div align="left">
		<input name="option" value="maintenance" hidden>
		<td>
		<div class="customfontsml">Manual Power Mode</div>
		<select class="form-control" name="maintenancemode">
		<option>Currently <? print $maintenance_mode;?></option>
		<option value="on">Set to on</option>
		<option value="off">Set to off</optoin>
		</select></td><tr>
	<td><button class="btn btn-default" type="submit">SET</button></Td><tr>
</form>
<td>_______________________________________</td><tr>

<div align="left">
<form action="admin-submit.php" method="post">
<td><div class="customfontsml">Temperature Format</div></td><tr>
<input name="option" value="thermclass" hidden>
<td><select class="form-control" name="thermclassvalue">
<option>Currently <?php print $thermclassvalue;?></option>
<option value="1">Set to Celcius</option>
<option value="0">Set to Fahrenheit</option>
</select></td><tr>
<td><button class="btn btn-default" type="submit">SET</button></td><tr>
</form>
<td>_______________________________________</td><tr>
<form action="admin-submit.php" method="post">
<input name="option" value="thermserials" hidden>
<td><div class="customfontsml">Temperature Serial Numbers</div></td><tr>
<td><div class="form-inline">SENSOR 1:&nbsp&nbsp<input name="therm" class="form-control" value="<?php print $therm0;?>" placeholder="Serial Number Water"></div></td><tr>
<td><div class="form-inline">SENSOR 2:&nbsp&nbsp<input name= "thermii" class="form-control" value="<?php print $therm1;?>" placeholder="Serial Number Air"></div></td><tr>
<td align="left"><button class="btn btn-default" type="submit">SET</button></td><tr>
</form>
<td>_______________________________________</td><tr>
<form action="admin-submit.php" method="post">
<input name="option" value="relaypolarity" hidden>
<td><div class="customfontsml">Relay Polarity</div></td><tr>
<td><div class="form-inline">Active High(1), Low(0):&nbsp<input name="relaypolarity" class="form-control" value="<?php print $relaypolarity;?>" placeholder="Polarity 1 or 0" size="13px"></div></td><tr>
<td align="left"><button class="btn btn-default" type="submit">SET</button></td><tr>
</form>

<td>_______________________________________</td><tr>
<form action="admin-submit.php" method="post">
<input name="option" value="setpasscode" hidden>
<td><div class="customfontsml">Admin Passcode</div></td><tr>
<td><div class="form-inline">Passcode: &nbsp<input name="passcode" class="form-control" value="<?php print $passcode;?>" placeholder="Enter Passcode" size="13px"></div></td><tr>
<td align="left"><button class="btn btn-default" type="submit">SET</button></td>
</form><tr>

<td>_______________________________________</td><tr>

<form action="admin-submit.php" method="post">
<input name="option" value="setthreshold" hidden>
<td><div class="customfontsml">Water Temperature Threshold</div></td><tr>
<td><div class="form-inline">Threshold: &nbsp<input name="thresholdvalue" class="form-control" value="<?php print $threshold;?>" placeholder="Enter Passcode" size="13px"></div></td><tr>
<td>If the temperature is exceeded Relay 8 will be activated until the temperature is reduced. To disable this feature change the value to 0.
<br><br>The schedule in auto mode will still work however if a period is set to off and the temperature exceeds the threshold it will still power on relay 8, manuall will stil overide everything.</td><tr>
<td align="left"><button class="btn btn-default" type="submit">SET</button></td>
</form>


</div>

</table>
</div>
</div>
</div>


<?php print $threshold; ?>