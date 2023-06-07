<?php
   require_once('product.php');

    $page = $_POST['submit'];
    
    if ($page == "Save"){
        $product_name = $_POST['fname'];
        $price = $_POST['lname'];
        $category = $_POST['email'];
        // $manuc = $_POST['manuc'];
     
        $prod = array("fname"=>$product_name, "lname"=>$price, "email"=>$category);
     
        $product = new Product();
        $ret = $product->saveProduct($prod);
        header('location:productentry.php');
    }
    else if($page == "Delete"){
        $prod = $_POST['fname'];
        $product = new Product();
        $ret = $product->deleteProduct($prod);
        header('location:productentry.php');
    }


    $page = $_POST['submit'];

  


?>