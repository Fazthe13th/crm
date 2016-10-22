<?php 
	error_reporting(0);
    include 'database.php';
	$page_id = $_POST['name'];
	
	$sql = "UPDATE fb_feed SET page_name = '".$page_id."' where id = '1'";
	mysql_query($sql);
	
		
	
	mysql_close();
?>