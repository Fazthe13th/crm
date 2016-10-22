<?php
include 'database.php';
$output = '';
$id = $_POST['id'];
$sql = "select * from admin_mail where user_id = '".$id."'";
$result = mysql_query($sql);
if(mysql_num_rows($result)>0)

{
				while($row = mysql_fetch_array($result))
				{
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
			                                <small><em>'.$day.'<br>'.$time.'</em></small>
			                                </h4>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			                
			            <div class="panel-body">
			                '.$row['body'].'
			            </div>
			            
			            <div class="panel-footer">
			                
			                <button data-id1="'.$row['id'].'" class="btn btn-info">Mark as read</button>
			                <button data-id2="'.$row['id'].'" class="btn btn-danger delete">Delete</button>
			                
			            </div>
			                    </div>

			                        </div>';
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