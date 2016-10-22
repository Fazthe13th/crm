<?php 
	error_reporting(0);
    include 'database.php';
	$pro_id = $_POST['id'];
	
	$sql = "DELETE from wishlist where product_id = '".$pro_id."'";
	if(mysql_query($sql))
	{
		echo "Removed from wishlist";
	}
	mysql_close();
?>