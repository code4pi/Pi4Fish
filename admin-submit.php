<?php
include "include.php";

$option = $_POST['option'];
$get = $_GET['optionget'];


print '<br><br><br><br>';

if ($get == "logout") {
	// print "logout";
	session_destroy();
	print '<meta HTTP-EQUIV="REFRESH" content="0; url=login.php">';

};

if ($option == "setthreshold") {
	$thresholdvalue=$_POST['thresholdvalue'];
	$query="UPDATE codes SET state='$thresholdvalue' WHERE code='threshold';";
	$result = mysqli_query($con,$query)or die (mysqli_error($con));
	print '<meta HTTP-EQUIV="REFRESH" content="0; url=admin_general.php">';

};

if ($option == "setpasscode") {
	$passcode=$_POST['passcode'];
	$query="UPDATE admin SET value='$passcode' WHERE setting='passcode';";
	$result = mysqli_query($con,$query)or die (mysqli_error($con));
	print '<meta HTTP-EQUIV="REFRESH" content="0; url=admin_general.php">';

};

if ($option == "relaypolarity"){
	$relaypolarity = $_POST['relaypolarity'];
	$query="UPDATE codes SET state='$relaypolarity' WHERE code='relaypolarity'";
	$result = mysqli_query($con,$query)or die (mysqli_error($con));
	print '<meta HTTP-EQUIV="REFRESH" content="0; url=admin_general.php">';
};


if ($option == "thermserials"){
	$therm = $_POST['therm'];
	$thermii = $_POST['thermii'];
	$query="UPDATE admin SET value='$therm' WHERE setting='therm';";
	$query2="UPDATE admin SET value='$thermii' WHERE setting='thermii';";
	$result = mysqli_query($con,$query)or die (mysqli_error($con));
	$result = mysqli_query($con,$query2)or die (mysqli_error($con));
	
	print '<meta HTTP-EQUIV="REFRESH" content="0; url=admin_general.php">';

};

if ($option == "thermclass"){
	$thermclassvalue=$_POST['thermclassvalue'];
	// print $thermclassvalue;
	$query="UPDATE codes SET state='$thermclassvalue' WHERE code='thermtype'";
	$result=mysqli_query($con,$query)or die(mysqli_error($con));
	print '<meta HTTP-EQUIV="REFRESH" content="0; url=index.php">';
};


if ($option == "tablebackground_theme") {
	$value = $_POST['tablebackground_value'];
	$query = "UPDATE event SET value='$value' WHERE event='tablebackground' ;";
	$result = mysqli_query($con,$query) or die (mysqli_error($con));
	print '<meta HTTP-EQUIV="REFRESH" content="0; url=admin_theme.php">';
};

if ( $option == "wallpaper") {
	$target = "images/";
	$target = $target . "wallpaper.jpg";
	// print $target . "<br>";
	$ok=1;
	if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
	{ echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded"; } 
	else { echo "Sorry, there was a problem uploading your file."; }
	
	print '<meta HTTP-EQUIV="REFRESH" content="0; url=admin_theme.php">';
	};

if ( $option == "relayphase")
	{
		// print "<br><br><br><br><br><br>RELAY PHASE";
		$relaya1=$_POST['relaya1'];
		$relaya2=$_POST['relaya2'];
		$relaya3=$_POST['relaya3'];
		$relaya4=$_POST['relaya4'];
		$relaya5=$_POST['relaya5'];
		$relaya6=$_POST['relaya6'];
	
		$relayb1=$_POST['relayb1'];
		$relayb2=$_POST['relayb2'];
		$relayb3=$_POST['relayb3'];
		$relayb4=$_POST['relayb4'];
		$relayb5=$_POST['relayb5'];
		$relayb6=$_POST['relayb6'];
	
		$relayc1=$_POST['relayc1'];
		$relayc2=$_POST['relayc2'];
		$relayc3=$_POST['relayc3'];
		$relayc4=$_POST['relayc4'];
		$relayc5=$_POST['relayc5'];
		$relayc6=$_POST['relayc6'];
		
		$relayd1=$_POST['relayd1'];
		$relayd2=$_POST['relayd2'];
		$relayd3=$_POST['relayd3'];
		$relayd4=$_POST['relayd4'];
		$relayd5=$_POST['relayd5'];
		$relayd6=$_POST['relayd6'];
	
		$relaye1=$_POST['relaye1'];
		$relaye2=$_POST['relaye2'];
		$relaye3=$_POST['relaye3'];
		$relaye4=$_POST['relaye4'];
		$relaye5=$_POST['relaye5'];
		$relaye6=$_POST['relaye6'];
	
		$relayf1=$_POST['relayf1'];
		$relayf2=$_POST['relayf2'];
		$relayf3=$_POST['relayf3'];
		$relayf4=$_POST['relayf4'];
		$relayf5=$_POST['relayf5'];
		$relayf6=$_POST['relayf6'];
	
		$relayg1=$_POST['relayg1'];
		$relayg2=$_POST['relayg2'];
		$relayg3=$_POST['relayg3'];
		$relayg4=$_POST['relayg4'];
		$relayg5=$_POST['relayg5'];
		$relayg6=$_POST['relayg6'];
		
		$relayh1=$_POST['relayh1'];
		$relayh2=$_POST['relayh2'];
		$relayh3=$_POST['relayh3'];
		$relayh4=$_POST['relayh4'];
		$relayh5=$_POST['relayh5'];
		$relayh6=$_POST['relayh6'];
		

$query1 = "UPDATE relayphase SET relay1='$relaya1',relay2='$relayb1',relay3='$relayc1',relay4='$relayd1',relay5='$relaye1',relay6='$relayf1',relay7='$relayg1',relay8='$relayh1' WHERE description='sunrise';";
$query2 = "UPDATE relayphase SET relay1='$relaya2',relay2='$relayb2',relay3='$relayc2',relay4='$relayd2',relay5='$relaye2',relay6='$relayf2',relay7='$relayg2',relay8='$relayh2' WHERE description='morning';";
$query3 = "UPDATE relayphase SET relay1='$relaya3',relay2='$relayb3',relay3='$relayc3',relay4='$relayd3',relay5='$relaye3',relay6='$relayf3',relay7='$relayg3',relay8='$relayh3' WHERE description='daytime';";
$query4 = "UPDATE relayphase SET relay1='$relaya4',relay2='$relayb4',relay3='$relayc4',relay4='$relayd4',relay5='$relaye4',relay6='$relayf4',relay7='$relayg4',relay8='$relayh4' WHERE description='sunset';";
$query5 = "UPDATE relayphase SET relay1='$relaya5',relay2='$relayb5',relay3='$relayc5',relay4='$relayd5',relay5='$relaye5',relay6='$relayf5',relay7='$relayg5',relay8='$relayh5' WHERE description='night';";
$query6 = "UPDATE relayphase SET relay1='$relaya6',relay2='$relayb6',relay3='$relayc6',relay4='$relayd6',relay5='$relaye6',relay6='$relayf6',relay7='$relayg6',relay8='$relayh6' WHERE description='nolight';";

$result = mysqli_query($con,$query1) or die (mysqli_error($con));
$result = mysqli_query($con,$query2) or die (mysqli_error($con));
$result = mysqli_query($con,$query3) or die (mysqli_error($con));
$result = mysqli_query($con,$query4) or die (mysqli_error($con));
$result = mysqli_query($con,$query5) or die (mysqli_error($con));
$result = mysqli_query($con,$query6) or die (mysqli_error($con));
shell_exec("sudo python /var/www/pycode/schedule_check.py");
print '<meta HTTP-EQUIV="REFRESH" content="0; url=power.php">';

	};

if ($option == "relayconfig") 
{
	
	$count = array(a,b,c,d,e,f,g,h);
	foreach ($count as $key => $value)
	{
		$key=$key+1;
		$relayset = "relay" . $value;
		$gpioset = "gpio" . $value;
		$descriptionset = "description" . $value;
		${"relay".$key} = $_POST[$relayset];
		${"gpio".$key} = $_POST[$gpioset];
		${"description".$key} = $_POST[$descriptionset];
						
	};

	$count = array(1,2,3,4,5,6,7,8);
	foreach ($count as $key => $value) 
	{
		$key = $key + 1;
		$gpio = ${"gpio".$key};
		$description = ${"description".$key};
		$query = "UPDATE relay SET gpio = '$gpio',description='$description' WHERE relay = '$key'";
		$result = mysqli_query($con,$query) or die(mysqli_error($con));


	};
	print '<meta HTTP-EQUIV="REFRESH" content="0; url=admin_gpio.php">';
	
};

 


if ($option == "maintenance")
{
	$maintenance_mode=$_POST['maintenancemode'];
	$query="UPDATE codes SET state='$maintenance_mode' WHERE code='maintenance'";
	$query2="UPDATE relay SET checkbox='checked' WHERE state='on'";
	$result=mysqli_query($con,$query)or die(mysqli_error($con));
	$result=mysqli_query($con,$query2)or die(mysqli_error($con));
	if ($maintenance_mode=="on") 
	{
		shell_exec("cd /var/www/pycode && sudo python /var/www/pycode/relayphase_check.py");
	};
	if ($maintenance_mode=="off")  
	 {
	 	shell_exec("cd /var/www/pycode && sudo python /var/www/pycode/schedule_check.py");
	 };

	 print '<meta HTTP-EQUIV="REFRESH" content="0; url=power.php">';

};

 ?>

<!-- <meta HTTP-EQUIV="REFRESH" content="0; url=index.php"> -->


