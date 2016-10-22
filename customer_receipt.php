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
<div class="container">
    <div class="row">
    <div id="receipt_show">



        


            </div>
        </div>

    </div>

</body>
<script src="js/jquery-1.10.2.js"></script>

    <!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function()
        {
            function fetch_receipt()
            {
                var id = <?php echo $userid?>;
                $.ajax({
                    url: 'core/process/fetch_receipt.php',
                    method: 'POST',
                    dataType: 'html',
                    data: {id:id},
                    success: function(data)
                    {

                        $('#receipt_show').html(data);
                    }
                });
            }
            fetch_receipt();
            $(document).on('click', '.remove', function(){  
                       var id=$(this).data("id1");
                       
                       var userid=  <?php echo $userid?>;
                       if(confirm("Are you sure you want to remove this from your cart?"))  
                       {  
                           $.ajax({
                                url: 'core/process/cart_remove.php',
                                method: 'POST',
                                dataType: 'html',
                                data: {id:id, userid:userid},
                                success: function(data)
                                {
                                    
                                    fetch_receipt();
                                }
                            });
                           
                       }
                       
                  });
        });
</script>



