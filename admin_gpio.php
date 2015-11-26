<!-- <meta HTTP-EQUIV="REFRESH" content="10; url=relaysetup.php"> -->
<?php
include "include.php";


$count = array(1,2,3,4,5,6,7,8);
foreach ($count as $key => $value) 
	{
		$key = $key + 1;
		# code...
		$query = "SELECT * FROM relay where relay='$key'";
		$result = mysqli_query($con,$query) or die(mysqli_error($con));
			while ( $rows = mysqli_fetch_array($result)) 
				{
					$relay = "relay".$key;
					$$relay = $rows[1];

					$gpio = "gpio".$key;
					$$gpio = $rows[2];

					$description = "description".$key;
					$$description = $rows[3];
				};

};



?>
<div align="center">
<div style="max-width:<?php print $tablewidth; ?>px;">

		<?php
		print '<form action="admin-submit.php" method="post"><input name="option" value="relayconfig" hidden>
		<table class="'.$tablebackground.'">
		<div class="'.$tablebackground_nolines_header.'"><div class="customfont" align="center">GPIO Setup</div></div>
		<th style="border:0px;"></th><th style="border:0px;">GPIO</th><th style="border:0px;">Description</th><tr>';

		$count = array(a,b,c,d,e,f,g,h);
			foreach ($count as $key => $value) 
				{ $key=$key + 1;
					print '<input name="relay'.$value.'" value="'.${"relay".$key}.'" hidden>';
					print '<td width="80">Relay '.$key.'</td><td width="58"><input class="form-control" name="gpio'. $value.'" value="'. ${"gpio".$key} . '"></td>
					<td><input class="form-control" name="description'.$value.'" value="'. ${"description". $key}.'"></td><tr>';
				};

		print'</table><button class="btn btn-default" type="submit">SET</button></form>';
		?>
	
</div>
</div>
<br><br>