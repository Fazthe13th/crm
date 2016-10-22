<?php 
	error_reporting(0);
    include 'database.php';
	$pro_id = $_POST['id'];
	$user_id =$_POST['userid'];
	$quantity = $_POST['quantity'];
	$sql = "Insert into orderlist (product_id,user_id,quantity,dateoforder) values('".$pro_id."','".$user_id."','".$quantity."','".date('Y/m/d')."')";
	if(mysql_query($sql))
	{
		echo "Order has been placed";
	}
	mysql_close();
?>
