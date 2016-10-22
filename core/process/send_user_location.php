

<?php
	error_reporting(0);
    include 'database.php';
	$lat = $_POST['lati'];
	$lng = $_POST['long'];
	$city = $_POST['city_name'];
	$userid = $_POST['userid'];
	$sql = "select * from user_locations where user_id = '".$userid."'";
	$result = mysql_query($sql);

	if(mysql_num_rows($result)>0)
	{
		$update_location_query = "UPDATE user_locations SET lat = '".$lat."', lng = '".$lng."', city = '".$city."' where user_id = '".$userid."'";
		if(mysql_query($update_location_query))
		{
			echo "Location Updated";
		}
		
	}
	else
	{
		$insert_location = "Insert into user_locations (user_id,lat,lng,city) values('".$userid."','".$lat."','".$lng."','".$city."')";
		if(mysql_query($insert_location))
		{
			echo "Your location has been saved for admistration purpose. will not be disclosed to public";
		}
	}
	mysql_close();

?>