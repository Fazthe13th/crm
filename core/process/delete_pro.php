<?php
include 'database.php';
$id = $_POST['id'];
$sql = "DELETE from inventory where id = '".$id."'";
if(mysql_query($sql))
	{
		echo "Item Removed";
	}
mysql_close();
?>