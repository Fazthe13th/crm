
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
                            <th>Input Number For Order/Cart</th>
                            <th></th>
                            <th></th>
                            <th></th>
                                
                            </tr>
                        </thead>';
    if(mysql_num_rows($result)>0)
    {
        while($row = mysql_fetch_array($result))
        {
            $check_wishlist = "SELECT * from wishlist WHERE product_id = '".$row["id"]."'";
            $wishlist_result = mysql_query($check_wishlist);
            $check_wishlist_row = mysql_num_rows($wishlist_result);

            $check_orderlist = "SELECT * from orderlist WHERE product_id = '".$row["id"]."'";
            $orderlist_result = mysql_query($check_orderlist);
            $check_orderlist_row = mysql_num_rows($orderlist_result);

            $check_cartlist = "SELECT * from cart WHERE product_id = '".$row["id"]."'";
            $cartlist_result = mysql_query($check_cartlist);
            $check_cartlist_row = mysql_num_rows($cartlist_result);
            $output .= '<tbody >
    				
    				<tr>
                        
    					<td>'.$row["id"].'</td>
    					<td>'.$row["product_name"].'</td>
    					<td>'.$row["product_type"].'</td>
    					<td>'.$row["distributor"].'</td>
    					<td>'.$row["weight"].'</td>
                        <td>'.$row["quantity"].'</td>
    					<td><input data-id2="'.$row["id"].'" class="form-control quantity_num" size="14" value="0" type="text"></td>';

                     if($check_wishlist_row>0)
                     {
                      $output .= '<td><button id="" data-id3="'.$row["id"].'" class="btn mini blue-stripe wishlist_delete" href="">Remove from wishlist</button></td>';
                     } 
                     else
                     {
                      $output .=  '<td><button id="" data-id3="'.$row["id"].'" class="btn mini blue-stripe wishlist_add" href="">Add to wishlist</button></td>';
                     }

                     if($check_orderlist_row>0)
                     {
                      $output .= '<td><button data-id4="'.$row["id"].'" class="btn mini blue-stripe order_revoke" href="">Revoke Order</button></td>';
                     } 
                     else
                     {
                      $output .=  '<td><button data-id4="'.$row["id"].'" class="btn mini blue-stripe order" href="">Order</button></td>';
                     }

                     if($check_cartlist_row>0)
                     {
                      $output .= '<td><button data-id5="'.$row["id"].'" class="btn mini blue-stripe cart_edit">Edit cart</button></td>';
                     } 
                     else
                     {
                      $output .=  '<td><button data-id5="'.$row["id"].'" class="btn mini blue-stripe cart">Add to cart</button></td>';
                     }                              
                        

                    					
                    	

                        
                    $output .= '</tr>
					
                
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
//core/process/wishlist_add.php?pro_id='.$row["id"].'&userid='.$_POST['userid'].'
?>