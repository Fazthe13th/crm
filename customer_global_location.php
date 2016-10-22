<?php include 'core/init.php';
	error_reporting(0);
    
    $location_data = "select * from user_locations";
    $location_result = mysql_query($location_data);



?>

<?php include 'includes/header.php';
if ($row["type"]=='customer') {
        header("Location: customer_panel.php");
      }
?>

<title>CRM - Admin Panel</title>

</head>
<body>

<div class="wrapper">
    <?php include 'includes/sidenav.php'?>

    <div class="main-panel">
        
        <?php include 'includes/nav.php'?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                <h1 style="padding: 10px">Global View Of Your Customer Locations</h1>
                <div id="googleMap" style="width:1000px;height:500px;"></div>

                </div>
                </div>
            </div>
            
            <footer class="footer">
                <?php include 'includes/copyright.php'?>
        </footer>
        </div>


        

    </div>




<?php include 'includes/footer.php'?>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDiQ9QWkqRjggY4Bq5SD4xvW4zNPYIHimo">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
function initialize() {
	var mapDiv = document.getElementById("googleMap");
	var mapOption = {
		center: new google.maps.LatLng(37.09024, -119.4179324),
		zoom: 5,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(mapDiv, mapOption);
	var location = [];
	<?php 
		while ($location_user = mysql_fetch_array($location_result)) {
			?>
				location.push({name: "<?php echo $location_user['city']?>", latlng:  new google.maps.LatLng(<?php echo $location_user['lat']?>, <?php echo $location_user['lng']?>)});
			<?php
		}
	?>
	
	var bounds = new google.maps.LatLngBounds();
	for(var i = 0; i<location.length; i++)
	{
		var marker = new google.maps.Marker({position: location[i].latlng, map:map, title: location[i].name});
		bounds.extend(location[i].latlng);

	}
	map.fitBounds(bounds);
}
google.maps.event.addDomListener(window, 'load', initialize);
google.maps.event.addListener(map, 'idle', function() {
});
</script>