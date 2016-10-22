<?php
include 'database.php';
$id = $_POST['id'];
if($id == null)
{
	return false;
}
else
{
$coloum_name = $_POST['coloum_name'];
$value = $_POST['value'];
//echo $id.' '.$coloum_name.' '.$value;
$update_sql = "UPDATE tasks SET ".$coloum_name." = '".$value."' where id = '".$id."'";
if(mysql_query($update_sql))
{
	echo "Task Updated";
}
else
{
	echo "Error occured";
}
}
mysql_close();
?>