<?php include 'core/init.php';
if($row["type"]=='admin')
	    {
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

<body>
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
        <a class="navbar-brand" href="http://disputebills.com" style="margin-top: -17px;"><img src="img/sales-logo.png">
        </a>
        <span class="navbar-brand">Little Build</span>
      </div>
      <div id="navbar1" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="customer_panel.php">Sales Panel</a></li>
          <li><a href="customer_receipt.php">Check Out</a></li>
          <li><a href="#">Contact Admin</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>
</div>
<div class="container">

        <div class="row">
        
            <!-- Blog Post Content Column -->
            <div class="col-lg-8" >
            <div style="background-color: #5cb85c; border-radius: 3px; color: white;padding: 2px"><h2 style="margin-left: 15px ">Admin mails</h2></div>
            <div style="overflow: auto; height: 500px">

            <div id="admin_mail">
                

            </div> 
                

                        
                    </div>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                 <h1>Contact Admin</h1>
                <form id="contact-form" method="post" action="contact.php" role="form">

                        <div class="messages"></div>

                        <div class="controls">

                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_phone">Subject</label>
                                        <input id="form_subject" type="tel" name="phone" class="form-control" placeholder="message subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Message *</label>
                                        <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input id="send_mail" type="submit" class="btn btn-success btn-send" value="Send message">
                                </div>
                            </div>
                            <div class="row">
                                
                            </div>
                        </div>

                    </form>

            </div>

        </div>

<script src="js/jquery-1.10.2.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function()
        {
            function fetch_admin_mail()
            {
                var id = <?php echo $_SESSION['userid']?>;
                $.ajax(
                    {
                        url: 'core/process/fetch_admin_mail.php',
                        method: 'POST',
                        dataType: 'html',
                        data: {id:id},
                        success: function(data)
                        {
                            $('#admin_mail').html(data);
                        }
                    });
            };
            fetch_admin_mail();
            $('#send_mail').click(function(event)
                {
                    event.preventDefault();
                    var userid = <?php echo $_SESSION['userid']?>;
                    var message = $('#form_message').val();
                    var subject = $('#form_subject').val();
                    $.ajax(
                        {
                            url: 'core/process/send_admin_mail.php',
                            method: 'POST',
                            dataType: 'html',
                            data: {userid:userid, message:message, subject:subject},
                            success: function(data)
                            {
                                alert(data);
                                $("#contact-form")[0].reset();
                            }
                        });
                });

            $(document).on("click", ".delete", function () {
                    //first text box
                    
                    var id = $(this).data("id2");
                    if(confirm("Are you sure that you want to delete this mail?"))  
                       { 
                           $.ajax({
                            url: 'core/process/delete_admin_mail.php',
                            method: 'POST',
                            dataType: 'html',
                            data: {id:id},
                            success: function(data)
                            {

                              fetch_admin_mail();
                              
                            }
                          });
                      };  
                           
        });

        });
    </script>

</body>

