<?php
    require_once("dbconfig.php");

    $db = new Database();

    if($db->getState() == 1){
        $dbcon = $db->getDbConnection();
        try{
         $sql = "insert into product(product_name,price,category,manufacturer) values('Nature spring',15.00,'Drinks','Nature Spring')";
         $stmt = $dbcon->prepare($sql);
         $stmt->execute();
         echo "Success";
        }
        catch(PDOException $e){
            echo $e.getMessage();
        }
                
    }


   

?>