<nav class="nav navbar-fixed-bottom">
<?php

$query="SELECT * FROM codes WHERE code='thermtype'";
$result=mysqli_query($con,$query)or die(mysqli_error($con));
while ($rows = mysqli_fetch_array($result))
{
  $thermtype=$rows['state'];
}



$query="SELECT * FROM `therm` ORDER BY ID DESC LIMIT 1;";
  $result = mysqli_query($con,$query) or die (mysqli_error($con));
  while($rows = mysqli_fetch_array($result)) {
    $therm = $rows['therm'];
    $thermii = $rows['thermii'];
  }

if ($thermtype=='1')
{
$thermclass="&deg;C";
  }
else {
  $therm=$therm * 9 / 5 + 32;
  $thermii=$thermii * 9 / 5 + 32;
  $thermclass="&deg;F";
}

?>


<!-- ------------------------------------------------------ FOOTER BAR -->
<table border="1" style="width:100%;">
  <td style="background-color: white;color: black;text-align: center;">
        Water Temp:&nbsp<?php print $therm." ".$thermclass; ?>  Air: <?php print $thermii." ".$thermclass; ?>
        &nbsp Phase: <?php print $phase;?>
  </td>
</table>

</nav>
<!-- ------------------------------------------------------ FOOTER BAR -->