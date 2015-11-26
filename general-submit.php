<?php
include "include.php";
include "connection.php";
?>

<?php

$option = $_POST['option'];
$speciesid = $_POST['speciesid'];

print '<br><br><br><br>';

if ($option =="flushstats"){
	print '******';
	$query="TRUNCATE therm;";
	$result=mysqli_query($con,$query)or die(mysqli_error($con));
	print '<meta HTTP-EQUIV="REFRESH" content="0; url=statistics.php">';

};

if ($option == "delete_species") {
	$image = $_POST['image'];	
	unlink('species/'.$image);
	$query="DELETE FROM species WHERE id='$speciesid';";
	$result=mysqli_query($con,$query) or die (mysqli_error($con));
	print '<meta HTTP-EQUIV="REFRESH" content="0; url=species.php">';
};


if ($option == "scheduler" ) {
	$sunrise_start = $_POST['sunrise_start'];
	$sunrise_end = $_POST['sunrise_end'];
	$morning_start = $_POST['morning_start'];
	$morning_end = $_POST['morning_end'];
	$daytime_start = $_POST['daytime_start'];
	$daytime_end = $_POST['daytime_end'];
	$sunset_start = $_POST['sunset_start'];
	$sunset_end = $_POST['sunset_end'];
	$night_start = $_POST['night_start'];
	$night_end = $_POST['night_end'];
	$nolight_start = $_POST['nolight_start'];
	$nolight_end = $_POST['nolight_end'];

	$query = "UPDATE sched SET `sunrise_start`='$sunrise_start',`sunrise_end`='$sunrise_end',`morning_start`='$morning_start',`morning_end`='$morning_end',`daytime_start`='$daytime_start',`daytime_end`='$daytime_end',`sunset_start`='$sunset_start',`sunset_end`='$sunset_end',`night_start`='$night_start',`night_end`='$night_end',`nolight_start`='$nolight_start',`nolight_end`='$nolight_end' WHERE `id`='0'";
	$result = mysqli_query($con,$query) or die (mysqli_error($con));
	print '<meta HTTP-EQUIV="REFRESH" content="2; url=scheduler.php">';
};


if ($option == "species_edit") {

	$editspecies  = $_POST['id'];
	$article = $_POST['article'];
	$articletitle = $_POST['article-title'];
	$articleimage = $_POST['article-image'];
	$target = "species/";
	$target = $target . basename( $_FILES['uploaded']['name']) ;
	$filename = $_FILES['uploaded']['name'];

	print "<br>";
	print "<br>";
	if ($filename == ""){ 

	$query = "UPDATE species SET article = '$article', title = '$articletitle' WHERE id='$editspecies';";
	$result = mysqli_query($con,$query) or die (mysqli_error($con));

	} else {
	 $ok=1;
	 if (move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
	  	{ echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded"; 

	$query = "UPDATE species SET article = '$article', title = '$articletitle', image = '$filename' WHERE id='$editspecies';";
	$result = mysqli_query($con,$query) or die (mysqli_error($con));

	} 
	  	else { echo "Sorry, there was a problem uploading your file."; }
	}
	
	print '<meta HTTP-EQUIV="REFRESH" content="0; url=species.php">';

	
};


if ($option == "chem") {
	
	$collect_id_chem = $_POST['chemvalues'];
	$collect_id_chem = explode(',', $collect_id_chem);
	
foreach ($collect_id_chem as $key => $value) 
	{
		$id = $value;
		$formaction = 'form' . $value;
		$chemvalue = $_POST[$formaction];

		$query="SELECT * FROM chem WHERE id='$id';";
		$result = mysqli_query($con,$query) or die (mysqli_error($con));
		while ($rows=mysqli_fetch_array($result))
			{
				$shortname = $rows['shortname'];
		
			};

		if ($chemvalue == "") {;}
		else {
		$query="INSERT INTO event SET dateset=CURRENT_DATE,timeset=CURRENT_TIME, event='$shortname',value='$chemvalue',chemid='$id'";
		$result = mysqli_query($con,$query) or die (mysqli_error($con));
			};

	};
	print '<meta HTTP-EQUIV="REFRESH" content="0; url=chem.php">';
	};


if ($option == "chemedit") {

	$query="SELECT * FROM chem;";
	$result = mysqli_query($con,$query) or die (mysqli_error($con));
	$collect = array();
	while ($rows = mysqli_fetch_array($result)){
		$id = $rows['id'];
		array_push($collect, $id)	;
		};

	foreach ($collect as $key => $value) {
		$chem_id = $_POST['id'.$value.''];
		$chem_shortname = $_POST['shortname'.$value.''];
		$chem_description = $_POST['description'.$value.''];
		$query = "UPDATE chem set shortname='$chem_shortname',description='$chem_description' WHERE id='$chem_id' ;";
		$result = mysqli_query($con,$query)or die(mysqli_error($con));
	}
print '<meta HTTP-EQUIV="REFRESH" content="0; url=chem_form.php">';

};



if ($option == "filterv2") {

	$collect_id = $_POST['filtervalues'];
	$collect_id = explode(',', $collect_id);

foreach ($collect_id as $key => $value) {
	$id = $value;
	$formaction = 'form' . $value; 			#This retrieves the unique form name/s from the posting form
	$action = $_POST[$formaction];			#This retrieves the unique form name/s from the posting form

	$query="SELECT * FROM filter WHERE id='$id';";
	$result = mysqli_query($con,$query) or die (mysqli_error($con));
	while ($rows=mysqli_fetch_array($result))
		{
			$shortname = $rows['shortname'];
	
		};

	if ($action == "None") {;}
	else {
	$query="INSERT INTO event SET dateset=CURRENT_DATE,timeset=CURRENT_TIME, event='$shortname',value='$action',filterid='$id'";
	$result = mysqli_query($con,$query) or die (mysqli_error($con));
		};

};

print '<meta HTTP-EQUIV="REFRESH" content="0; url=filter.php">';
};


if ($option == "filteredit") {

	$query="SELECT * FROM filter;";
	$result = mysqli_query($con,$query) or die (mysqli_error($con));
	$collect = array();
	while ($rows = mysqli_fetch_array($result)){
		$id = $rows['id'];
		array_push($collect, $id)	;
		};

	foreach ($collect as $key => $value) {
		$filter_id = $_POST['id'.$value.''];
		$filter_shortname = $_POST['shortname'.$value.''];
		$filter_description = $_POST['description'.$value.''];
		$query = "UPDATE filter set shortname='$filter_shortname',description='$filter_description' WHERE id='$filter_id' ;";
		$result = mysqli_query($con,$query)or die(mysqli_error($con));
	}
print '<meta HTTP-EQUIV="REFRESH" content="0; url=filter_form.php">';

};


if ($option == "filteradd") {


	$shortname = $_POST['shortname'];
	// $shortname = str_replace(' ', '', $shortname);
	$description = $_POST['description'];

	$query="INSERT INTO filter SET shortname='$shortname',description='$description';";
	$result=mysqli_query($con,$query) or die (mysqli_error($con));

	$query="SELECT * FROM filter WHERE shortname='$shortname' AND description='$description' LIMIT 1;";
	$result=mysqli_query($con,$query) or die (mysqli_error($con));
	while ($rows = mysqli_fetch_array($result))
		{	
			$orig_filer_id=$rows['id'];
		};

	$query="INSERT INTO event SET event='$shortname', value='Added', dateset=CURRENT_DATE, timeset=CURRENT_TIME, filterid='$orig_filer_id';";
	$result=mysqli_query($con,$query) or die (mysqli_error($con));
	
	print '<meta HTTP-EQUIV="REFRESH" content="0; url=filter_form.php">';

};

if ($option == "filterdelete") {
	$id = $_POST['id'];
	// print '<br>ID:'.$id .'<br>';
	$query="DELETE FROM filter WHERE id='$id';";
	$result=mysqli_query($con,$query) or die (mysqli_error($con));
	$query="DELETE FROM event WHERE filterid='$id';";
	$result=mysqli_query($con,$query) or die (mysqli_error($con));
	print '<meta HTTP-EQUIV="REFRESH" content="0; url=filter_form.php">';
};


if ($option == "chemadd") {


	$shortname = $_POST['shortname'];
	// $shortname = str_replace(' ', '', $shortname);
	$description = $_POST['description'];

	$query="INSERT INTO chem SET shortname='$shortname',description='$description';";
	$result=mysqli_query($con,$query) or die (mysqli_error($con));

	$query="SELECT * FROM chem WHERE shortname='$shortname' AND description='$description' LIMIT 1;";
	$result=mysqli_query($con,$query) or die (mysqli_error($con));
	while ($rows = mysqli_fetch_array($result))
		{	
			$orig_chem_id=$rows['id'];
		};

	$query="INSERT INTO event SET event='$shortname', value='Added', dateset=CURRENT_DATE, timeset=CURRENT_TIME, chemid='$orig_chem_id';";
	$result=mysqli_query($con,$query) or die (mysqli_error($con));
	
	print '<meta HTTP-EQUIV="REFRESH" content="0; url=chem_form.php">';

};

if ($option == "chemdelete") {
	$id = $_POST['id'];
	// print '<br>ID:'.$id .'<br>';
	$query="DELETE FROM chem WHERE id='$id';";
	$result=mysqli_query($con,$query) or die (mysqli_error($con));
	$query="DELETE FROM event WHERE chemid='$id';";
	$result=mysqli_query($con,$query) or die (mysqli_error($con));
	print '<meta HTTP-EQUIV="REFRESH" content="0; url=chem_form.php">';
};





if ($_GET['urloption'] == "waterchange") {
			$query="UPDATE event SET event='waterchange', dateset=CURRENT_DATE(), timeset=CURRENT_TIME() WHERE event='waterchange';";
			$result=mysqli_query($con,$query) or die (mysqli_error($con));
			print '<meta HTTP-EQUIV="REFRESH" content="0; url=waterchange.php">';
			
		};


if ($option == "addspecies") {
	print '<br><br><br>ADD SPECIES';
	$article = $_POST['article'];
	$articletitle = $_POST['article-title'];
	$articleimage = $_POST['article-image'];

	$target = "species/";
	$target = $target . basename( $_FILES['uploaded']['name']) ;
	$filename = $_FILES['uploaded']['name'];
	print "<br>";
	print $target;
 	$ok=1;
  	
  	if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
  	{ echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded"; } 
  	else { echo "Sorry, there was a problem uploading your file."; }


	$file = 'test.txt';
	file_put_contents($file, $article);

	$query = "INSERT INTO species SET article = '$article', title = '$articletitle', image = '$filename'";
	$result = mysqli_query($con,$query) or die (mysqli_error($con));

print '<meta HTTP-EQUIV="REFRESH" content="0; url=species.php">';

};




if ($option == "relayphase") {

	$query = "SELECT * FROM codes WHERE code ='maintenance'";
	$result = mysqli_query($con,$query) or die(mysqli_error($con));
	while ($rows = mysqli_fetch_array($result))
	{
		$maintenance = $rows[2];
	};
	if ($maintenance == "on") 
		{
			$count = array(1,2,3,4,5,6,7,8);
			foreach ($count as $key => $value) 
			{
				$key = $key +1;
				$relay = "relay" . $key;
				$$relay = $_POST["$relay"];
				if ($$relay == "on") 
					{
						$query = "UPDATE relay SET state='on', checkbox='checked' WHERE relay='$key'";
						$result = mysqli_query($con,$query) or die(mysqli_error($con));
					}
				else
					{
						$query = "UPDATE relay SET state='off', checkbox='' WHERE relay='$key'";
						$result = mysqli_query($con,$query) or die(mysqli_error($con));
					}
			
			}
		// DEBUG
			// print $relay1 . $relay2 . $relay3. $relay4 . $relay5. $relay6 . $relay7. $relay8;
		shell_exec("cd /var/www/pycode && sudo python /var/www/pycode/relayphase_check.py");
		};		
	print '<meta HTTP-EQUIV="REFRESH" content="0; url=power.php">';
};





?>
