<?php
// Connection to Server

###############################
$dbname = 	"jayfish"; #---->Create this table in your Mysql server and the respective test will run.
$tbl_stat = "status";
$server = 	"127.0.0.1";
$user = 	"jayfish";
$password = "JayFish1$";
###############################

$con=mysqli_connect($server,$user,$password,$dbname);
	if (mysqli_connect_errno())
		{
  			echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		} else {echo "";}
?> 
