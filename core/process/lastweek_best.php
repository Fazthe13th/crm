<?php 
	header('Content-Type: application/json');
	include 'database.php';
	$timezone = "Asia/Dhaka";
 	date_default_timezone_set($timezone);
	$current_month = date('F');
	$current_year = date("Y");
	$query = "SELECT user_id, total_profit FROM per_user_profit where profitdate > DATE_SUB(NOW(), INTERVAL 3 DAY) order by total_profit desc LIMIT 5 ";

	//execute query
	$result = mysql_query($query) or die("prob");;

	//loop through the returned data
	$data = array();
	while($row = mysql_fetch_assoc($result)){
		$data[] = $row;

	}

	//free memory associated with result


	//close connection


	//now print the data
	print json_encode($data);

	mysql_close();



?>