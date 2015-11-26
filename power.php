
<html>
<?php
include "include.php"; 
?> 
<head>
	<style type="text/css">
	.plaindark th { 
		font-weight: normal;
		text-align: center;
		padding-top: 15px;		
		}
	.plaindark td 
		{
		text-align: center;
	}
	
	</style>
</head>

<body>

<div align="center">

<?php

$count = array(1,2,3,4,5,6,7,8);
foreach ($count as $key => $value) {
	$key = $key + 1;
	
	$query="SELECT * FROM relay WHERE relay='$key'";
	$result=mysqli_query($con, $query) or die (mysqli_error($con));
	while($rows = mysqli_fetch_array($result)) 
		{
			$relay = "relay".$key."desc";
			$$relay=$rows[3];
			$relay = "relay".$key."checkbox";
			$$relay=$rows[5];
		}

}

?>

<div style="width:<?php print $tablewidth; ?>px;">
<!--#1E1E20-->
<table class="<?php print $tablebackground_nolines;?>" border="0" width="<?php print $tablewidth; ?>">
<form action="general-submit.php" method="post">
<input name="option" value="relayphase" hidden>
<div class="<?php print $tablebackground_nolines_header;?>"><div class="customfont" align="center">8-Way Relay State</div></div>
<td colspan="4" style="vertical-align: text-bottom;"></td><tr>
<th><?php print $relay1desc;?></th>
<th><?php print $relay2desc;?></th>
<th><?php print $relay3desc;?></th>
<th><?php print $relay4desc;?></th>
<tr>


			<!-- INPUT -->
			<td><input class="bigcheckbox" id="switch1" type="checkbox" name="relay1" <?php print $relay1checkbox;?>></td>
			<td><input class="bigcheckbox" id="switch1" type="checkbox" name="relay2" <?php print $relay2checkbox;?>></td>
			<td><input class="bigcheckbox" id="switch1" type="checkbox" name="relay3" <?php print $relay3checkbox;?>></td>
			<td><input class="bigcheckbox" id="switch1" type="checkbox" name="relay4" <?php print $relay4checkbox;?>></td><tr>
			<!-- INPUT -->

<th><?php print $relay5desc;?></th>
<th><?php print $relay6desc;?></th>
<th><?php print $relay7desc;?></th>
<th><?php print $relay8desc;?></th><tr>


<!-- INPUT -->
			<td><input class="bigcheckbox" id="switch1" type="checkbox" name="relay5" <?php print $relay5checkbox;?>></td>
			<td><input class="bigcheckbox" id="switch1" type="checkbox" name="relay6" <?php print $relay6checkbox;?>></td>
			<td><input class="bigcheckbox" id="switch1" type="checkbox" name="relay7" <?php print $relay7checkbox;?>></td>
			<td><input class="bigcheckbox" id="switch1" type="checkbox" name="relay8" <?php print $relay8checkbox;?>></td><tr>
<!-- INPUT -->

<?php
if ($maintenance_state=="on")
{
	print '<td colspan="4">&nbsp</td><tr><td colspan="4"><button class="btn" type="submit" style="padding: 0px;width:320px;height:30px; color: #000;">APPLY SELECTIONS</button></td><tr>';
}
else {};
?>
<td colspan="4">&nbsp</td>

</form>
</table>

</div>
</div>
