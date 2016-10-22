
    <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Little Build - Sell and Inventory System</title>
    <link rel="shortcut icon" href="img/sales-logo.ico" />
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
</head>

    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                    </div>
                                    

                                
                            <div class="input-group">
                                      <span id="loading_meg"></span>
                                    </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <a id="btn-login" href="#" class="btn btn-success">Login </a>
                                      

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account! 
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Sign Up Here
                                        </a>
                                        </div>
                                        <div >
                                            If you want to go back Home page than click 
                                        <a href="index.php" >
                                            Little Build
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form">
                                
                                <div id="signupalert">
                                    
                                    <span id="registration_info"></span>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="username" class="col-md-3 control-label">User Name</label>
                                    <div class="col-md-9">
                                        <input id="username-reg" type="text" class="form-control" name="username" placeholder="User Name">
                                    </div>
                                </div>
                                  
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input id="email" type="email" class="form-control" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">First Name</label>
                                    <div class="col-md-9">
                                        <input id="firstname" type="text" class="form-control" name="firstname" placeholder="First Name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input id="lastname" type="text" class="form-control" name="lastname" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Address</label>
                                    <div class="col-md-9">
                                        <textarea id="address" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input id="password_reg" type="password" class="form-control" name="passwd" placeholder="Password">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Phone Number</label>
                                    <div class="col-md-9">
                                        <input id="phone" type="text" class="form-control" name="icode" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                <label for="type" class="col-md-3 control-label">Select Country</label>
                                <div class="col-md-9">
                                    <select id="country" name="country" class="form-control product-type">
                                        <option value="">-Select-</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Canada">Canada</option>
                                        <option value="China">China</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="United States">United States</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="type" class="col-md-3 control-label">Account Type</label>
                                    <div class="col-md-9">
                                        <div class="radio-inline">
                                          <label><input id="radio" type="radio" name="optradio" value="admin">Business</label>
                                        </div>
                                        <div class="radio-inline">
                                          <label><input id="radio" type="radio" name="optradio" value="customer">Customer</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                                        
                                    </div>
                                </div>
                                
                                
                                
                            </form>
                         </div>
                    </div>

               
               
                
         </div> 
    </div>
<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
    
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
	
	$(document).ready(function()
		{
			$("#btn-login").click(function(event)
				{
					$("#loading_meg").html("<img src='img/loading.gif'/>");
					var username = $("#login-username").val();
					var password = $("#login-password").val();
					if(username == "" || password =="")
					{
						$("#loading_meg").html("<div class='alert alert-danger'>Missing username or password field!</div>");
 
						return false;
					};
					$.ajax(
							{
								url: 'core/process/login.php',
								method: 'POST',
								data: {username:username, password:password},
								dataType: 'html',
								success: function(data)
								{


									if(data == "admin")
									{
										window.location = "dashboard.php";
									}
									else if(data =="customer")
									{
										window.location = "customer_panel.php";
									}
									else
									{
										$("#loading_meg").html("<div class='alert alert-danger'>Username and Password didn't match!!</div>");
										return false;
									}
								}
							}
						);
				});
			
            $("#btn-signup").click(function(event)
                {

                    var cb = $("#radio:checked").val();
                    var email = $("#email").val();
                    var username = $("#username-reg").val();
                    var address = $("#address").val();
                    var password = $("#password_reg").val();
                    var phone = $("#phone").val();
                    var country = $("#country option:selected").text();
                    var firstName = $("#firstname").val();
                    var lastName = $("#lastname").val();
                    $.ajax(
                        {
                            url: 'core/process/register.php',
                            method: 'POST',
                            dataType: 'html',
                            data: {cb:cb, email:email, username:username, address:address, password:password, phone:phone, country:country, firstName:firstName, lastName:lastName},
                            success: function(data)
                            {
                                if(data == "success")
                                {
                                    $("#registration_info").html("<div class='alert alert-success'>successfully registered. Go to Signin</div>");
                                    return false;
                                }
                                else
                                {
                                    $("#registration_info").html("<div class='alert alert-danger'>"+ data+"</div>");
                                    return false;
                                }
                            }
                        });
                    $("#signupform")[0].reset();
                });
		});
</script>