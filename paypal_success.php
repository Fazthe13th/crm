<?php
	include 'core/init.php';
    if ($row["type"]=='admin') {
        header("Location: dashboard.php");
      }
	$err='This is some problem with database. Come again later !!!';
    mysql_connect('sql106.byethost7.com','b7_18787294','faz131314725') or die($err);
    mysql_select_db('b7_18787294_crm') or die($err);
    $timezone = "Asia/Dhaka";
    date_default_timezone_set($timezone);
	$userid = $_SESSION['userid'];
	$cart_query = "SELECT * from cart where user_id = '".$userid."'";
	$cart_result = mysql_query($cart_query);
	$discount_query = "SELECT * FROM discount WHERE userid = '".$userid."' and init_date > DATE_SUB(NOW(), INTERVAL untill DAY)";
    $discount_result = mysql_query($discount_query);
    $discount_info = mysql_fetch_array($discount_result);
	while ($row = mysql_fetch_array($cart_result)) {
		//Getting product info and prodit
		$product_id = $row['product_id'];
        $product_sql= "SELECT * from inventory where id = '".$product_id."'";
        $produc_result = mysql_query($product_sql);
        $product_info = mysql_fetch_array($produc_result);
        $quantity = $row['quantity'];
        $sale_price = $quantity * $product_info['sale_price'];
        $price = $quantity * $product_info['price'];
        //Getting the profit
        if(mysql_num_rows($discount_result)>0)
                        {
                            $discount_given = $discount_info['discount'];
                            $discount = $sale_price * ($discount_given/100);
                            $final_sale_price = $sale_price - $discount;
                            $profit = $final_sale_price - $price;
                        }
                        else
                        {
                            $profit = $sale_price - $price;
                        }


        //inserting into sell summary table
        $summary_query = "Insert into sell_summary (product_id,user_id,product_name,quantity,price,sale_price,profit,dateoft) values('".$product_id."','".$userid."','".$product_info['product_name']."','".$quantity."','".$product_info['price']."','".$product_info['sale_price']."','".$profit."','".date("Y/m/d h:i:s")."')";
        mysql_query($summary_query) or die("Summery query failed");
        //monthly profit table
        $current_day = date('d');
        $current_month = date('F');
        $current_year = date('Y');
        $check_monthly_query = "select * from monthly_profit where month = '".$current_month."' and year = '".$current_year."'";
        $monthly_profit_result = mysql_query($check_monthly_query);
        if(mysql_num_rows($monthly_profit_result)>0)
        {
        	$monthly_profit_row = mysql_fetch_array($monthly_profit_result);
        	$total_monthly_profit = $monthly_profit_row['profit'] + $profit;
        	$monthly_update_query = "UPDATE monthly_profit SET profit = '".$total_monthly_profit."' where month = '".$current_month."' and year = '".$current_year."'";
        	mysql_query($monthly_update_query) or die("monthly table not updated");
        }
        else
        {
        	$new_monthly_profit_query = "Insert into monthly_profit (profit,month,year) values('".$profit."','".$current_month."','".$current_year."')";
        	mysql_query($new_monthly_profit_query) or die("new monthly profit insert failed");
        }
        //daily profit table
        $check_daily_query = "select * from daily_profit where day = '".$current_day."' and month = '".$current_month."' and year = '".$current_year."'";
        $daily_profit_result = mysql_query($check_daily_query);
        if(mysql_num_rows($daily_profit_result)>0)
        {
        	$daily_profit_row = mysql_fetch_array($daily_profit_result);
        	$total_daily_profit = $daily_profit_row['profit'] + $profit;
        	$daily_update_query = "UPDATE daily_profit SET profit = '".$total_daily_profit."' where day = '".$current_day."' and month = '".$current_month."' and year = '".$current_year."'";
        	mysql_query($daily_update_query) or die("daily table not updated");
        }
        else
        {
        	$new_daily_profit_query = "Insert into daily_profit (profit,day,month,year) values('".$profit."','".$current_day."','".$current_month."','".$current_year."')";
        	mysql_query($new_daily_profit_query) or die("new daily profit insert failed");
        }
        //per user profit
        $per_user_query = "select * from per_user_profit where user_id = '".$userid."'";
        $per_user_result = mysql_query($per_user_query);
        if(mysql_num_rows($per_user_result)>0)
        {
        	$per_user_row = mysql_fetch_array($per_user_result);
        	$total_per_user_profit = $per_user_row['total_profit'] + $profit;
        	$per_user_update_query = "UPDATE per_user_profit SET total_profit = '".$total_per_user_profit."' where user_id = '".$userid."'";
        	mysql_query($per_user_update_query) or die("Per user table not updated");
        }
        else
        {
        	$new_per_user_profit_query = "Insert into per_user_profit (user_id,total_profit,profitdate) values('".$userid."','".$profit."','".date("Y/m/d h:i:s")."')";
        	mysql_query($new_per_user_profit_query) or die("new per user profit insert failed");
        }
        

	}
	$clear_cart = "DELETE from cart where user_id = '".$userid."'";
	mysql_query($clear_cart);
	mysql_close();

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
background-image: url("img/payment.jpg");
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
            <div class="jumbotron">
              <h1 class="display-3" style="color: white">Payment Successful</h1>
              <p class="lead" style="color: white">Paypal has succesfully conducted to transaction. Thank you for shopping.</p>
              <hr class="m-y-2" style="color: white">
              <p style="color: white">If you want to continue shopping than click below</p>
              <p class="lead">
                <a class="btn btn-primary btn-lg" href="customer_panel.php" role="button">Sales Panel</a>
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
