<?php 
	error_reporting(0);
    include 'database.php';
	$pro_id = $_POST['id'];
	$user_id =$_POST['userid'];
	$quantity = $_POST['quantity'];
	$sql = "Insert into cart (product_id,user_id,quantity,dateofcart) values('".$pro_id."','".$user_id."','".$quantity."','".date("Y/m/d h:i:s")."')";
	if(mysql_query($sql))
	{
		echo "Added to cart";
	}
	mysql_close();
?>