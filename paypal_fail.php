<?php 
include 'core/init.php';
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
    <style type="text/css">
        
        .jumbotron {
background-image: url("img/payment_fail.jpg");
background-size: cover;}
    </style>
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
        <a class="navbar-brand" href="http://disputebills.com" style="margin-top: -17px;"><img src="img/sales-logo.png">
        </a>
        <span class="navbar-brand">Little Build</span>
      </div>
      <div id="navbar1" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="customer_panel.php">Customer Panel</a></li>
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
            <div class="jumbotron">
              <h1 class="display-3" style="color: white">Payment Failed !!</h1>
              <p class="lead" style="color: white">Paypal failed conducted to transaction. Please try again.</p>
              <hr class="m-y-2" style="color: white">
              <p style="color: white">If you want to continue shopping than click below</p>
              <p class="lead">
                <a class="btn btn-primary btn-lg" href="customer_panel.php" role="button">Customer Panel</a>
              </p>
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

    </body>


</html>