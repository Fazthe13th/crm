<?php include 'includes/header.php'?>
<title>CRM - Customers Info</title>
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
            height: 350px;
            overflow-y: auto;
            overflow-x: auto;
        }

        thead {
            /* fallback */
        }


        tbody td, thead th {
            width: 24%;
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
                        <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-5">

                <!-- Blog Search Well -->
                

                <!-- Blog Categories Well -->
                <div class="well">
                    <div class="card">
                            <div class="header">
                                <h4 class="title">Highlighted Customers</h4>
                                <p class="category">Most Profitable For Last 3 Days (Right Side Numbers Are In Dollar)</p>
                            </div>
                            <div class="content">
                                <canvas id="lastweek_best"></canvas>
                                <div class="footer">
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                </div>
                
                <div class="well">
                    <div class="card">
                            <div class="header">
                                <h4 class="title">All time Best</h4>
                                <p class="category"> Most Profitable(Right Side Numbers Are In Dollar)</p>
                            </div>
                            <div class="content">
                                <canvas id="alltime_best"></canvas>
                                <div class="footer">
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                </div>
                

                <!-- Side Widget Well -->
                

            </div>

            <div class="col-md-7">
                 <div class="well">

                    <h4>Customer Search</h4>
                    <div class="input-group col-md-4">
                        <input id="search_text_customer" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>
            

                <div class="well">

                <!-- First Blog Post -->
                <h2>
                    <a>List Of Customers</a>
                </h2>
          <div style="background: white"  id="customer_list">                       
            


                

                

            
            </div>  
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
            

<script type="text/javascript">
$(document).ready(
    
       

        
        /*$(document).on("click", ".close_order", function () {
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

        $('#send_mail').click(function(event)
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
                });
    }*/
    );


</script>