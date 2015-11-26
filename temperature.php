
<?php
	include "include.php";
?>



  

<?php




$count = array(1,2,3,4,5,6,7,8,9,10,11,12);
$collect = array("08","10","12","14","16","18","20","22","00","02","04","06");

foreach ($count as $key => $value) {
$timeslot = $collect[$key];

$query="SELECT * FROM `therm` WHERE `timeset` BETWEEN '$timeslot:00:00' AND '$timeslot:15:00' AND dateset='$yesterday' LIMIT 1;";
  $result = mysqli_query($con,$query) or die (mysqli_error($con));
  while($rows = mysqli_fetch_array($result)) {
    
    if ($thermtype=="1"){
    $therm_yesterday = "therm_yesterday" . $value;
    $$therm_yesterday = $rows['therm'] ;
    $therm_yesterdayii = "therm_yesterdayii" . $value;
    $$therm_yesterdayii = $rows['thermii'];
	}
	else {
		$therm_yesterday = "therm_yesterday" . $value;
    	$$therm_yesterday = $rows['therm'] * 9 / 5 + 32;
    	$therm_yesterdayii = "therm_yesterdayii" . $value;
    	$$therm_yesterdayii = $rows['thermii'] * 9 / 5 + 32;

		};
    
  }


};

?>


<div class="row">
<div class="col-md-2"></div>
<div class="col-md-4">

<div align="center" >
	<div style="width:<?php print $tablewidth; ?>px;">
		

		<table class="<?php print $tablebackground; ?>">
		<div class="<?php print $tablebackground_nolines_header;?>"><div class="customfont" align="center">Yesterday</div></div>
		
		<th style="border:0px;">Time</th><th  style="border:0px;">Water</th><th style="border:0px;">Air</th><tr>
		<td>00:00</td><td><?php print $therm_yesterday9; ?></td>
		<td><?php print $therm_yesterdayii9; ?></td><tr>

		<td>02:00</td><td><?php print $therm_yesterday10; ?></td>
		<td><?php print $therm_yesterdayii10; ?></td><tr>

		<td>04:00</td><td><?php print $therm_yesterday11; ?></td>
		<td><?php print $therm_yesterdayii11; ?></td><tr>

		<td>06:00</td><td><?php print $therm_yesterday12; ?></td>
		<td><?php print $therm_yesterdayii12; ?></td><tr>

		<td>08:00</td><td><?php print $therm_yesterday1; ?></td>
		<td><?php print $therm_yesterdayii1; ?></td><tr>

		<td>10:00</td><td><?php print $therm_yesterday2; ?></td>
		<td><?php print $therm_yesterdayii2; ?></td><tr>

		<td>12:00</td><td><?php print $therm_yesterday3; ?></td>
		<td><?php print $therm_yesterdayii3; ?></td><tr>

		<td>14:00</td><td><?php print $therm_yesterday4; ?></td>
		<td><?php print $therm_yesterdayii4; ?></td><tr>

		<td>16:00</td><td><?php print $therm_yesterday5; ?></td>
		<td><?php print $therm_yesterdayii5; ?></td><tr>

		<td>18:00</td><td><?php print $therm_yesterday6; ?></td>
		<td><?php print $therm_yesterdayii6; ?></td><tr>

		<td>20:00</td><td><?php print $therm_yesterday7; ?></td>
		<td><?php print $therm_yesterdayii7; ?></td><tr>

		<td>22:00</td><td><?php print $therm_yesterday8; ?></td>
		<td><?php print $therm_yesterdayii8; ?></td><tr>
		
	</table>
				</div>
</div>

</div>

<!-- ----------------------------------------------------------- -->


<div class="col-md-3">

<?php

$count = array(1,2,3,4,5,6,7,8,9,10,11,12);
$collect = array("08","10","12","14","16","18","20","22","00","02","04","06");

foreach ($count as $key => $value) {
$timeslot = $collect[$key];

$query="SELECT * FROM `therm` WHERE `timeset` BETWEEN '$timeslot:00:00' AND '$timeslot:15:00' AND dateset=current_date() LIMIT 1;";
  $result = mysqli_query($con,$query) or die (mysqli_error($con));
  while($rows = mysqli_fetch_array($result)) {
    
      if ($thermtype=="1"){
    $therm = "therm" . $value;
    $$therm = $rows['therm'];
    $thermii = "thermii" . $value;
    $$thermii = $rows['thermii'];
    }
    else {
    $therm = "therm" . $value;
    $$therm = $rows['therm'] * 9 / 5 + 32;
    $thermii = "thermii" . $value;
    $$thermii = $rows['thermii'] * 9 / 5 + 32;

    };
  }


};

?>

<div align="center" >
	
	<div style="width:<?php print $tablewidth; ?>px;">
	<table class="<?php print $tablebackground; ?>">
	<div class="<?php print $tablebackground_nolines_header;?>"><div class="customfont" align="center">Today</div></div>
	<th style="border:0px;" style="border:0px;">Time</th><th style="border:0px;" style="border:0px;">Water</th><th style="border:0px;" style="border:0px;">Air</th><tr>
	
	<td>00:00</td><td><?php print $therm9; ?></td>
	<td><?php print $thermii9; ?></td><tr>

	<td>02:00</td><td><?php print $therm10; ?></td>
	<td><?php print $thermii10; ?></td><tr>

	<td>04:00</td><td><?php print $therm11; ?></td>
	<td><?php print $thermii11; ?></td><tr>

	<td>06:00</td><td><?php print $therm12; ?></td>
	<td><?php print $thermii12; ?></td><tr>

	<td>08:00</td><td><?php print $therm1; ?></td>
	<td><?php print $thermii1; ?></td><tr>

	<td>10:00</td><td><?php print $therm2; ?></td>
	<td><?php print $thermii2; ?></td><tr>

	<td>12:00</td><td><?php print $therm3; ?></td>
	<td><?php print $thermii3; ?></td><tr>

	<td>14:00</td><td><?php print $therm4; ?></td>
	<td><?php print $thermii4; ?></td><tr>

	<td>16:00</td><td><?php print $therm5; ?></td>
	<td><?php print $thermii5; ?></td><tr>

	<td>18:00</td><td><?php print $therm6; ?></td>
	<td><?php print $thermii6; ?></td><tr>

	<td>20:00</td><td><?php print $therm7; ?></td>
	<td><?php print $thermii7; ?></td><tr>

	<td>22:00</td><td><?php print $therm8; ?></td>
	<td><?php print $thermii8; ?></td><tr>
</table>
</div>
</div>

</div>


<div class="col-md-2"></div>



</div>
