<?php

function issu_id()
{
    $userid=$_SESSION['user_id'];
    $issu_row=mysql_fetch_array(mysql_query("SELECT `issu_id` FROM `issues` WHERE `user_id` = '$userid' ORDER BY `issu_id` DESC LIMIT 1")) or die("no");
    $issuid=$issu_row['issu_id'];
    return $issuid;
}
function have_access($userid)
{
$admin=mysql_fetch_array(mysql_query("SELECT `admin` FROM `blog_user` WHERE `user_id` = '$userid'")) or die(mysql_error());
if($admin['admin']==1 || $userid==1)
    {
        return true;
    }
else
    {
        return false;
    }
}
function bann_user($user_id_this)
{
    mysql_query("UPDATE `blog_user` SET `bann` = 1 WHERE `user_id` = '$user_id_this'");
                            unset($_GET);
                            
                            header("Location: bann_user.php");
}
function unbann_user($user_id_this)
{
    mysql_query("UPDATE `blog_user` SET `bann` = 0 WHERE `user_id` = '$user_id_this'");
                            unset($_GET);
                            header("Location: bann_user.php");
}


?>