<?php
include 'database.php';
$id = $_POST['id'];
$sql = "DELETE from admin_mail where id = '".$id."'";
if(mysql_query($sql))
{
	echo "Mail deleted";
}

?>