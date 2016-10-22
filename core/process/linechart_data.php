<?php
	header('Content-Type: application/json');
	include 'database.php';
	$timezone = "Asia/Dhaka";
 	date_default_timezone_set($timezone);
	$current_month = date('F');
	$current_year = date("Y");
	$query = "SELECT day, profit FROM daily_profit where month = '".$current_month."' and year='".$current_year."' order by day";

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
	echo json_encode($data);

	mysql_close();

?>