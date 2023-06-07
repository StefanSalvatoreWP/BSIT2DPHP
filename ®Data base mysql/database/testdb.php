<?php
    require_once("dbconfig.php");

    $db = new Database();

    if($db->getState() == 1){
        $dbcon = $db->getDbConnection();
        try{
         $sql = "INSERT INTO student(fname,lname,email) values('markglen','tablada','glen@gmail.com')";
         $stmt = $dbcon->prepare($sql);
         $stmt->execute();
         echo "Success";
        }
        catch(PDOException $e){
            echo $e.getMessage();
        }
                
    }


   

?>