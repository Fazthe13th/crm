<?php
	include 'database.php';
	$output = '';
	$sql = "select * from customer_mail";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		while ($row = mysql_fetch_array($result)) {
			$userinfo = "select * from users where userid = '".$row['user_id']."'";
			$userinfo_result = mysql_query($userinfo);
			$user_information = mysql_fetch_array($userinfo_result);

			$date = strtotime($row['maildate']);
			$day = date('Y-m-d', $date); 
			$time = date('h:i:s', $date); 
			$output .= '<div id="postlist">
            <div class="panel">
                <div class="panel-heading">
                    <div class="text-center">
                        <div class="row">
                            <div class="col-sm-9">
                                <h3 class="pull-left">'.$row['head'].'</h3>
                            </div>
                            <div class="col-sm-3">
                                <h4 class="pull-right">
                                <small style="font-size: 60%;">From: <a href="customer_profile.php?user_id='.$row['user_id'].'">'.$user_information['username'].'</a></small>
                                <small  style="font-size: 60%;"><em>'.$day.'<br>'.$time.'</em></small>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="panel-body">
                    '.$row['body'].'
                </div>
                
                <div class="panel-footer">
                    <button data-id1="'.$row['id'].'" class="btn btn-danger delete">X</button>
                </div>

                </div>
            </div>
	';
		}
	

	}
	else
	{
		$output .= '<div class="alert alert-info">
						  <strong>Info!</strong> Your inbox is empty.
						</div>';
	}
echo $output;
?>