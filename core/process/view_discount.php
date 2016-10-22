<?php
	include 'database.php';
	$userid = $_POST['id'];
	$output = '';
	$discount_query = "SELECT * FROM discount WHERE userid = '".$userid."' and init_date > DATE_SUB(NOW(), INTERVAL untill DAY)";
    $discount_result = mysql_query($discount_query);
    $discount_info = mysql_fetch_array($discount_result);
    if(mysql_num_rows($discount_result)>0)
    {
    	$output = 'Having a '.$discount_info['discount'].'% discount for '.$discount_info['untill'].' days';
    }
    else
    {
    	$output = 'User currently not having a discount';
    }
	
	echo $output;
	mysql_close();


?>