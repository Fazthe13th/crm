<?php 
	include 'database.php';
	$userid = $_POST['userid'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	//echo $userid.' '.$subject.' '.$message;
	$timezone = "Asia/Dhaka";
 	date_default_timezone_set($timezone);
	$sql = "insert into customer_mail (user_id,head,body,maildate) values('".$userid."','".$subject."','".$message."','".date('Y-m-d h:i:s')."')";
	if(mysql_query($sql))
	{
		echo "Your mail has been sent";
	}
	else
	{
		echo "There was a problem. Mail was not sent.";
	}
?>