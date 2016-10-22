<?php 
$user_id = 3;
include 'database.php';
$location_sql = "select * from user_locations where user_id = '".$user_id."'";
$location_result = mysql_query($location_sql);
$location_latlng = mysql_fetch_array($location_result);
echo $location_latlng['lat'].','.$location_latlng['lng'];

?>