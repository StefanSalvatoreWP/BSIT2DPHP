<?php
    require_once('contacts.php');
    
    $usr = isset($_GET['user']) ? $_GET['user'] : '';      
  
   
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Contact</title>
    <style>
        /*for the button Update button  style*/
        .btn {
    border-radius: 2px;
    border: 0px;
    font-size: medium;
    font-weight: 600;
        margin: 1rem;
        padding: 0.5rem 1.2rem;
        text-transform: uppercase;
        white-space: nowrap;    
        cursor: pointer;
        align-items: center;
        
}
.btn--primary {
    background: rgb(27, 26, 26);
    color: white;
}
.btn--primary:hover {
    background: rgb(170, 170, 170);
}
.center{
    text-align: center;  /*ang info matunga or mahipos dili kay mahugaw*/ 
    margin: 5px;
}
    </style>
</head>
<body>
<center>
    <p>
        Update this Person's Contact:
        <strong>
            <?php
                echo $usr;
            ?>
        </strong>
    </p>

    <form action="contactroute.php?page=Update" method="POST">
         <input type="hidden" name="hidden_value" value="Update">

        <label for="">
            Tel Number:
            <input type="text"  class ="center" name='Tel_Number' >
        </label>
    <br>
        <label for="">
            Address:
            <input type="text"class ="center"  name='Address'     >
        </label>
        <br>
        <label for="">
            Relation:
            <input type="text"class ="center"  name='Relation' >
        </label>
    <br>
        <input type="submit"  class="btn btn--primary" name='submit' value="Update">
    </form>
</center>
</body>
</html>
