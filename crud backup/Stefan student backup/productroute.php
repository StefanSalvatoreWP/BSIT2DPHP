<?php
   require_once('product.php');

    $page = $_POST['submit'];
    
    if ($page == "Save"){
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $age = $_POST['age'];
        $studentlist = array("firstname"=>$firstName, "lastname"=>$lastName, "age"=>$age); 
     
        $myStudent = new Student();
        $ret = $myStudent->saveProduct($studentlist);
        header('location:productentry.php');
    }
    else if($page == "Delete"){
        $studentlist = $_POST['first_Name'];
        $myStudent = new Student();
        $ret = $myStudent->deleteProduct($studentlist);
        header('location:productentry.php');
    }

    

  


?>