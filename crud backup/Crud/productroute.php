<?php
   require_once('product.php');

   
    $page = $_POST['submit'];

    
    if ($page == "Save"){
        $productname = $_POST['productname'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $manufacturer = $_POST['manufacturer'];
     
        $prod = array("productname"=>$productname, "price"=>$price, "category"=>$category, "manufacturer"=>$manufacturer);
     
        $product = new Product();
        $ret = $product->saveProduct($prod);
        header('location:productentry.php');
    }
    else if($page == "Delete"){
        $prod = $_POST['product_id'];
        $product = new Product();
        $ret = $product->deleteProduct($prod);
        header('location:productentry.php');
    }
    else if ($page == "Update") {
        $product_id = $_POST['product_id']
        $productname = $_POST['productname'];
        $price= $_POST['price'];
        $category = $_POST['category'];
        $manufacturer= $_POST['manufacturer'];
        $myProduct = new Product();
        $ret = $myProduct->updateProduct(array(
            "product_id" => $product_id,
            "productname" => $productname,
            "price" => $price,
            "category" => $category,
            "manufacturer" => $manufacturer
        ));
        header('location:productentry.php');
    }
    
  


?>