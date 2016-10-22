<?php 
	include 'database.php';
	$username = $_POST['username'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	//echo $userid.' '.$subject.' '.$message;
	$timezone = "Asia/Dhaka";
 	date_default_timezone_set($timezone);
 	$check_username = "select userid from users where username = '".$username."'";
 	$check_result = mysql_query($check_username);
 	if(mysql_num_rows($check_result)>0)
 	{
 		$row = mysql_fetch_array($check_result);
 		$sql = "insert into admin_mail (user_id,head,body,maildate) values('".$row['userid']."','".$subject."','".$message."','".date('Y-m-d h:i:s')."')";
		if(mysql_query($sql))
		{
			echo "Your mail has been sent";
		}
		else
		{
			echo "There was a problem. Mail was not sent.";
		}
 	}
 	else
 	{
 		echo "There is no user by this username";
 	}
	mysql_close();
?>