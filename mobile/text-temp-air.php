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

$currentwatertemp = $rows[2] . " c";
$timestamp = $rows[4];
};

?>

<body>

  <div align="center">
  <h1>Current Air Temperature</h1>
    <div class="bigfont"><img src="http://cdn2.content.compendiumblog.com/uploads/user/808b3bda-785a-4a64-b3ce-2fd8e21cfa82/460c1014-3215-4ca8-9736-e1199dffda19/Image/6e89ad462ed6e1b61e22a042ab34b1c9/cloud_icon_blue.png" width="120"> <?php print $currentwatertemp; ?></div>
    <?php print $timestamp; ?>
  </div>


<?php
include "relay_status.php";
include "footer.php";
?>

</body>


</html>