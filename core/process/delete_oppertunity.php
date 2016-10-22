<?php
include 'database.php';
$id = $_POST['id'];
$sql = "DELETE from oppertunity where id = '".$id."'";
if(mysql_query($sql))
{
	echo "Oppertunity Closed";
}
else
{
	echo "Error. Try again later";
}
mysql_close();
?>