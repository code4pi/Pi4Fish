


<?php
include "include.php";


$count = array(1,2,3,4,5,6);
foreach ($count as $key => $value) 
	{
		$key = $key +1;
		// print $key;
		$query="SELECT * FROM relayphase WHERE id='$key'";
		$result = mysqli_query($con,$query) or die (mysqli_error($con));
		while ($row = mysqli_fetch_array($result)) 
			{	
				$id = "id" .$key;
				$$id=$row[0];

				$description = "description" .$key;
				$$description=$row[1];

				$relaya = "relaya" .$key;
				$$relaya=$row[2];

				$relayb = "relayb" .$key;
				$$relayb=$row[3];
				
				$relayc = "relayc" .$key;
				$$relayc=$row[4];
				
				$relayd = "relayd" .$key;
				$$relayd=$row[5];
				
				$relaye = "relaye" .$key;
				$$relaye=$row[6];
				
				$relayf = "relayf" .$key;
				$$relayf=$row[7];
				
				$relayg = "relayg" .$key;
				$$relayg=$row[8];
				
				$relayh = "relayh" .$key;
				$$relayh=$row[9];

				
				
			}
	}

$count = array(1,2,3,4,5,6,7,8);
foreach ($count as $key => $value) 
	{
		$key = $key +1;
		// print $key;
		$query="SELECT * FROM relay WHERE relay='$key'";
		$result = mysqli_query($con,$query) or die (mysqli_error($con));
		while ($row = mysqli_fetch_array($result)) 
			{
				$relay_desc = "relay_desc" .$key;
				$$relay_desc=$row[3];
			
			}
	}




?>
<div align="center">
<div style="width:<?php print $tablewidth_two; ?>px;">

<table class="<? print $tablebackground; ?>">
<div class="<?php print $tablebackground_nolines_header;?>"><div class="customfont" align="center">Phase Matrix</div></div>


<th>Slot</th>
<th><?php print $relay_desc1; ?></th>
<th><?php print $relay_desc2; ?></th>
<th><?php print $relay_desc3; ?></th>
<th><?php print $relay_desc4; ?></th>
<th><?php print $relay_desc5; ?></th>
<th><?php print $relay_desc6; ?></th>
<th><?php print $relay_desc7; ?></th>
<th><?php print $relay_desc8; ?></th>
<tr>

<form action="admin-submit.php" method="post">
<input name="option" value="relayphase" hidden> <!-- -------------- -->

<!-- -------------------------------------------------------RELAY1 -->
<td>Sunrise</td>
<td>
<select class="form-control" id="colorSelect" name="relaya1">
	<option class="form-control" value="<?php print $relaya1;?>"><?php print $relaya1;?></option>
	<option value="off" style="background-color:red">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayb1">
	<option value="<?php print $relayb1;?>"><?php print $relayb1;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayc1">
	<option value="<?php print $relayc1;?>"><?php print $relayc1;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayd1">
	<option value="<?php print $relayd1;?>"><?php print $relayd1;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relaye1">
	<option value="<?php print $relaye1;?>"><?php print $relaye1;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayf1">
	<option value="<?php print $relayf1;?>"><?php print $relayf1;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayg1">
	<option value="<?php print $relayg1;?>"><?php print $relayg1;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayh1">
	<option value="<?php print $relayh1;?>"><?php print $relayh1;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td><tr>

<!-- -------------------------------------------------------RELAY2 -->
<td>Morning</td>
<td>
<select class="form-control" name="relaya2">
	<option value="<?php print $relaya2;?>"><?php print $relaya2;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayb2">
	<option value="<?php print $relayb2;?>"><?php print $relayb2;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayc2">
	<option value="<?php print $relayc2;?>"><?php print $relayc2;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayd2">
	<option value="<?php print $relayd2;?>"><?php print $relayd2;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relaye2">
	<option value="<?php print $relaye2;?>"><?php print $relaye2;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayf2">
	<option value="<?php print $relayf2;?>"><?php print $relayf2;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayg2">
	<option value="<?php print $relayg2;?>"><?php print $relayg2;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayh2">
	<option value="<?php print $relayh2;?>"><?php print $relayh2;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td><tr>

<!-- -------------------------------------------------------RELAY3 -->
<td>Daytime</td>
<td>
<select class="form-control" name="relaya3">
	<option value="<?php print $relaya3;?>"><?php print $relaya3;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayb3">
	<option value="<?php print $relayb3;?>"><?php print $relayb3;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayc3">
	<option value="<?php print $relayc3;?>"><?php print $relayc3;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayd3">
	<option value="<?php print $relayd3;?>"><?php print $relayd3;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relaye3">
	<option value="<?php print $relaye3;?>"><?php print $relaye3;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayf3">
	<option value="<?php print $relayf3;?>"><?php print $relayf3;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayg3">
	<option value="<?php print $relayg3;?>"><?php print $relayg3;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayh3">
	<option value="<?php print $relayh3;?>"><?php print $relayh3;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td><tr>

<!-- -------------------------------------------------------RELAY4 -->
<td>Sunset</td>
<td>
<select class="form-control" name="relaya4">
	<option value="<?php print $relaya4;?>"><?php print $relaya4;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayb4">
	<option value="<?php print $relayb4;?>"><?php print $relayb4;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayc4">
	<option value="<?php print $relayc4;?>"><?php print $relayc4;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayd4">
	<option value="<?php print $relayd4;?>"><?php print $relayd4;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relaye4">
	<option value="<?php print $relaye4;?>"><?php print $relaye4;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayf4">
	<option value="<?php print $relayf4;?>"><?php print $relayf4;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayg4">
	<option value="<?php print $relayg4;?>"><?php print $relayg4;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayh4">
	<option value="<?php print $relayh4;?>"><?php print $relayh4;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td><tr>

<!-- -------------------------------------------------------RELAY5-->
<td>Night</td>
<td>
<select class="form-control" name="relaya5">
	<option value="<?php print $relaya5;?>"><?php print $relaya5;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayb5">
	<option value="<?php print $relayb5;?>"><?php print $relayb5;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayc5">
	<option value="<?php print $relayc5;?>"><?php print $relayc5;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayd5">
	<option value="<?php print $relayd5;?>"><?php print $relayd5;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relaye5">
	<option value="<?php print $relaye5;?>"><?php print $relaye5;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayf5">
	<option value="<?php print $relayf5;?>"><?php print $relayf5;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayg5">
	<option value="<?php print $relayg5;?>"><?php print $relayg5;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayh5">
	<option value="<?php print $relayh5;?>"><?php print $relayh5;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td><tr>

<!-- -------------------------------------------------------RELAY6-->
<td>Nolight</td>
<td>
<select class="form-control" name="relaya6">
	<option value="<?php print $relaya6;?>"><?php print $relaya6;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayb6">
	<option value="<?php print $relayb6;?>"><?php print $relayb6;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayc6">
	<option value="<?php print $relayc6;?>"><?php print $relayc6;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayd6">
	<option value="<?php print $relayd6;?>"><?php print $relayd6;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relaye6">
	<option value="<?php print $relaye6;?>"><?php print $relaye6;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayf6">
	<option value="<?php print $relayf6;?>"><?php print $relayf6;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayg6">
	<option value="<?php print $relayg6;?>"><?php print $relayg6;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td>
<td>
<select class="form-control" name="relayh6">
	<option value="<?php print $relayh6;?>"><?php print $relayh6;?></option>
	<option value="off">off</option>
	<option value="on">on</option>
	<option value="manual">manual</option>
</select>
</td><tr>
</table>
<button class="btn btn-default" type="submit">SET</button>
</form>

</div>
</div>
