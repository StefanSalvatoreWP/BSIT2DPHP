<?php
    require_once('product.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body{
            padding: 50px 0;
             border: 1px solid green;
            text-align: center;
        }
        label{
             width: 400px;
	         padding: 20px;
	         border-radius: 10px;
             text-align: center;
             border: 1px solid green;
             box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        /* table{
            padding: 20px;
	        border-radius: 10px;
	        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        } */
        table,th{
            border:1px solid black;
        }
        .tbl-product{
            min-height: 50vh;
	        display: flex;
	        justify-content: center;
	        align-items: center;
	        flex-direction: column;
        }
        table,tr,td{
            border:1px solid black;
            width: 1000px;
             padding: 10px;
             border: 1px solid gray;
             margin: center;
        }
        

    </style>
</head>
<body>
    <div class="container">
    <form action="productroute.php" method='POST'>
        <label for="">
        FirstName: <br>
            <input type="text" name='fname'><br>
            LastName: <br>
            <input type="text" name='lname'><br>
            Email: <br> 
            <input type="text" name='email'><br>
            <input type="submit" name='submit' value='Save'>
        </label>
        <!-- </label>
        <label for="">
        LastName:
            <input type="text" name='lname'>
        </label>
        <label for="">
        Email:
            <input type="text" name='email'> -->
        </label>
        <!-- <label for="">
            Manufacturer:
            <input type="text" name='manuc'>
        </label> -->
     
            <!-- <input type="submit" name='submit' value='Save'> -->
      
    </form>
    </div>
    <div class='tbl-product'>
        <table>
            <thead>
                <tr>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Email</th>
                    <!-- <th>Manufacturer</th> -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $prod = new Product();
                    echo $prod->getAllProducts();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>