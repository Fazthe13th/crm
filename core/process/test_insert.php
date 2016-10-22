<?php 
    include 'database.php';
    $amount =  $_POST['amount'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $query = "INSERT INTO test VALUES(null,'$year','$amount','$month')";
    if(mysql_query($query))
    {
        echo "Successfully inserted";
    }
    mysql_close();
    
 
?>