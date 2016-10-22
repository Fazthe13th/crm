<?php 
    
    include 'database.php';
    if(!empty($_POST['username']) && !empty($_POST['password']))
    {
    
    $username =  $_POST['username'];
    $password = $_POST['password'];
    
    $query = "select userid from users where username='$username' and password = '$password'";
    $result = mysql_query($query);
    $row = mysql_num_rows($result);
    
        if($row == 1)
        {
            $user = mysql_fetch_array($result);
            $userid = $user["userid"];
            session_start();
            $_SESSION['userid'] = $userid;
            $query = "select type from users where userid = '$userid'";
            $result = mysql_query($query);
            $user_info = mysql_fetch_array($result);
            if($user_info["type"] == "admin")
            {
                echo "admin";

            }
            if($user_info["type"] == "customer")
            {
                echo "customer";
            }
            
            
        }
        else
        {
            echo "failed";
        }
    
    }
    mysql_close();
    
?>