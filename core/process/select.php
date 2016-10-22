
<?php
    
    include 'database.php';
    $output = '';
    $sql = "SELECT id,product_name,product_type,distributor,weight,quantity from inventory order by id";
    $result = mysql_query($sql);
    $output .= '<table class="table table-striped table-hover table-users">
    			<thead>
    				<tr>
    					
    					<th class="hidden-phone">Item Id</th>
    					<th>Item Name</th>
                        <th class="hidden-phone">Product Type</th>
    					<th>Item Distributor</th>
    					
    					<th class="hidden-phone">Weight</th>
    					<th class="hidden-phone">Avaible</th>
    					
    					
    				</tr>
    			</thead>';
    if(mysql_num_rows($result)>0)
    {
        while($row = mysql_fetch_array($result))
        {
            $output .= '<tbody>
    				
    				<tr>
                        
    					<td>'.$row["id"].'</td>
    					<td>'.$row["product_name"].'</td>
    					<td>'.$row["product_type"].'</td>
    					<td>'.$row["distributor"].'</td>
    					<td>'.$row["weight"].'</td>
                        <td>'.$row["quantity"].'</td>
    					   					
                    	

                        
                    </tr>
					
                
	               </tbody>';
        }
        
    }
    else
    {
        $output .='<tr>
                        <td colspan="6">No Data Found</td>
                    </tr>';
    }
    
    $output .= '</table>';
    echo $output;
    mysql_close();

?>
