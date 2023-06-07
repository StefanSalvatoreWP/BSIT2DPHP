<?php
    require_once("advanceddbConfig.php");

    $db = new Database();

    if($db->getState() == 1){
        $dbcon = $db->getDbConnection();
        try{
         $sql = "INSERT INTO advancedStudent(first_Name,last_Name,age) values('yehey','advanced','21')";
         $stmt = $dbcon->prepare($sql);
         $stmt->execute();
         echo "Success";
        }
        catch(PDOException $e){
            echo $e.getMessage();
        }
                
    }


   

?>