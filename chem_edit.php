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
	$query="SELECT * FROM chem;";
	$result = mysqli_query($con,$query) or die (mysqli_error($con));
	print '<table class="'.$tablebackground.'" style="max-width:800px;min-width:600px; padding:0px;">';
	
	print '<form action="general-submit.php" method="post"><input name="option" value="chemedit" hidden>';
	
	print '<div class="'.$tablebackground_nolines_header.'" style="max-width:800px; min-width:600px; padding:0px;">
	   		<div class="customfont" align="center">Edit Chemical</div></div>
	   		<th>Shortname</th><th>Description</th><tr>
	   	';
	while ($rows = mysqli_fetch_array($result)){
		$id = $rows['id'];
		print '
			<input  name="id'.$id.'" value="'.$rows['id'].'" hidden>
			<td><input class="form-control" name="shortname'.$id.'" value="'.$rows['shortname'].'" ></td>
			<td><input class="form-control" name="description'.$id.'" value="'.$rows['description'].'" size="80"></td><tr>
		';


	};
	
?>

	</table>
	<table class="table" style="max-width:800px;min-width:600px; padding:0px;">
	<td align="left"><button class="btn btn-default" type="submit">SAVE CHANGES</button></td>
	<td align="right"><a href="chem_form.php"><button class="btn btn-default" type="button">CANCEL</button></a></td>
	</table>
	</form>
		</div>
	</body>
</html>