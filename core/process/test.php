<!--<!DOCTYPE html>
<html>
<body>

<p>Click the button to get your coordinates.</p>



<p id="demo"></p>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDiQ9QWkqRjggY4Bq5SD4xvW4zNPYIHimo"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(sendLocation);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function sendLocation(position) {
    
    var lat = position.coords.latitude;
    var long = position.coords.longitude;
    alert (lat);
    $.ajax(
    		{
    			
    		}
    	);

}

function codeLatLng(lat, lng) {

    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      console.log(results)
        if (results[1]) {
         //formatted address
         alert(results[0].formatted_address)
        //find country name
             for (var i=0; i<results[0].address_components.length; i++) {
            for (var b=0;b<results[0].address_components[i].types.length;b++) {

            //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                    //this is the object you are looking for
                    city= results[0].address_components[i];
                    break;
                }
            }
        }
        //city data
        alert(city.short_name + " " + city.long_name)


        } else {
          alert("No results found");
        }
      } else {
        alert("Geocoder failed due to: " + status);
      }
    });
  }
</script>
<button onclick="getLocation()">Try It</button>
</body>
</html>


-->

<!DOCTYPE html> 
<html> 
<head> 
<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/> 
<title>Reverse Geocoding</title> 

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDiQ9QWkqRjggY4Bq5SD4xvW4zNPYIHimo"></script> <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript"> 
  var geocoder;

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
} 
//Get the latitude and the longitude;
function successFunction(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    
    codeLatLng(lat, lng)
}

function errorFunction(){
    alert("Geocoder failed");
}

  function initialize() {
    geocoder = new google.maps.Geocoder();



  }

  function codeLatLng(lat, lng) {
    var lati = lat;
    var long = lng;
    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      console.log(results)
        if (results[1]) {
         //formatted address
         //alert(results[0].formatted_address)
        //find country name
             for (var i=0; i<results[0].address_components.length; i++) {
            for (var b=0;b<results[0].address_components[i].types.length;b++) {

            //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                    //this is the object you are looking for
                    city= results[0].address_components[i];
                    break;
                }
            }
        }
        //city data
        var city_name = city.short_name;
        $.ajax(
        {
            url: 'test_php.php',
            method: 'POST',
            dataType: 'html',
            data: {lati:lati, long:long, city_name:city_name},
            success: function(data)
            {
                alert(data);
            }
        });

        


        } else {
          alert("No results found");
        }
      } else {
        alert("Geocoder failed due to: " + status);
      }
    });
  }
</script> 
</head> 
<body onload="initialize()"> 

</body> 
</html> 




<!--

<!DOCTYPE html>
<html>
<head>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDiQ9QWkqRjggY4Bq5SD4xvW4zNPYIHimo">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
function initialize() {
	
	var coods = new google.maps.LatLng(<?php
	 echo '23.8659224, 90.4070339'
?>);
	var mapProp = {

			    center:new google.maps.LatLng(<?php
	 echo '23.8659224, 90.4070339'
?>),
			    zoom:15,
			    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
  var marker = new google.maps.Marker({map:map, position: coods});
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>

<body>
<div id="googleMap" style="width:500px;height:380px;"></div>

</body>
</html>
-->