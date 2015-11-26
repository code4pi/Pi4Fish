<!DOCTYPE html>
<html>
<head>
	<?php
	include "connection.php";
	include "include.php";
	?>
</head>
<body>

<div align="center">
<?php
$query = "SELECT * FROM filter;";
$result = mysqli_query($con, $query) or die(mysqli_error($con));

print '
<table class="'.$tablebackground.'" style="max-width:800px;min-width:600px; padding:0px;">
<div class="'.$tablebackground_nolines_header.'" style="max-width:800px; min-width:600px; padding:0px;"><div class="customfont" align="center">Current Filters</div></div>
<th>Shortname</th><th>Description / Placement</th><th>Erase</th><tr>
';

while ($rows = mysqli_fetch_array($result))
	{
	
		$shortname = $rows['shortname'];
		$description = $rows['description'];
		$id = $rows['id'];
		
		print '<td>'.$shortname.'</td>';
// 		print '<input name="option" value="filteredit">';
//	 	print '<input name="id" value="'.$id.'">';
//		print '<input class="form-control" name="shortname" value="'.$shortname.'">';
//		print '<input class="form-control" name="description" value="'.$description.'">';
//	 	print '<button class="btn btn-danger" type="submit">';
		print '<td>'.$description.'</td>
		<td>
			<form action="general-submit.php" method="post">
			<input name="option" value="filterdelete" hidden>
			<input name="id" value="'.$id.'" hidden>
			<button class="btn btn-danger" type="submit">DELETE</button>
			</form>
		</td>

		<tr>';
	};

print '</table>';

?>
<table class="table" style="max-width:800px;min-width:600px; padding:0px;">
	<td align="left"><a href="filter_edit.php"><button class="btn btn-default" type="button">EDIT FILTERS</button></a></td><tr>
</table>



<table class="<?php print $tablebackground;?>" style="max-width:800px;min-width:600px; padding:0px;">
	<form action="general-submit.php" method="post">
		<input name="option" value="filteradd" hidden>
		<div class="<?php print $tablebackground_nolines_header;?>" style="max-width:800px; min-width:600px; padding:0px;"><div class="customfont" align="center">Add Filter</div></div>
		<th>Shortname</th><th>Description / Placement</th><tr>
		<td><input class="form-control" name="shortname" required></td>
		<td><input class="form-control" name="description" required size="80"></td>
</table>

<table class="table" style="max-width:800px;min-width:600px; padding:0px;">
	<td align="left"><button class="btn btn-default" type="submit">ADD</button></td>
	<td align="right"><a href="filter.php"><button class="btn btn-default" type="button">FINISH</button></a></td><tr>
</table>

</form>
</div>
</body>
</html>



