<!DOCTYPE html>

<html>
<head>
<meta http-equiv="refresh" content="60">


</head>



<?php
include "../connection.php";
include "includes.php";

$query="SELECT * FROM therm ORDER BY id DESC LIMIT 1";
$result = mysqli_query($con,$query) or die (mysqli_error($con));
while ($rows = mysqli_fetch_array($result)){

$currentwatertemp = $rows[1] . " c";
$timestamp = $rows[4];
};

?>

<body>

  <div align="center">
  <h1>Water Temperature</h1>
    <div class="bigfont"><img src="https://cdn1.iconfinder.com/data/icons/weather-19/32/water-512.png" width="120">&nbsp<?php print $currentwatertemp; ?></div>
    <?php print $timestamp; ?>
  </div>


</body>


<?php
include "relay_status.php";
include "footer.php";
?>


</html>

