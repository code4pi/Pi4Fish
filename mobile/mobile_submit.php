<?php
include "../connection.php";
include "includes.php";


$option = $_POST['option'];

if ($option == "mobilerelay")
	{

	$relay1=$_POST['relay1'];
	$relay2=$_POST['relay2'];
	$relay3=$_POST['relay3'];
	$relay4=$_POST['relay4'];

	$relay5=$_POST['relay5'];
	$relay6=$_POST['relay6'];
	$relay7=$_POST['relay7'];
	$relay8=$_POST['relay8'];

	$number=array('relay1','relay2','relay3','relay4','relay5','relay6','relay7','relay8');
	foreach ($number as $key => $value) {
	if ($$value=="") {$$value="off";};
	$key=$key+1;
	// print $key;
	// print '<br>';
	// print $$value;
	$setrelay=$$value;
	$query="UPDATE relay SET state='$setrelay' WHERE relay='$key'";
	$query2="UPDATE relay SET checkbox='checked' WHERE state='on'";
	$query3="UPDATE relay SET checkbox='' WHERE state='off'";
	$result=mysqli_query($con,$query) or die (mysqli_error($con));
	$result=mysqli_query($con,$query2) or die (mysqli_error($con));
	$result=mysqli_query($con,$query3) or die (mysqli_error($con));
		};
		print '<div align="center"><br><br><h3>Setting Relays...</h3></div>';
		shell_exec("cd /var/www/pycode && sudo python /var/www/pycode/relayphase_check.py");
	print '<meta HTTP-EQUIV="REFRESH" content="2; url=/mobile/relay.php">';

};

if ($option == "manualcontrol")	{
	
	$query="UPDATE codes SET state='on' WHERE code='maintenance'";
	$result=mysqli_query($con,$query) or die (mysqli_error($con));
	shell_exec("cd /var/www/pycode && sudo python /var/www/pycode/relayphase_check.py");
	print '<meta HTTP-EQUIV="REFRESH" content="0; url=/mobile/relay.php">';

};


if ($option == "autocontrol")	{
	
	$query="UPDATE codes SET state='off' WHERE code='maintenance'";
	$result=mysqli_query($con,$query) or die (mysqli_error($con));
	shell_exec("cd /var/www/pycode && sudo python /var/www/pycode/schedule_check.py");
	print '<meta HTTP-EQUIV="REFRESH" content="0; url=/mobile/relay.php">';

};





?>