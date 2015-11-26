
<?php
	include "include.php";
	$query="SELECT * FROM sched";
	$result = mysqli_query($con,$query) or die (mysqli_error($con));
	while($rows = mysqli_fetch_array($result)) {
		$sunrise_start = $rows[1];
		$sunrise_end = $rows[2];
		$morning_start = $rows[3];
		$morning_end = $rows[4];
		$daytime_start = $rows[5];
		$daytime_end = $rows[6];
		$sunset_start = $rows[7];
		$sunset_end = $rows[8];
		$night_start = $rows[9];
		$night_end = $rows[10];
		$nolight_start = $rows[11];
		$nolight_end = $rows[12];
		$phase = $rows[13];
		if ( $phase == "Sunrise") { $sunrise_status="<div class=\"led-on\"></div>";} else {$sunrise_status="<div class=\"led-off\"></div>";};
		if ( $phase == "Morning") { $morning_status="<div class=\"led-on\"></div>";} else {$morning_status="<div class=\"led-off\"></div>";};
		if ( $phase == "Daytime") { $daytime_status="<div class=\"led-on\"></div>";} else {$daytime_status="<div class=\"led-off\"></div>";};
		if ( $phase =="Sunset") { $sunset_status="<div class=\"led-on\"></div>";} else {$sunset_status="<div class=\"led-off\"></div>";};
		if ( $phase == "Night") { $night_status="<div class=\"led-on\"></div>";} else {$night_status="<div class=\"led-off\"></div>";};
		if ( $phase == "NoLight") { $nolight_status="<div class=\"led-on\"></div>";} else {$nolight_status="<div class=\"led-off\"></div>";};	
	}

?>

<html>
<head>
	<style type="text/css">
		th { text-align: center;}
		td { vertical-align:middle;}
	</style>
</head>

<body>
<div align="center">

			<div style="width:<?php print $tablewidth; ?>px;">
				<form  action="general-submit.php" method="post">
				<input name="option" value="scheduler" hidden>
					<table class="<?php print $tablebackground; ?>" border="0" width="<?php print $tablewidth; ?>">
					<div class="<?php print $tablebackground_nolines_header;?>"><div class="customfont" align="center">Power Schedule</div></div>
						<th style="text-align:left;border:0px;">Period</th><th style="border:0px;">Start</th><th style="border:0px;">End</th><th style="border:0px;"></th><tr>
						<td>Sunrise</td><td><input type="text" class="form-control"size="5" name="sunrise_start" value="<?php print $sunrise_start; ?>"></td>
						<td><input type="text" class="form-control"size="5" name="sunrise_end" value="<?php print $sunrise_end; ?>"></td><td><?php print $sunrise_status;?></td></tr>
						<td>Morning</td><td><input type="text" class="form-control"size="5" name="morning_start" value="<?php print $morning_start; ?>"></td>
						<td><input type="text" class="form-control"size="5" name="morning_end" value="<?php print $morning_end; ?>"></td><td><?php print $morning_status;?></td></tr>
						<td>Daytime</td><td><input type="text" class="form-control"size="5" name="daytime_start" value="<?php print $daytime_start; ?>"></td>
						<td><input type="text" class="form-control"size="5" name="daytime_end" value="<?php print $daytime_end; ?>"></td><td><?php print $daytime_status;?></td></tr>
						<td>Sunset</td><td><input type="text" class="form-control"size="5" name="sunset_start" value="<?php print $sunset_start; ?>"></td>
						<td><input type="text" class="form-control"size="5" name="sunset_end" value="<?php print $sunset_end; ?>"></td><td><?php print $sunset_status;?></td></tr>
						<td>Night</td><td><input type="text" class="form-control"size="5" name="night_start" value="<?php print $night_start; ?>"></td>
						<td><input type="text" class="form-control"size="5" name="night_end" value="<?php print $night_end; ?>"></td><td><?php print $night_status;?></td></tr>
						<td>No Light</td><td><input type="text" class="form-control"size="5" name="nolight_start" value="<?php print $nolight_start; ?>"></td>
						<td><input style="background-color: #BDBDBD;" type="text" class="form-control" size="5" name="nolight_end" value="<?php print $nolight_end; ?>" readonly></td><td><?php print $nolight_status;?></td></tr>
						<td></td><td><td><button type="submit" class="btn btn-default">Save</button></td><td></td>
					</table>
				</form>
</div>
</body>
</html>
