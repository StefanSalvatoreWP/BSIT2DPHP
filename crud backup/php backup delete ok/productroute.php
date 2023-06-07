<?php
   require_once('product.php');

    $page = $_POST['submit'];
    
    if ($page == "Save"){
        $product_name = $_POST['firstname'];
        $price = $_POST['lastname'];
        $category = $_POST['age'];
        // $manuc = $_POST['manuc'];
        // , "manufacturer"=>$manuc
        $prod = array("firstname"=>$product_name, "lastname"=>$price, "age"=>$category); 
     
        $product = new Product();
        $ret = $product->saveProduct($prod);
        header('location:productentry.php');
    }
    else if($page == "Delete"){
        $prod = $_POST['student_id'];
        $product = new Product();
        $ret = $product->deleteProduct($prod);
        header('location:productentry.php');
    }

    

  


?>