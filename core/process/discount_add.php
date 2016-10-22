<?php
include 'database.php';
$timezone = "Asia/Dhaka";
date_default_timezone_set($timezone);
$id = $_POST['id'];
$discount = $_POST['discount'];
$days = $_POST['days'];
//echo $id.' '.$discount.' '.$days;
	$check = "select * from discount where userid ='".$id."' ";
	$check_result = mysql_query($check);
	if(mysql_num_rows($check_result)>0)
	{
		if($discount != '')
		{
			$update_discount = "update discount set discount = '".$discount."', init_date = '".date('Y-m-d h:i:s')."' where userid = '".$id."'";
			if(mysql_query($update_discount))
			{
				echo " Discount updated. ";
			}
		}
		if($days != '')
		{
			$update_days = "update discount set untill = '".$days."', init_date = '".date('Y-m-d h:i:s')."' where userid = '".$id."'";
			if(mysql_query($update_days))
				{
					echo " Validation day updated. ";
				};
		}
	}
	else
	{
		$sql = "Insert into discount (userid,discount,init_date,untill) values('".$id."','".$discount."','".date('Y-m-d h:i:s')."','".$days."')";
		if(mysql_query($sql))
		{
			echo "Discount Given";
		}

	}
	
	
	mysql_close();

?>