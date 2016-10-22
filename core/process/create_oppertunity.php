<?php 
	include 'database.php';
	$username = $_POST['username'];
	
	$oppertunity = $_POST['oppertunity'];
	//echo $userid.' '.$subject.' '.$message;
	$timezone = "Asia/Dhaka";
 	date_default_timezone_set($timezone);
 	$check_username = "select userid from users where username = '".$username."'";
 	$check_result = mysql_query($check_username);
 	if(mysql_num_rows($check_result)>0)
 	{
 		$row = mysql_fetch_array($check_result);
 		$sql = "insert into oppertunity (username,user_id,opp_text,createdate) values('".$username."','".$row['userid']."','".$oppertunity."','".date('Y-m-d h:i:s')."')";
		if(mysql_query($sql))
		{
			echo "Oppertunity Created";
		}
		else
		{
			echo "There was a problem. Oppertunity was not created.";
		}
 	}
 	else
 	{
 		echo "There is no user by this username";
 	}
	mysql_close();
?>