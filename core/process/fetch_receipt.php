
<?php
    
    include 'database.php';
    $userid = $_POST['id'];
    $output = '';
    $sql = "SELECT * from users where userid = '".$userid."'";
    $result = mysql_query($sql);
    $user_info = mysql_fetch_array($result);


    $user_cart = "SELECT * from cart where user_id = '".$userid."'";
    $cart_result = mysql_query($user_cart);


    $discount_query = "SELECT * FROM discount WHERE userid = '".$userid."' and init_date > DATE_SUB(NOW(), INTERVAL untill DAY)";
    $discount_result = mysql_query($discount_query);
    $discount_info = mysql_fetch_array($discount_result);

    $output .= '<div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row" >
            
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>User ID: '.$user_info['userid'].'</strong>
                        <br>
                        User name: '.$user_info['firstname'].' '.$user_info['lastname'].'
                        <br>
                        Address: '.$user_info['address'].'
                        
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Date: '. date('l jS \of F Y').'</em>
                    </p>
                    <p>
                        <em></em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>#</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                            <th > </th>
                        </tr>
                    </thead>
                    <tbody>';
                    $whole_total = 0;
                    if(mysql_num_rows($cart_result)>0)
                    {
                        while ($row = mysql_fetch_array($cart_result)) {
                            $product_id = $row['product_id'];
                            $sql= "SELECT * from inventory where id = '".$product_id."'";
                            $produc_result = mysql_query($sql);
                            $product_info = mysql_fetch_array($produc_result);
                            $total_row = $product_info['sale_price'] * $row['quantity'];
                            $output .='
                        <tr>
                            <td class="col-md-9"><em>'.$product_info['product_name'].'</em></h4></td>
                            <td class="col-md-1" style="text-align: center"> '.$row['quantity'].' </td>
                            <td class="col-md-1 text-center">'.$product_info['sale_price'].'</td>
                            <td class="col-md-1 text-center">'.$total_row.'</td>
                            <td><button id="" data-id1="'.$row["product_id"].'" class="btn mini btn-danger remove" href="">X</button></td>
                        </tr>
                        
                       
                ';
                $whole_total = $whole_total + $total_row;

                        }
                        if(mysql_num_rows($discount_result)>0)
                        {
                            $discount_given = $discount_info['discount'];
                            $discount = $whole_total * ($discount_given/100);
                            $final_total = $whole_total - $discount;
                        }
                        else
                        {
                            $discount_given = 0;
                            $discount = 0;
                            $final_total = $whole_total - $discount;
                        }

                 $output .= '

                 <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>Discount: </strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <strong>'.$whole_total.'</strong>
                            </p>
                            <p>
                                <strong>'.$discount_given.'%</strong>
                            </p></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            <td class="text-center text-danger"><h4><strong>'.$final_total.'</strong></h4></td>
                        </tr>
                    </tbody>
                </table>

                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

                  <!-- Identify your business so that you can collect the payments. -->
                  <input type="hidden" name="business" value="crmshop@gmail.com">

                  <!-- Specify a Buy Now button. -->
                  <input type="hidden" name="cmd" value="_xclick">
                  <input type="hidden" name="upload" value="1">
                  ';

                  $output .=  '
                                          <input type="hidden" name="item_name" value="Your Payable amount">
                                          <input type="hidden" name="amount" value="'.$final_total.'">'; 

                 



                 $output .= '<input type="hidden" name="currency_code" value="USD">

                    <input type="hidden" name="return" value="http://farewellapp.byethost7.com/crm/paypal_success.php">
                    <input type="hidden" name="cancel_return" value="http://farewellapp.byethost7.com/crm/paypal_fail.php">
                  <!-- Display the payment button. -->
                  <input type="image" name="submit" border="0"
                  src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_buynow_107x26.png"
                  alt="Buy Now">
                  <img alt="" border="0" width="1" height="1"
                  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

                </form>





                

                </td>

        </div>';       

                    
            }
            else
            {
                $output .= '<tr>
                            <td colspan="4">No item in the cart yet</td>
                        </tr>
                    ';

                    $output .= '

                 <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong></strong>
                            </p>
                            <p>
                                <strong></strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <strong></strong>
                            </p>
                            <p>
                                <strong></strong>
                            </p></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            <td class="text-center text-danger"><h4><strong></strong></h4></td>
                        </tr>
                    </tbody>
                </table>
                <a href="customer_panel.php"><button type="button" class="btn btn-success btn-lg btn-block">
                    Shop Now   <span class="glyphicon glyphicon-chevron-right"></span>
                </button></a></td>

        </div>';
                
            }

        
    
    
    echo $output;
    mysql_close();
//core/process/wishlist_add.php?pro_id='.$row["id"].'&userid='.$_POST['userid'].'     
?>
<!--<button type="button" class="btn btn-success btn-lg btn-block">
                    Pay Now   <span class="glyphicon glyphicon-chevron-right"></span>
                </button> 
                
    $output .=  '
                                          <input type="hidden" name="item_name" value="Total">
                                          <input type="hidden" name="amount" value="'.$final_total.'">';            
                
                
                
                
                -->