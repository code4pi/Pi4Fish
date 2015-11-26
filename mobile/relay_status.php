<?php


$query="SELECT * FROM codes WHERE code='maintenance';";
$result=mysqli_query($con,$query)or die(mysqli_error($con));
while ($rows = mysqli_fetch_array($result)){
$maintenance_mode=$rows[2];
};

if ($maintenance_mode=="on") {
print '<div align="center" style="color:red;"><h4>Manual Overide Active</h4></div>';
$query="SELECT * FROM relay WHERE state='on'";
$result=mysqli_query($con,$query)or die(mysqli_error($con));
print '<div align="center" class="bigfont_med">Relays Active: ';
	while ($rows = mysqli_fetch_array($result))
		{

	  $state =$rows[3];
	  print $state . " ";
	  
		};



} else {

$query="SELECT * FROM relay WHERE status='on'";
$result=mysqli_query($con,$query)or die(mysqli_error($con));
print '<div align="center" class="bigfont_med">Relays Active: ';
	while ($rows = mysqli_fetch_array($result))
		{

	  $state =$rows[3];
	  print $state . " ";
	  
		};
};

print '</div>';




$query="SELECT * FROM sched";
$result=mysqli_query($con,$query)or die(mysqli_error($con));
print '<div align="center" class="bigfont_sml">';
while ($rows = mysqli_fetch_array($result))
{
  $phase =$rows[13];
};

print 'Phase: '.$phase.'';
print '</div>';




?>