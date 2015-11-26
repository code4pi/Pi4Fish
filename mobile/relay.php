<!DOCTYPE html>

<html>
<head>
<meta http-equiv="refresh" content="60">


<style>
.checkbox{
	display: block;
	width: 40px;
	height: 40px;
	}


</style>
</head>

<div align="center">
<br>
<img src="relayw.png" width="40"><font size="6">Relay Control</font>
</div>
<?php
include "../connection.php";
include "includes.php";


$queryx="SELECT * FROM codes WHERE code='maintenance'";
$resultx = mysqli_query($con,$queryx) or die (mysqli_error($con));
// var_dump($resultx);
while ($rowsx = mysqli_fetch_array($resultx)){
	$maintenance=$rowsx[2];
	// print $maintenance;

if ($maintenance =='on') {
	// print'<div align="center" style="color:red;"><h5>Manual Relay Control Is Currently Engaged</h5></div>';

		$query="SELECT * FROM relay WHERE gpio>'0' ORDER BY relay ASC;";
		$result = mysqli_query($con,$query) or die (mysqli_error($con));
		// var_dump($result);
		print '<div align="center"><form action="mobile_submit.php" method="post"><input name="option" value="mobilerelay" hidden ><table>';
		while ($rows = mysqli_fetch_array($result)){
		$relayid=$rows[0];
		$relaystate=$rows[5];
		$relaydesc=$rows[3];

		// print $rows[1];

		print '
		<td><h3>'.$relaydesc.'</h3><br><input class="checkbox" name="relay'.$relayid.'" type="checkbox" '.$relaystate.'></td><td width="30px"></td>
		';
		};


		print '</table><br>';
		print '<button style="padding:20px;" class="btn btn-default" type="submit">Activate Relay\'s Selected</button>';
		print '</form></div>'; 
		print '<br><p>
					<form action="mobile_submit.php" method="post">
						<div align="center">
							<input name="option" value="autocontrol" hidden>
							<p><button style="padding:20px;"  class="btn btn-success" type="submit">Switch Back To Auto Control</button></p>
						</div>
					</form>
				</p>';




	}
else {
print '
<form action="mobile_submit.php" method="post">
<div align="center">
<input name="option" value="manualcontrol" hidden >
<br><p><button style="padding:20px;" class="btn btn-default" type="submit">Click To Activate Manual Control</button></p>
</div>
</form>
';

	};

};





?>

<body>



</body>


<?php
include "footer.php";
?>


</html>

