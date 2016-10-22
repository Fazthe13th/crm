<?php
include 'database.php';
$id = $_POST['id'];
$sql = "DELETE from customer_mail where id = '".$id."'";
if(mysql_query($sql))
{
	echo "Mail deleted";
}

?>