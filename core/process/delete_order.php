<?php
include 'database.php';
$id = $_POST['id'];
$sql = "DELETE from orderlist where id = '".$id."'";
if(mysql_query($sql))
{
	echo "Order Closed";
}
else
{
	echo "Error happed. Try again.";
}
mysql_close();
?>