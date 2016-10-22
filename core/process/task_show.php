<?php
	   include 'database.php';
    $output = '';
    $timezone = "Asia/Dhaka";
    date_default_timezone_set($timezone);
    $today = date('Y-m-d');
    $task_show = "select * from tasks where taskdate = '".$today."'";
    $task_result = mysql_query($task_show) or die("prob");
    $output .= '<table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   
                   <th>Task Name</th>
                    <th>Description</th>
                     <th>Time</th>
                     <th>Importance</th>
                     
                      <th>Edit</th>
                      
                       <th>Delete</th>
                   </thead>
                    <tbody>';
                    if(mysql_num_rows($task_result)>0)
                    {
                    	while ($row = mysql_fetch_array($task_result)) {
                    		$date = strtotime($row['tasktime']);
							$time = date('G:i:s', $date); 
                    		$output .='<tr>
                    		
		                    <td>'.$row['task_name'].'</td>
		                    <td>'.$row['task_dec'].'</td>
		                    <td>'.$time.'</td>
		                    <td>'.$row['importance'].'</td>
		                   
		                    <td><p  data-placement="top" data-toggle="tooltip" title="Edit"><button data-id1="'.$row['id'].'" class="btn btn-primary btn-xs edit" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
		                    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button data-id2="'.$row['id'].'" class="btn btn-danger btn-xs delete" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
		                    </tr>';
                    	}
                    	
                    }
                    else
                    {
                    	$output .= '<tr>
                        <td colspan="6">No Task For Today</td>
                    </tr>';
                    }
                    
                    
                    
                 
                    
                    
                 
                    
                   
                    
                   
                    
                  $output .=  '</tbody>
                        
                </table>';

                echo $output;
    mysql_close();
?>