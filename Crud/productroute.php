<?php
   require_once('product.php');

   
   $page = $_POST['submit'];
    //  $p = $_POST['sort'];
    
    if ($page == "Save"){
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $manufacturer = $_POST['manufacturer'];
     
        $prod = array("product_name"=>$product_name, "price"=>$price, "category"=>$category, "manufacturer"=>$manufacturer);
     
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
        $product_id = $_POST['product_id']; 
        $product_name = $_POST['product_name'];
        $price= $_POST['price'];
        $category = $_POST['category'];
        $manufacturer= $_POST['manufacturer'];
        $myProduct = new Product();
        $ret = $myProduct->updateProduct(array(
            "product_id" => $product_id, 
            "product_name" => $product_name,
            "price" => $price,
            "category" => $category,
            "manufacturer" => $manufacturer
        ));
        header('location:productentry.php');
    }
    
   
    // if ($p== "Sort"){
    //     $product_name = $_POST['product_name'];
    //     $price = $_POST['price'];
    //     $category = $_POST['category'];
    //     $manuc = $_POST['manuc'];
     
    //     $prod = array("product_name"=>$product_name, "price"=>$price, "category"=>$category, "manufacturer"=>$manuc);
     
    //     $product = new Product();
    //     $ret = $product->sortProduct($prod);
    //     header('location:productentry.php');
    // }
  


?>