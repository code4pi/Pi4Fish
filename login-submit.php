<?php
include "connection.php";
$passcodechallenge = $_POST['code'];

session_start();
$_SESSION['passcode'] = $passcodechallenge;

	$query="SELECT * FROM admin WHERE setting='passcode';";
	$result=mysqli_query($con,$query)or die(mysqli_error($con));
	while ($rows=mysqli_fetch_array($result))
	{

		$passcode=$rows['value'];

	};
if ($_SESSION['passcode'] == $passcode) {print '<meta HTTP-EQUIV="REFRESH" content="0; url=index.php">';}else{print '<meta HTTP-EQUIV="REFRESH" content="0; url=login.php">';};

?>