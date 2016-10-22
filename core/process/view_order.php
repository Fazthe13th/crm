<?php
include 'database.php';
$output ='';
$sql = "select * from orderlist";
$result = mysql_query($sql);

$output .= '
<table class="table table-striped" style="background: white">
										    <thead>
										      <tr>
										        <th>Item Name</th>
										        <th>Distributor</th>
										        <th>Ordered By</th>
										        <th>Quintity</th>
										        <th></th>
										      </tr>
										    </thead>


<tbody>';

if(mysql_num_rows($result)>0)
{

				while ($row = mysql_fetch_array($result)) {
					$userid = $row['user_id'];
					$product_id = $row['product_id'];

					$username_sql = "select * from users where userid = '".$userid."'";
					$user_result = mysql_query($username_sql);
					$user_info = mysql_fetch_array($user_result);

					$product_sql = "select * from inventory where id = '".$product_id."'";
					$product_result = mysql_query($product_sql);
					$product_info = mysql_fetch_array($product_result);
					$output .= '<tr>
										        <td class="filterable-cell">'.$product_info['product_name'].'</td>
										        <td class="filterable-cell">'.$product_info['distributor'].'</td>
										        <td class="filterable-cell"><a href="customer_profile.php?user_id='.$userid.'">'.$user_info['username'].'</a></td>
										        <td class="filterable-cell">'.$row['quantity'].'</td>
										        <td class="filterable-cell"><button data-id2 ="'.$row['id'].'" class="btn bt-primary close_order">Close Order</button></td>
										      </tr>
										      ';
				}
								
									}

									else
									{
										$output .= '<tr>
										        <td colspan="5"><div class="alert alert-info">
						  <strong>Info!</strong> Your inbox is empty.
						</div></td>
										      </tr>
										      ';
									}
									$output .='</tbody>

										    </table>';
echo $output;
mysql_close();

?>