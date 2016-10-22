<?php 
    include 'database.php';
    $task_name = mysql_real_escape_string($_POST['task_name']);
    $task_dec = mysql_real_escape_string($_POST['task_dec']);
    $importance = mysql_real_escape_string($_POST['importance']);
    $date = mysql_real_escape_string($_POST['date']);
    $time = mysql_real_escape_string($_POST['time']);
    
    /*$query = "INSERT INTO test VALUES(null,'$year','$amount','$month')";
    if(mysql_query($query))
    {
        echo "Successfully inserted";
    }*/
    mysql_close();
    
 
?>