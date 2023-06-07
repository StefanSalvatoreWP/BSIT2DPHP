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
    <title>Document</title>
    <style>
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
        /*for the button submit style*/
}
.btn--primary {
    background: rgb(27, 26, 26);
    color: white;
}
.btn--primary:hover {
    background: rgb(170, 170, 170);
}
    </style>
</head>
<body>
<center>
    <p>
       REMOVE THIS CONTACT?
        <strong>
            <?php
                echo $usr;
            ?>
        </strong>
    </p>
    
    <form action="contactroute.php" method='POST'> 
         <input type="hidden" name='Contact_Name' value="<?php echo $usr ?> ">
        <input type="submit" class = "btn btn--primary" name='submit' value="Remove">
    </form>
    </center>
</body>
</html>
