<?php
	include 'database.php';
    $search = $_POST['txt'];
	$sql = "select * from users where userid LIKE '%".$search."%' or username LIKE '%".$search."%'";
	$result = mysql_query($sql);

	$output = '';
	$output .= '<table class="table table-striped">

                    <thead>

                        <tr>

                            <th>User name</th>

                            <th>First Name</th>

                            <th>Last Name</th>

                            

                            <th></th>

                        </tr>

                    </thead>

                    <tbody>';

                    if(mysql_num_rows($result)>0)
                    {
                    	while($row = mysql_fetch_array($result))
                    	{

                    		$output .=   '<tr>

                            <td class="filterable-cell">'.$row['username'].'</td>

                            <td class="filterable-cell">'.$row['firstname'].'</td>

                            <td class="filterable-cell">'.$row['lastname'].'</td>

                            

                            <td class="filterable-cell"><a href="customer_profile.php?user_id='.$row['userid'].'" class="btn btn-info" role="button">View Profile</a></td>

                        </tr>';
                    	}
                    	
                    }
                    else
                    {
                    	$output .=   '<tr>

                            <td colspan="4"><div class="alert alert-info">
						  <strong>Info!</strong> Your have currently no customers by this name or ID.
						</div></td>

                            

                        </tr>';
                    }

                     
                        


                        

               $output .=     '</tbody>

                </table>';

	echo $output;
	mysql_close();
?>