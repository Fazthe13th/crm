
<?php 
	error_reporting(0);
    include 'database.php';
	$pro_id = $_POST['id'];
	$user_id =$_POST['userid'];
	$sql = "Insert into wishlist (product_id,userid,date) values('".$pro_id."','".$user_id."','".date('Y/m/d')."')";
	if(mysql_query($sql))
	{
		echo "Added to wish list";
	}
	mysql_close();
?>
