<?php
	include "include.php";

?>
<head>
	<title>Fishpi</title>
	<script>
function confirm_waterchange()
{
var r=confirm("You are about to log a water change entry. If yes click OK.")
if (r==true)
  {
  location.href = "general-submit.php?urloption=waterchange";
  }
else
  {
  location.href = "waterchange.php";
  }
}

</script>

</head>

<body>

<?php
// Tempereaure record count
$query="SELECT dateset FROM event WHERE event='waterchange' ORDER BY dateset DESC LIMIT 1;";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while($rows = mysqli_fetch_array($result)) {
$waterchange = $rows['dateset'];
};


$query="SELECT DATEDIFF((SELECT dateset from event where event='waterchange' limit 1), NOW()) AS waterchangediff;";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while($rows = mysqli_fetch_array($result)) {
$waterchangediff = $rows['waterchangediff'];

};



?>


<div align="center" style="font-size: 1.0em;">
  <div style="width:<?php print $tablewidth; ?>px;">
    <table class="<?php print $tablebackground; ?>" style="width:<?php print $tablewidth; ?>px;" border="0">
    <div class="<?php print $tablebackground_nolines_header;?>"><div class="customfont" align="center">Water Change</div></div>
       
  <tbody>
	<th>Event</th><th>Action</th><th>Last Logged</th><th>Age</th><tr>
	<td>Water Change</td><td><a href="event-water-change-submit.php"><button class="btn btn-danger" type="submit" onclick="confirm_waterchange()" value="Display a confirm box"></a>Log</button></td>
	</td>
	<td><?php echo $waterchange ?></td><td><?php echo $waterchangediff; ?> &nbsp days</td><tr>
	</table>
	
  
 


