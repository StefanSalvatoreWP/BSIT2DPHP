<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

require_once("allfunction.php");

$db = new Database();
$connection = $db->getDbConnection();

$query = "SELECT username FROM users WHERE username = :username";
$stmt = $connection->prepare($query);
$stmt->bindValue(':username', $_SESSION['username']);

try {
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $username = $user['username'];
} catch (PDOException $e) {
    echo "Query execution failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sneakers Society</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
  $(document).ready(function() {
    var productName = "";
    var productPrice = "";

    $(".row .col-4").click(function() {
      productName = $(this).find("h4").text();
      productPrice = $(this).find("p").text();
    });

    $(".shopping-cart").click(function() {
      if (productName !== "" && productPrice !== "") {
        // Send data using GET request instead of POST
        window.location.href = "cart.php?product=" + encodeURIComponent(productName) + "&price=" + encodeURIComponent(productPrice);
      }
    });
  });
</script>

</head>
<body>
<div class="header">
<div class="container">
<div class="navbar">
    <div class="logo">
        <img src="images/logo-3.png" width="125px">
    </div>
    <div class="userContainer">
    <p>Welcome: <?php echo $username; ?></p>
    </div>
        <nav>
          <ul>
            <li><a href="">Home</a></li>
            <li><a href="logout.php">logout</a></li>
          </ul>
         <a href="cart.php"> <img src="./img/shopping-cart.png" width="30px" height="30px" class="shopping-cart"></a>
        </nav>
    </div>
    <div class="row">
      <div class="col-2">
            <h1>Shop now!</h1>
            <p>Success isn't always about greatness. It's about consistency. Consistent <br> hard work gains success. Greatness will come.</p>
           <a href=""  class="btn">Explore Now &#8594;</a>
      </div>
      <div class="col-2">
              <img src="images/image1.png" >
      </div>
    </div>
  </div>
</div>
<!-- featured Categories -->
<div class="categories">
    <div class="small-container">
        <div class="row">
           <div class="col-3">
        <img src="images/category-1.jpg">
      </div>
            <div class="col-3">
        <img src="images/category-2.jpg ">
      </div>
            <div class="col-3">
        <img src="images/category-3.jpg">
  </div>
    </div>
  </div>
</div>

<!--featured Products -->
<div class="small-container">
  <h2 class="title">Featured Products</h2>
  <div class="row">
    <div class="col-4">
      <img src="images/product-1.jpg">
      <h4>Red Printed T-shirt</h4>
      <div class="ratings">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-half-o"></i>
      </div>            
      <p>$129.00</p>
    </div>
    <div class="col-4">
        <img src="images/product-2.jpg">
          <h4>Hyper X shoes</h4>
          <div class="ratings">
            <i class="fa fa-star"></i>
             <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
              
          </div>            
       <p>$299.00</p>
    </div>
    <div class="col-4">
      <img src="images/product-3.jpg">
        <h4>Denim jeans</h4>
        <div class="ratings">
          <i class="fa fa-star"></i>
           <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
            
        </div>            
     <p>$89.00</p>
  </div>
  <div class="col-4">
    <img src="images/product-4.jpg">
      <h4>Puma collared-shirt</h4>
      <div class="ratings">
        <i class="fa fa-star"></i>
         <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>    
      </div>            
   <p>$299.00</p>
</div>
</div>
<h2 class="title">Recent Products</h2>
<div class="row">
  <div class="col-4">
    <img src="images/product-5.jpg">
    <h4>Grey Sneakers</h4>
    <div class="ratings">
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star-half-o"></i>
      <i class="fa fa-star-o"></i>
    </div>
    <p>$199.00</p>
  </div>
  <div class="col-4">
    <img src="images/product-6.jpg">
    <h4>Black T-shirt</h4>
    <div class="ratings">
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star-o"></i>
    </div>
    <p>$159.00</p>
  </div>
  <div class="col-4">
    <img src="images/product-7.jpg">
    <h4>Assorted socks</h4>
    <div class="ratings">
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star-half-o"></i>
    </div>
    <p>$219.00</p>
  </div>
  <div class="col-4">
    <img src="images/product-8.jpg">
    <h4>Classic Watch</h4>
    <div class="ratings">
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star-o"></i>
      <i class="fa fa-star-o"></i>
    </div>
  </div>

  <!-- Offer -->
<div class="offer">
  <div class="small-container">
    <div class="row">
      <div class="col-2">
        <img src="images/exclusive.png" class="offer-img">
      </div>
      <div class="col-2">
        <p>Exclusively available on Lorem Ipsum</p>
        <h1>Vivo Smart Band 4</h1>
        <small>The Vivo Smart Band 4 features a 39.9% larger (than Vivo Band 3) Amoled color full-touch with adjustable brightness, everything is clear as can be.</small>
          <a href="" class="Button">Buy now &#8594;</a>
      </div>
    </div>
  </div>
  </div>
  
</div>
</body>
</html>
