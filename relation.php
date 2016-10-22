<?php include 'core/init.php';?>

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
                <div class="row" >

                		<!-- Blog Post Content Column -->
            <div class="col-lg-8" >
            <h1>Communicate with customers</h1>
                <form style="background-color: white; padding: 10px" id="contact-form" method="post" action="contact.php" role="form">

                        <div class="messages"></div>

                        <div class="controls">

                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">User Name</label>
                                        <input id="username" type="text" name="surname" class="form-control" placeholder="To whome the mail is being sent" required="required" data-error="Username is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_phone">Mail Subject</label>
                                        <input id="subject" type="text" name="phone" class="form-control" placeholder="Subject is required">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Message</label>
                                        <textarea id="message" name="message" class="form-control" placeholder="Message for user" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input id="send_mail" type="submit" class="btn btn-success btn-send" value="Send message">
                                </div>
                            </div>
                            
                        </div>

                    </form>





                    <h1>Create Custom Oppertunity</h1>
                <form style="background-color: white; padding: 10px;" id="oppertunity-form" method="post" action="contact.php" role="form">

                        <div class="messages"></div>

                        <div class="controls">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Client username</label>
                                        <input id="clientname" type="text" name="name" class="form-control" placeholder="Please enter client's username" required="required" data-error="Username is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Oppertunity Description</label>
                                        <textarea id="oppertunity" name="message" class="form-control" placeholder="Oppertunity text goes here" rows="4"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div style="padding-buttom: 10px" class="col-md-12">
                                    <input id="create_opp" type="submit" class="btn btn-success btn-send" value="Create">
                                </div>
                            </div>
                            
                        </div>

                    </form>
                
			</div>
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4" style="background-color:  #e5e7e9;">
            <h1>Received Mails</h1>



            <div id="customer_mail" style="overflow: auto; height: 700px">

            



            
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
        function view_customer_mail()
        {
            $.ajax({
                url: 'core/process/view_customer_mail.php',
                method: 'POST',
                dataType: 'html',
                success: function(data)
                {
                    $('#customer_mail').html(data);
                    
                }
            });
        };
        view_customer_mail();
        $(document).on("click", ".delete", function () {
                    //first text box
                    
                    var id = $(this).data("id1");
                    if(confirm("Are you sure that you want to delete this mail?"))  
                       { 
                           $.ajax({
                            url: 'core/process/delete_customer_mail.php',
                            method: 'POST',
                            dataType: 'html',
                            data: {id:id},
                            success: function(data)
                            {
                                alert(data);
                              view_customer_mail();
                              
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
    }
    );


</script>





