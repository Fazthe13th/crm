<?php
include 'database.php';
$id = $_POST['id'];


//echo $id.' '.$coloum_name.' '.$value;
$update_sql = "UPDATE wishlist SET inactive = '1' where id = '".$id."'";
if(mysql_query($update_sql))
{
	echo "Oppertunity Closed";
}
else
{
	echo "Error occured";
}
mysql_close();
?>