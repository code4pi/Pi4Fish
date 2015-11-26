
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

?>
<style>
 td {border: 0px !important;}
</style>

<div align="center">
	<table class="<?php print $tablebackground; ?>" style="width:<?php print $tablewidth;?>px; text-align:left !important;">
		<div class="<?php print $tablebackground_nolines_header;?>" style="width:<?php print $tablewidth;?>px;"><div class="customfont" align="center">Theme Settings</div></div>
			<td><div class="customfontsml">Wallpaper</div></td><tr>
			<td><img class="img-thumbnail" src="images/<?php echo $wallpaper; ?>" width = "100"></td><tr>
			<form enctype="multipart/form-data" action="admin-submit.php" method="POST">
				<input name="option" value="wallpaper" hidden>
				<td><input style="width:324px;" class="btn btn-default" name="uploaded" type="file">(2mb Max larger files will be ignored)</td><tr>
				<td><input class="btn btn-default"  type="submit" value="Upload File"></td><tr>
			</form> 
				
				<td>&nbsp</td><tr>

			<form action="admin-submit.php" method="post">
				<input name="option" value="tablebackground_theme" hidden>
				<td><div class="customfontsml">Table Background</div>
					<select class="form-control" name="tablebackground_value">
					<option selected><?php print ucfirst($value);?></option>
					<option value="Dark">Set To Dark</option>
					<option value="Clear">Set To Clear</optoin>
					</select></li></ul>
				</td><tr>
				<td><button class="btn btn-default" type="submit">Save Setting</button></Td><tr>
			</form>
	</table>
</div>

