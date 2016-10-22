<?php
    error_reporting(0);
    include 'database.php';
    $username= $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $country = $_POST["country"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $type = $_POST["cb"];
    $sql = "select * from users where username = '$username'";
    $result = mysql_query($sql);
    $row = mysql_num_rows($result);
    $check_admin = "select * from users where type = 'admin'";
    $admin_result = mysql_query($check_admin);
    if($row >0)
    {
        echo "Username already in use";
        return false;

    }
    else if(strlen($password)<=5)
    {
        echo "Password have to be at least 5 character";
        return false;
    }
    else if($type == "admin")
    {
        if(mysql_num_rows($admin_result)>0)
        {
            echo "This system already have a businessman. Please choose to be a customer";
            return false;
        }
    }
    else
    {
        $sql = "insert into users(username, password, firstname, lastname, email, address, phone, country, type, date) 
        values('".$username."','".$password."','".$firstName."','".$lastName."',
        '".$email."','".$address."','".$phone."','".$country."','".$type."','".date('Y-m-d')."')";
        if(mysql_query($sql))
        {
            echo "success";
            return false;
        }
    }
    mysql_close();
?>