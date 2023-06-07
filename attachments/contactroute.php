<?php

   require_once('contacts.php');

   $page = $_POST['hidden_value'];


    
    if ($page == "Save"){
        $Contact_Name = $_POST['Contact_Name'];
        $Tel_Number = $_POST['Tel_Number'];
        $Address = $_POST['Address'];
       
        $Relation = $_POST['Relation'];
     
        $user = array("Contact_Name"=>$Contact_Name, "Tel_Number"=>$Tel_Number, "Address"=>$Address, "Relation"=>$Relation);
     
        $contacts = new contacts();
        $ret = $contacts->savecontacts($user);
        header('location:index.php');
    }
    else if($page == "Remove"){
        $user = $_POST['Contact_Name'];
        $contacts = new contacts();
        $ret = $contacts->deletecontacts($user);
        header('location:index.php');
    }
    
   else if ($page == "Update") {
    $Contact_Name = $_GET['Contact_Name']; // Retrieve from query parameters
    $Tel_Number = $_POST['Tel_Number'];
    $Address = $_POST['Address'];
    $Relation = $_POST['Relation'];

    $user = array(
        "Contact_Name" => $Contact_Name,
        "Tel_Number" => $Tel_Number,
        "Address" => $Address,
        "Relation" => $Relation
    );

    $contacts = new contacts();
    $ret = $contacts->updatecontacts($user);
    header('location:index.php');
}

    

?>