<?php

function user_exits($username)
{
    $username=mysql_real_escape_string($username);
    $query=mysql_query("SELECT COUNT(`user_id`) FROM `blog_user` WHERE `user_name`='$username'");
    return (mysql_result($query,0)==1)?true:false;
}
function user_active($username)
{
    $username=mysql_real_escape_string($username);
    $query=mysql_query("SELECT COUNT(`user_id`) FROM `blog_user` WHERE `user_name`='$username' AND `active`= 1");
    return (mysql_result($query,0)==1)?true:false;
}
function user_id_of_user($username)
{
    $username=mysql_real_escape_string($username);
    $query=mysql_query("SELECT `user_id` FROM `blog_user` WHERE `user_name`='$username'");
    return mysql_result($query,0,`user_id`);
}
function login($username,$password)
{
    $userid=user_id_of_user($username);
    $username=mysql_real_escape_string($username);
    $password=md5($password);
    $query=mysql_query("SELECT COUNT(`user_id`) FROM `blog_user` WHERE `user_name`='$username' AND `password`='$password'");
    return (mysql_result($query,0)==1) ? $userid:false;
}
function error_handel($errors)
{
    $print = array();
    foreach($errors as $error)
    {
        $print[]='<li>'.$error.'</li>';
    }
    return '<ul>'.implode('',$print).'</ul>';
}
function banned($userid)
{
    $query=mysql_query("SELECT `bann` FROM `blog_user` WHERE `user_id`='$userid'");
    return (mysql_result($query,0)==1)? true:false;
}
function loggedin()
{
    return (isset($_SESSION['user_id']))? true:false;
}
function user_data($user_id)
{
    $data=array();
    $user_id=(int)$user_id;
    $func_num_args=func_num_args();
    $func_get_args=func_get_args();
    if($func_num_args>1)
    {
        unset($func_get_args[0]);
        $fields='`'.implode('` , `',$func_get_args).'`';
        $data=mysql_query("SELECT $fields FROM `user` WHERE `UserID`=$user_id");
        $data=mysql_fetch_assoc($data);
        return $data;
        
    }
}
function email_exists($Email)
    {
        $Email=mysql_real_escape_string($Email);
        $query=mysql_query("SELECT COUNT(`user_id`) FROM `blog_user` WHERE `email` = '$Email'");
        return (mysql_result($query,0)==1) ? true:false;
    }
function array_sanitize(&$item)
{
    $item=mysql_real_escape_string($item);
}

?>