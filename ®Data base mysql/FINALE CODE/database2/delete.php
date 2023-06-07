<?php
    require_once('product.php');

    $pr = isset($_GET['prid']) ? $_GET['prid'] : '';
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <style>
        body{
	        justify-content: center;
	        align-items: center;
	        flex-direction: column;
            padding: 500px 0;
            height: 10px;
            text-align: center;
            background: url('deleteimg.jpg') no-repeat;
            background-position: center;
            

        }
        .block {
             display: white;
              width: 5%;
             border: none;
             background-color: #FF0000;
             padding: 14px 28px;
            font-size: 16px;
             cursor: pointer;
            text-align: center;
        }
        .bloc {
             display: white;
              width: 5%;
             border: none;
             background-color: #A0FFA0;
             padding: 14px 28px;
            font-size: 16px;
             cursor: pointer;
            text-align: center;
        }
        .form{
            color: white;

        }
        


    </style>

</head>
<body>

    <p>
    
       <h1>Are you sure you want to delete this? </h1>
        <strong>
            <?php
                echo $pr;
            ?>
        </strong>
        <i class='fa-solid fa-trash-can'></i>
    </p>
    <form action="productroute.php" method='POST'> 
         <input type="hidden" name='fname' value="<?php echo $pr ?> ">
         <style  color="green"></style>
        <input type="submit" class="block" name='submit' value="DELETE">
        <input type="submit" class="bloc" name='submit' value="NO">
        
    </form>
</body>
</html>