<?php
    require_once('product.php');

    $pr = isset($_GET['product_id']) ? $_GET['product_id'] : '';

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="delete.css">
    <title>Document</title>
</head>
<body>
    <p>
        Are you sure you want to delete this product?
        <strong>
            <?php
                echo $pr;
            ?>
        </strong>
    </p>
    <form action="productroute.php" method='POST'> 
         <input type="hidden" name='product_id' value="<?php echo $pr ?> ">
        <input type="submit" name='submit' value="Delete">
        <img src="deletesign.png" alt="" srcset="">
    </form>
</body>
</html>
