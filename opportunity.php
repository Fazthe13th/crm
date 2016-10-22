<?php include 'core/init.php';
	error_reporting(0);
    $err='This is some problem with database. Come again later !!!';
    mysql_connect('sql106.byethost7.com','b7_18787294','faz131314725') or die($err);
    mysql_select_db('b7_18787294_crm') or die($err);
    $location_data = "select * from user_locations";
    $location_result = mysql_query($location_data);



?>

<?php include 'includes/header.php';
if ($row["type"]=='customer') {
        header("Location: customer_panel.php");
      }
?>

<title>CRM - Admin Panel</title>
<style type="text/css">
            table {
            width: 100%;
        }

        thead, tbody, tr, td, th { display: block; }

        tr:after {
            content: ' ';
            display: block;
            visibility: hidden;
            clear: both;
        }

        thead th {
            height: 30px;

            /*text-align: left;*/
        }

        tbody {
            height: 250px;
            overflow-y: auto;
        }

        thead {
            /* fallback */
        }


        tbody td, thead th {
            width: 19.2%;
            float: left;
        }


</style>
</head>
<body>

<div class="wrapper">
    <?php include 'includes/sidenav.php'?>

    <div class="main-panel">
        
        <?php include 'includes/nav.php'?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                


                	<div class="col-md-12" >
                    <h2>Orders</h2>
                  <p>Orders placed by customers</p>
                                           <div id="order_list">      
                                          
                                            
                                            
                                            
                                          
                                          </div>
                  </div>
                            


                                <div class="col-md-12" >
                                            <h2>Opportunities</h2>
                                          <p>Opportunity list for future</p>
                                                 <div id="opp_list">
                                          
                                            
                                            
                                            
                                          
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(
    function()
    {
        function view_order()
        {
            $.ajax({
                url: 'core/process/view_order.php',
                method: 'POST',
                dataType: 'html',
                success: function(data)
                {
                    $('#order_list').html(data);
                    
                }
            });
        };
        view_order();

        function view_oppertunity()
        {
            $.ajax({
                url: 'core/process/view_oppertunity.php',
                method: 'POST',
                dataType: 'html',
                success: function(data)
                {
                    $('#opp_list').html(data);
                    
                }
            });
        };
        view_oppertunity();
        $(document).on("click", ".close_order", function () {
                    //first text box
                    
                    var id = $(this).data("id2");
                    if(confirm("Are you sure want to close the order?"))  
                       { 
                           $.ajax({
                            url: 'core/process/delete_order.php',
                            method: 'POST',
                            dataType: 'html',
                            data: {id:id},
                            success: function(data)
                            {
                                alert(data);
                              view_order();
                              
                            }
                          });
                      };  
                           
        });
        $(document).on("click", ".dismiss_opp", function () {
                    //first text box
                    
                    var id = $(this).data("id4");
                    if(confirm("Are you sure want to close the oppertunity?"))  
                       { 
                           $.ajax({
                            url: 'core/process/delete_oppertunity.php',
                            method: 'POST',
                            dataType: 'html',
                            data: {id:id},
                            success: function(data)
                            {
                                alert(data);
                              view_oppertunity();
                              
                            }
                          });
                      };  
                           
        });
        $(document).on("click", ".dismiss_wish", function () {
                    //first text box
                    
                    var id = $(this).data("id5");
                    if(confirm("Are you sure want to close the oppertunity?"))  
                       { 
                           $.ajax({
                            url: 'core/process/inactive_wishlist.php',
                            method: 'POST',
                            dataType: 'html',
                            data: {id:id},
                            success: function(data)
                            {
                                alert(data);
                              view_oppertunity();
                              
                            }
                          });
                      };  
                           
        });

       /* $('#send_mail').click(function(event)
                {
                    event.preventDefault();
                    var username = $('#username').val();
                    var message = $('#message').val();
                    var subject = $('#subject').val();
                    $.ajax(
                        {
                            url: 'core/process/send_customer_mail.php',
                            method: 'POST',
                            dataType: 'html',
                            data: {username:username, message:message, subject:subject},
                            success: function(data)
                            {
                                alert(data);
                                $("#contact-form")[0].reset();
                            }
                        });
                });
        $('#create_opp').click(function(event)
                {
                    event.preventDefault();
                    var username = $('#clientname').val();
                    var oppertunity = $('#oppertunity').val();
                    
                    $.ajax(
                        {
                            url: 'core/process/create_oppertunity.php',
                            method: 'POST',
                            dataType: 'html',
                            data: {username:username, oppertunity:oppertunity},
                            success: function(data)
                            {
                                alert(data);
                                $("#oppertunity-form")[0].reset();
                            }
                        });
                });*/
    }
    );


</script>