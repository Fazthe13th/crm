<?php
include 'database.php';
$output ='';
$oppertunity_sql = "select * from oppertunity where createdate > DATE_SUB(NOW(), INTERVAL 30 DAY)";
$wish_sql = "select * from wishlist where date > DATE_SUB(NOW(), INTERVAL 30 DAY) and inactive = '0'";
$oppertunity_result = mysql_query($oppertunity_sql);
$wish_result = mysql_query($wish_sql);

$output .= '
<table class="table table-striped" style="background: white">
										    <thead>
										      <tr>
										        <th>Client involved</th>
										        <th>Oppertynity description</th>
										        <th>Expire date</th>
										        <th></th>
										      </tr>
										    </thead>

<tbody>';
		if (mysql_num_rows($oppertunity_result)>0 || mysql_num_rows($wish_result)>0) {
			
			if(mysql_num_rows($oppertunity_result)>0)
			{
				while ($opp_row = mysql_fetch_array($oppertunity_result)) {
					$date = strtotime($opp_row['createdate']);
					$day = date('Y-m-d', $date);
					$expire_date = date('Y-m-d', strtotime($day. ' + 30 days'));
					$output .=	      '<tr>
										        <td class="filterable-cell"><a href="customer_profile.php?user_id='.$opp_row['user_id'].'">'.$opp_row['username'].'</a></td>
										        <td class="filterable-cell">'.$opp_row['opp_text'].'</td>
										        <td class="filterable-cell">'.$expire_date.'</td>
										        <td class="filterable-cell"><button data-id4 ="'.$opp_row['id'].'" class="btn bt-primary dismiss_opp">Close Oppertunity</button></td>
										      </tr>
										      ';
				}
				
			}
			if(mysql_num_rows($wish_result)>0)
			{
				while ($wish_row = mysql_fetch_array($wish_result)) {
					$date = strtotime($wish_row['date']);
					$day = date('Y-m-d', $date);
					$expire_date = date('Y-m-d', strtotime($day. ' + 30 days'));

					$username_sql = "select * from users where userid = '".$wish_row['userid']."'";
					$user_result = mysql_query($username_sql);
					$user_info = mysql_fetch_array($user_result);

					$product_sql = "select * from inventory where id = '".$wish_row['product_id']."'";
					$product_result = mysql_query($product_sql);
					$product_info = mysql_fetch_array($product_result);


					$output .=	      '<tr>
										        <td class="filterable-cell"><a href="customer_profile.php?user_id='.$wish_row['userid'].'">'.$user_info['username'].'</a></td>
										        <td class="filterable-cell">'.$product_info['product_name'].' was added to wish list of '.$user_info['username'].'. So sending him a notification mail or offer might help to sell the product</td>
										        <td class="filterable-cell">'.$expire_date.'</td>
										        <td class="filterable-cell"><button data-id5 ="'.$wish_row['id'].'" class="btn bt-primary dismiss_wish">Close Oppertunity</button></td>
										      </tr>
										      ';
				}
				
			}

			
		}
		else
		{
			$output .=	      '<tr>
										       <td colspan="4"> <div class="alert alert-info">
						  <strong>Info!</strong> Your oppertunity list is empty.
						</div></td>
										      </tr>
										      ';
		}

									


									$output .=	    '</tbody>

										    </table>';
echo $output;
mysql_close();

?>