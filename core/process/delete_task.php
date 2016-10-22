<?php
include 'database.php';
$id = $_POST['id'];
$sql = "DELETE from tasks where id = '".$id."'";
if(mysql_query($sql))
	{
		echo "Task Removed";
	}
mysql_close();
?>