<?php

    session_start();
   	error_reporting(0);
    require('database/connect.php');
    
	  if(isset($_SESSION['userid']))
	  {
	    
	    
	    $userid = $_SESSION['userid'];
	    $query = "SELECT * from users where userid = '$userid'";
	    $result = mysql_query($query);
	    $row = mysql_fetch_array($result);
	    
	    

	  }
	 if(!isset($_SESSION['userid']))
		{
		  header("Location: login_reg.php");
		}
    
    
?>