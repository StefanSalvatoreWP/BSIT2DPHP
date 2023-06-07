<?php
require_once('product.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $page = $_POST['submit'];

  if ($page == "Save") {
    $product_name = $_POST['fname'];
    $price = $_POST['lname'];
    $category = $_POST['email'];
    $prod = array("fname"=>$product_name, "lname"=>$price, "email"=>$category);
    $product = new Product();
    $ret = $product->saveProduct($prod);
    if ($ret) {
      header('Location: productentry.php');
      exit();
    } else {
      echo "Error: Failed to save product.";
    }
  } else if ($page == "DELETE") {
    $prod = $_POST['fname'];
    $product = new Product();
    $ret = $product->deleteProduct($prod);
    if ($ret) {
      header('Location: productentry.php');
      exit();
    } else {
      echo "Error: Failed to delete product.";
    }
  } else if ($page == "NO") {
    header('Location: productentry.php');
    exit();
  }
}
?>