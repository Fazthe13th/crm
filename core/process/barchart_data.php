<?php
//setting header to json
header('Content-Type: application/json');


$timezone = "Asia/Dhaka";
date_default_timezone_set($timezone);
$current_year = date('Y');

//get connection
include 'database.php';

//query to get data from the table
$query = "SELECT month, profit FROM monthly_profit where year='$current_year'";

//execute query
$result = mysql_query($query);

//loop through the returned data
$data = array();
while($row = mysql_fetch_assoc($result)){
	$data[] = $row;
}

//free memory associated with result


//close connection


//now print the data
echo json_encode($data);

mysql_close();

?>