<?php
	include 'database.php';
	$date = $_POST['date'];
	$time = $_POST['time'];
	$task_name = $_POST['task_name'];
	$task_dec = $_POST['task_dec'];
	$importance = $_POST['importance'];
	$task_insert_sql = "insert into tasks (task_name,task_dec,importance,taskdate,tasktime) values('".$task_name."','".$task_dec."','".$importance."','".date('Y/m/d', strtotime($date))."','".date('G:i:s', strtotime($time))."')";
	if(mysql_query($task_insert_sql))
	{
		echo "Task added";
	}
	else
	{
		echo "An error happened";
	}
	//echo date('Y/m/d G:i:s', strtotime($date.' '.$time)).' '.$task_name.' '.$task_dec.' '.$importance;
	mysql_close();
?>
