<?php include 'core/init.php';?>
<?php include 'includes/header.php';
if ($row["type"]=='admin') {
        header("Location: dashboard.php");
      }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Little Build - Customer Service</title>
    <link rel="shortcut icon" href="img/sales-logo.ico" />
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    

</head>




<body onload="initialize()">

    <!-- Navigation -->

<div class="container">
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" style="margin-top: -17px;"><img src="img/sales-logo.png">
        </a>
        <span class="navbar-brand">Little Build</span>
      </div>
      <div id="navbar1" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="customer_panel.php">Sales Panel</a></li>
          <li><a href="customer_receipt.php">Check Out</a></li>
          <li><a href="customer_contact.php">Contact Admin</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>
</div>







    
  






    <!-- Page Content -->
    <div class="container">

        <div class="row">
        <div class="col-md-12">
        	<div class="well">
        		
        		<div class="input-group col-md-6">
                        <input id="search_pro" type="text" class="form-control" placeholder="Search product">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
        	</div>

        
            <!-- Blog Entries Column -->
            <div class=" well">

                

                <!-- First Blog Post -->
                <h2>
                    <a href="#">Sales Panel</a>
                </h2>
                                   <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h3 id="myModalLabel">Delete</h3>
                        </div>
                        <div class="modal-body">
                            <p></p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                            <button data-dismiss="modal" class="btn red" id="btnYes">Confirm</button>
                        </div>
             </div>
                
                <div id="customer_inventory_data" style="overflow: auto; height: 500px">
                    

            			
                </div>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Faz13 and Diba, 2016</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    

</body>

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
    var userid = <?php echo $_SESSION['userid']?>;
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
            url: 'core/process/send_user_location.php',
            method: 'POST',
            dataType: 'html',
            data: {lati:lati, long:long, city_name:city_name, userid:userid},
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










<script src="js/jquery-1.10.2.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(event)
            {
                 function fetch_customer_product_show()
                    {
                       var userid = <?php echo $userid?>;
                        $.ajax(
                            {
                               url: 'core/process/customer_product_show.php',
                               method: 'POST',
                               
                               success: function(data)
                               {
                                $('#customer_inventory_data').html(data);
                               }
                            }
                        );
                    };
                    fetch_customer_product_show();
                    $('#search_pro').keyup(function()
                    {
                        var txt = $(this).val();
                        if(txt != '')
                        {
                            function view_customer_search()
                                {
                                    $.ajax({
                                        url: 'core/process/product_search.php',
                                        method: 'POST',
                                        dataType: 'html',
                                        data: {txt:txt},
                                        success: function(data)
                                        {
                                            $('#customer_inventory_data').html(data);
                                            
                                        }
                                    });
                                };
                                view_customer_search();
                        }
                        else
                        {
                            fetch_customer_product_show();
                        }
                    });

                    
                    $(document).on('click', '.wishlist_add', function(){  
                       var id=$(this).data("id3");
                       var userid=  <?php echo $userid?>;
                       if(confirm("Are you sure you want to add this to your wishlist?"))  
                       {  
                            $.ajax({
                                url: 'core/process/wishlist_add.php',
                                method: 'POST',
                                dataType: 'html',
                                data: {id:id, userid:userid},
                                success: function(data)
                                {
                                    
                                }
                            });
                            fetch_customer_product_show(); 
                       }

                  }); 

                    $(document).on('click', '.wishlist_delete', function(){  
                       var id=$(this).data("id3");
                       var userid=  <?php echo $userid?>;
                       if(confirm("Are you sure you want to remove this from your wishlist?"))  
                       {  
                           $.ajax({
                                url: 'core/process/wishlist_delete.php',
                                method: 'POST',
                                dataType: 'html',
                                data: {id:id},
                                success: function(data)
                                {
                                    
                                }
                            });
                           fetch_customer_product_show();
                       }
                       
                  });

                /*$(document).on('click', '.order', function(){  
                       var id=$(this).data("id4");
                       var userid=  <?php echo $userid?>;
                       var quantity = $(".quantity_num").val();
                       alert(quantity);
                       
                  }); */
                  $(document).on("click", ".order", function () {
                    //first text box
                    var quantity = $(this).closest("tr").find("input:text:eq(0)").val();
                    var id = $(this).data("id4");
                    var userid=  <?php echo $userid?>;
                    if(confirm("You are going to place a order of "+ quantity+" items of product id "+id+". Are you sure?"))  
                       {  
                           $.ajax({
                                url: 'core/process/order_add.php',
                                method: 'POST',
                                dataType: 'html',
                                data: {id:id, userid:userid, quantity:quantity},
                                success: function(data)
                                {
                                    alert(data);
                                    fetch_customer_product_show();
                                }
                            });
                           

                       }
                    //second text box
                    
                });

                  $(document).on('click', '.order_revoke', function(){  
                       var id=$(this).data("id4");
                       var userid=  <?php echo $userid?>;
                       if(confirm("Are you sure you want to revoke your order?"))  
                       {  
                           $.ajax({
                                url: 'core/process/order_revoke.php',
                                method: 'POST',
                                dataType: 'html',
                                data: {id:id},
                                success: function(data)
                                {
                                    fetch_customer_product_show();
                                }
                            });
                           
                       }
                       
                  });
                  $(document).on("click", ".cart", function () {
                    //first text box
                    var quantity = $(this).closest("tr").find("input:text:eq(0)").val();
                    var id = $(this).data("id5");
                    var userid=  <?php echo $userid?>;
                    if(confirm("Do you want to add this  "+ quantity+" quantity of item to your cart?"))  
                       {  
                           $.ajax({
                                url: 'core/process/cart_add.php',
                                method: 'POST',
                                dataType: 'html',
                                data: {id:id, userid:userid, quantity:quantity},
                                success: function(data)
                                {
                                    alert(data);
                                    fetch_customer_product_show();
                                }
                            });
                           

                       }
                    //second text box
                    
                });

                  $(document).on('click', '.cart_edit', function(){  
                       var id=$(this).data("id5");
                       var quantity = $(this).closest("tr").find("input:text:eq(0)").val();
                       var userid=  <?php echo $userid?>;
                       if(confirm("Are you sure you want to upate your cart?"))  
                       {  
                           $.ajax({
                                url: 'core/process/cart_edit.php',
                                method: 'POST',
                                dataType: 'html',
                                data: {id:id, quantity:quantity},
                                success: function(data)
                                {
                                  alert(data);
                                    fetch_customer_product_show();
                                }
                            });
                           
                       }
                       
                  });
});

    </script>
</html>

