<?php
	print 'Your Here';
	session_start();
	$collect_id_chem = $_SESSION['collect_id_chem'];
	print_r($collect_id_chem);
?>