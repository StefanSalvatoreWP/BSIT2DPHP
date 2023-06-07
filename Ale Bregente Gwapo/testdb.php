<?php
    require_once("dbconfig.php");

    $db = new Database();

    if($db->getState() == 1){
        $dbcon = $db->getDbConnection();
        try{
         $sql = "INSERT INTO student(first_Name,last_Name,age) values('TEST WORKING','TEST WORKING','TEST WORKING')";
         $stmt = $dbcon->prepare($sql);
         $stmt->execute();
         echo "Success";
        }
        catch(PDOException $e){
            echo $e.getMessage();
        }
                
    }


   

?>