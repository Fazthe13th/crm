<?php 
	error_reporting(0);
    include 'database.php';
	$pro_id = $_POST['id'];
	$userid = $_POST['userid'];
	$sql = "DELETE from cart where product_id = '".$pro_id."' and user_id = '".$userid."'";
	if(mysql_query($sql))
	{
		echo "Removed";
	}
	mysql_close();
?>