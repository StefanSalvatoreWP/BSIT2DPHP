<?php
    require_once('product.php');
   
?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <h1>Product Entry</h1> 
    <button onclick="myFunction()" class ='dark' > Dark mode</button>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Entry</title>  
    <link rel="stylesheet" href="style.css">    


    <script>  
function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}
</script>
    
</head>
<body>
    <form action="productroute.php" method='POST'>
        <label for="">
            Product Name:
            <input type="text" name='productname' class = 'productName'>
        </label>
        <label for="">
            Price:
            <input type="text" name='price' class = 'Price'>
        </label>
        <label for="">
            Category:
            <input type="text" name='category' class ='category' >
        </label>
        <label for="">
            Manufacturer:
            <input type="text" name='manufacturer' class = 'Manuc'>
        </label>
     
            <input type="submit" name ='submit' value ='Save' class ="save">
           
    </form> 
  
    <div class='tbl-product'>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Manufacturer</th>
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
    <br><br> 

   
</body>
</html>