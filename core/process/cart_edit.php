<?php 
	error_reporting(0);
    include 'database.php';
	$pro_id = $_POST['id'];
	$quantity = $_POST['quantity'];
	$sql = "UPDATE cart SET quantity = '".$quantity."' where product_id = '".$pro_id."'";
	if(mysql_query($sql))
	{
		echo "Cart Updated";
	}
	mysql_close();
?>