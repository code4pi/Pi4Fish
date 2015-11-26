<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div align="center">
<?php
include "include.php";
include "connection.php";

$query="SELECT * FROM filter;";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
print '<table class="'.$tablebackground.'" style="max-width:800px;min-width:600px; padding:0px;">';
print '<div class="'.$tablebackground_nolines_header.'" style="max-width:800px; min-width:600px; padding:0px;">
	   <div class="customfont" align="center">Filter Maintenance</div></div>
	   <th>Shortname</th><th>Description</tH><th>Last Action</th><th>Date</th><th>Time</th><th>Action</th><tr>';
print '<form action="general-submit.php" method="post">';
$collect_id = array();
while ($rows = mysqli_fetch_array($result)) 
	{
		$id = $rows['id'];
		$shortname = $rows['shortname'];
		$description= $rows['description'];
			array_push($collect_id, $id);
			
		$query2="SELECT * FROM event WHERE filterid='$id' ORDER BY id DESC LIMIT 1;";
		$result2= mysqli_query($con,$query2)or die (mysqli_error($con));
		while ($rows2 = mysqli_fetch_array($result2))
				{
					$id2 = $rows2['filterid'];
					$dateset = $rows2['dateset'];
					$timeset = $rows2['timeset'];
					$lastvalue = $rows2['value'];
				};


		print '<td>'. $shortname . '</td><td>'. $description . '</td><td>' . $lastvalue . '</td><td>'.$dateset.'</td><td> '.$timeset .'</td>';
		print '<td>
		<input name="option" value="filterv2" hidden>
		<select class="form-control" name="form'.$id.'">
		<option name="None">None</option>
		<option name="Clean">Clean</option>
		<option name="Replace">Replace</option>
		</select></td><tr>';
		$id2="";
		$dateset="";
		$timeset="";
		$lastvalue="";
};
$collect_id = implode(',', $collect_id);
print '</table>';
print '
		<table class="table" style="max-width:800px;min-width:600px; padding:0px;">
			<td align="left"><a href="filter_form.php"<button class="btn btn-default" type="button">MANAGE FILTERS</button></a></td>
			<td align="right"><button class="btn btn-default" type="submit">SUBMIT ACTIONS</button</td><tr>
			
		</table>
		<input name="filtervalues" value="'.$collect_id.'" hidden>
		</form>';

?>
</div>
