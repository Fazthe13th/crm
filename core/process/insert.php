<?php
    include 'database.php';
    $sql = "insert into inventory(product_name,product_type,distributor,price,sale_price,weight,quantity) 
    values('".$_POST["name"]."','".$_POST["productType"]."','".$_POST["distributor"]."','".$_POST["price"]."',
    '".$_POST["salePrice"]."','".$_POST["weight"]."','".$_POST["quantity"]."')";
    if(mysql_query($sql))
    {
        echo "Data Inserted";
    }
    mysql_close();
?>
