<?php 
	error_reporting(0);
    include 'database.php';
	$pro_id = $_POST['id'];
	
	$sql = "DELETE from orderlist where product_id = '".$pro_id."'";
	if(mysql_query($sql))
	{
		echo "Removed from order list";
	}
	mysql_close();
?>