

<?php
include "connection.php";
include "include.php";

$query = "SELECT * FROM chem;";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
print '
<div align="center">
<table class="'.$tablebackground.'" style="max-width:800px; padding:0px;">
<div class="'.$tablebackground_nolines_header.'" style="max-width:800px; padding:0px;"><div class="customfont" align="center">Chemical Readings</div></div>
<th>Chemical</th><th>Description</tH><th>Last Reading</th><th>New Reading</th><th>Date</th><th>Time</th><tr>';
print '<form action="general-submit.php" method="post">';
print '<input name="option" value="chem" hidden>';
$collect_id_chem = array();
while ($rows = mysqli_fetch_array($result))
	{
		$id = $rows['id'];
		$shortname = $rows['shortname'];
		$description= $rows['description'];
			array_push($collect_id_chem, $id);

		$query2 = "SELECT * FROM event WHERE chemid = '$id' ORDER BY id DESC LIMIT 1;";
		$result2 = mysqli_query($con,$query2) or die (mysqli_error($con));
		while ($rows2 = mysqli_fetch_array($result2))
			{
				$id2 = $rows2['chemid'];
				$dateset = $rows2['dateset'];
				$timeset = $rows2['timeset'];
				$lastvalue = $rows2['value'];
			};


		print 
		'
		<td>'.$shortname.'</td>
		<td>'.$description.'</td>
		<td>'.$lastvalue.'</td>
		<td align="left"><input class="form-control" name="form'.$id.'" style="width:100px;"></td>
		<td>'.$dateset.'</td>
		<td>'.$timeset.'</td>
		<tr>		
		';
		$lastvalue = "";
		$date = "";
		$time = "";

	};

	$collect_id_chem = implode(',', $collect_id_chem);
		
	print '
		<table class="table" style="max-width:800px;min-width:600px; padding:0px;">
		<td align="left"><a href="chem_form.php"<button class="btn btn-default" type="button">MANAGE CHEMICALS</button></a></td>
		<td align="right"><button class="btn btn-default" type="submit">SUBMIT NEW VALUES</button</td><tr>
		</table>
		<input name="chemvalues" value="'.$collect_id_chem.'" hidden>
		</form>

	';

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


</body>
</html>

