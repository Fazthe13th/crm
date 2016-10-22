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
                <div class="row">
                        <div class="col-sm-12">
    <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="pe-7s-users" ></i></span>
          <?php 
              $user_number = "select count(userid) as c from users where type = 'customer'";
              $user_number_re = mysql_query($user_number);
              $user_count = mysql_fetch_array($user_number_re);
          ?>
            <div class="info-box-content">
              <span class="info-box-text">Total Customers</span>
              <span class="info-box-number"><?php echo $user_count['c']?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <?php 
              $order_number = "select count(id) as c from orderlist";
              $order_number_re = mysql_query($order_number);
              $order_count = mysql_fetch_array($order_number_re);
          ?>
      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="pe-7s-look"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pending Order</span>
              <span class="info-box-number"><?php echo $order_count['c']?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-orange-active"><i class="pe-7s-gleam"></i></span>
            <?php 
            $timezone = "Asia/Dhaka";
             date_default_timezone_set($timezone);
             $current_day = date('d');
              $today_gross = "select profit from daily_profit where day = '".$current_day."'";
              $today_gross_re = mysql_query($today_gross);
              $today_gross_profit = mysql_fetch_array($today_gross_re);
          ?>
            <div class="info-box-content">
              <span class="info-box-text">Todays Gross</span>
              <span class="info-box-number">$<?php echo $today_gross_profit['profit']?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <?php 
            
             $today = date('Y-m-d');
            $task_show = "select count(id) as c from tasks where taskdate = '".$today."'";
            $task_result = mysql_query($task_show);
              
              $task_info = mysql_fetch_array($task_result);
          ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-fuchsia-active"><i class="pe-7s-graph3"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Todays Tasks</span>
              <span class="info-box-number"><?php echo $task_info['c']?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
    </div><!--/row-->    
  </div><!--/col-12-->
                  </div>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Net Profit</h4>
                                <p class="category">Per Months</p>
                            </div>
                            <div class="content">
                                <canvas id="mycanvas"></canvas>
                                <div class="footer">
                                    
                                    
                                    <div class="stats">
                                        <a href="" id="update_barchart">
                                            <i class="fa fa-history" ></i> Update Chart
                                        </a>
                                        <select id="year" class="form-control">
                                         <?php 
                                          $get_years = "select distinct year from monthly_profit order by year desc";
                                          $get_year_result= mysql_query($get_years);
                                          if(mysql_num_rows($get_year_result)>0)
                                          {
                                            while ($years = mysql_fetch_array($get_year_result)) {
                                              ?>
                                              <option value="<?php echo $years['year']?>"><?php echo $years['year']?></option>
                                          

                                         <?php   }
                                          }
                                         ?>
                                          
                                          
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="col-md-6" >
                        
                            
                          	<div id="feed" class="embed-responsive embed-responsive-4by3" style="overflow: auto;">
                               
                              
                              
                               
                            </div>
                            
                            
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Per Day Profit</h4>
                                <p class="category">Current Month <?php echo date('F')?></p>
                            </div>
                            <div class="content">
                                <canvas id="linechart"></canvas>
                                <div class="footer">
                                    
                                    
                                    
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
            
