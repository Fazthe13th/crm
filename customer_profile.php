<?php include 'includes/header.php';

$user_id = $_GET['user_id'];

$user_info_query = "select * from users where userid = '".$user_id."'";
$user_info_result = mysql_query($user_info_query);
$user_info_fetched = mysql_fetch_array($user_info_result);
$date = strtotime($user_info_fetched['date']);
$day = date('d-m-Y', $date);
$location_sql = "select * from user_locations where user_id = '".$user_id."'";
$location_result = mysql_query($location_sql);
$location_latlng = mysql_fetch_array($location_result);
?>

<title>CRM - Customers Info</title>

</head>
<body>

<div class="wrapper">
    <?php include 'includes/sidenav.php'?>

    <div class="main-panel">
        
        <?php include 'includes/nav.php'?>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                    <h1>Recent location</h1>
                    	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDiQ9QWkqRjggY4Bq5SD4xvW4zNPYIHimo">
					</script>
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
					<script>
					function initialize() {
						
						var coods = new google.maps.LatLng(<?php
						 echo $location_latlng['lat'].','.$location_latlng['lng']
					?>);
						var mapProp = {

								    center:new google.maps.LatLng(<?php
						 echo $location_latlng['lat'].','.$location_latlng['lng']
					?>),
								    zoom:15,
								    mapTypeId:google.maps.MapTypeId.ROADMAP
					  };
					  
					  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
					  var marker = new google.maps.Marker({map:map, position: coods});
					}
					google.maps.event.addDomListener(window, 'load', initialize);
					</script>
					<div class="col-md-6"></div>
						<div id="googleMap" style="width:700px;height:400px;"></div>



						<h4>User Information</h4>

                    	

                    	<div class="col-md-4">
            <img alt="" style="width:600px;" title="" class="img-circle img-thumbnail isTooltip" src="img/connected customer updated.jpg" data-original-title="Usuario"> 
            
        </div>
        <div class="col-md-6" style="background: white">
            <strong>Information</strong><br>
            <div class="table-responsive">
            <table class="table table-condensed table-responsive table-user-information">
                <tbody>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                Identificacion                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                             <?php echo $user_info_fetched['userid'];  ?>
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-user  text-primary"></span>    
                                First Name                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo $user_info_fetched['firstname'];  ?>
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-cloud text-primary"></span>  
                                Lastname                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo $user_info_fetched['lastname'];  ?>
                        </td>
                    </tr>

                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-bookmark text-primary"></span> 
                                Username                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo $user_info_fetched['username'];  ?>
                        </td>
                    </tr>


                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-eye-open text-primary"></span> 
                                Role                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo $user_info_fetched['type'];  ?>
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                Email                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo $user_info_fetched['email'];  ?>
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-calendar text-primary"></span>
                                created                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo  $day ?>
                        </td>
                    </tr>
                    
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-map-marker text-primary"></span>
                                Address                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                             Uttara, Dhaka-1230
                        </td>
                    </tr>
                    
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-euro text-primary"></span>
                                Current Discount                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <div id="discount_show"> </div>
                        </td>
                    </tr>
                    
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-thumbs-up text-primary"></span>
                                Favourite Item:                                             
                            </strong>
                        </td>
                        <?php 

                                $sell_summary_sql = "select * from sell_summary where user_id = '".$user_id."'";
                                $sell_result = mysql_query($sell_summary_sql);
                                if(mysql_num_rows($sell_result)>0)
                                {
                                    $best = 0;
                                    
                                    while($list_prod = mysql_fetch_array($sell_result))
                                    {
                                        $temp_sql = "select count(product_id) as c from sell_summary where user_id= '".$user_id."' and product_id='".$list_prod['product_id']."'";
                                        $temp_result = mysql_query($temp_sql);
                                        $temp_row = mysql_fetch_array($temp_result);
                                        
                                        $temp = $temp_row['c'];
                                        if($best<$temp)
                                        {
                                            $best = $temp;
                                            $fav_id = $list_prod['product_id'];
                                        }

                                    }
                                    $sql_fav = "select * from inventory where id = '".$fav_id."'";
                                    $fav_result = mysql_query($sql_fav);
                                    $fav= mysql_fetch_array($fav_result);

                                }

                            ?>
                        <td class="text-primary">
                            <?php echo $fav['product_name']?>
                        </td>
                    </tr>                                       
                </tbody>
            </table>
            <form id="discount" class="form-horizontal" action=''>
                          <fieldset style="margin-left: 10px" class="float-right">
                            <div class="form-group">
                            <div class="row">
                              <div class="col-md-3"  for="discount"><input type="text" id="percent" name="Name" placeholder="Ex: 15 (don't give '% sign')" class="form-control name">In percent</div>
                              <div class="col-md-3"  for="discount"><input type="text" id="days" name="Name" placeholder="Ex: 7 (days)" class="form-control name">Valid for</div>
                              <div class="col-md-7">
                                <button id="discount_give" type="button" class="btn btn-primary">Give Discount</button>
                              </div>
                            </div>
                            </div>
                            </fieldset>
                           </form>

            </div>
        </div>
            
                    <?php 

                                $sell_summary_sql = "select * from sell_summary where user_id = '".$user_id."'";
                                $sell_result = mysql_query($sell_summary_sql);?>
            <div class="col-md-12" >
                    <h2>Sell Summary</h2>
                  <p>List of transaction by user</p>
                                           <div id="">      
                                      <div style="height: 250px; overflow-y: auto;">    
                                    <table class="table table-striped" style="background: white">
                                            <thead style="">
                                              <tr style="">
                                                <th style="">Product name</th>
                                                <th style="">Quantity</th>
                                                <th style="">Price</th>
                                                <th style="">Sale Price</th>
                                                <th style="">Profit</th>
                                                <th style="">Date</th>
                                                
                                              </tr>
                                            </thead>
                                            
                                        <tbody style="">
                                <?php if(mysql_num_rows($sell_result)>0)
                                {
                                    while($sell = mysql_fetch_array($sell_result))
                                    {
                                        $date_sell = strtotime($sell['dateoft']);
                                        $day_sell = date('d-m-Y', $date_sell);

                                    ?>        
                                          <tr style="">
                                                <td style="" class="filterable-cell"><?php echo $sell['product_name']?></td>
                                                <td style="" class="filterable-cell"><?php echo $sell['quantity']?></td>
                                                <td style="" class="filterable-cell"><?php echo $sell['price']?></td>
                                                <td style="" class="filterable-cell"><?php echo $sell['sale_price']?></td>
                                                <td style="" class="filterable-cell"><?php echo $sell['profit']?></td>
                                                <td style="" class="filterable-cell"><?php echo $day_sell?></td>
                                                
                                              </tr>


                                              <?php }
                                    }
                                    else
                                        {
                                            ?>
                                            <tr style="">
                                                <td colspan="6" style="" class="filterable-cell"><div class="alert alert-info">
                          <strong>Info!</strong> This user yet didn't buy anaything.
                        </div></td>
                                                
                                                
                                              </tr>
                                              <?php }?>
                                           
                                              
                                          </tbody>
                                          </div>
                                            </table>
                                          </div>
                  </div>


                    	
        			
                    </div>
                </div>
            </div>
            
            <footer class="footer">
                <?php include 'includes/copyright.php'?>
        </footer>
        </div>


        

    </div>




<?php include 'includes/footer.php'?>

<script>
function view_discount()
        {
            var id = <?php echo $user_id?>;
            $.ajax({
                url: 'core/process/view_discount.php',
                method: 'POST',
                dataType: 'html',
                data: {id:id},
                success: function(data)
                {
                    $('#discount_show').html(data);
                    
                }
            });
        };
        view_discount();
$('#discount_give').click(function(event)
                {
                    event.preventDefault();
                    var id = <?php echo $user_id?>;
                    var discount = $('#percent').val();
                    var days = $('#days').val();
                    $.ajax(
                        {
                            url: 'core/process/discount_add.php',
                            method: 'POST',
                            dataType: 'html',
                            data: {id:id, discount:discount, days:days},
                            success: function(data)
                            {
                                alert(data);
                                view_discount();
                                $("#discount")[0].reset();
                            }
                        });
                });

</script>