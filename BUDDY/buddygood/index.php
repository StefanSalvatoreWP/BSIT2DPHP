<?php
session_start();

if (isset($_SESSION['username'])) {
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
        // echo "Username retrieved from the database: " . $username; // Debugging statement
    } catch (PDOException $e) {
        echo "Query execution failed: " . $e->getMessage();
    }
} else {
    $username = "";
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
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Sign</a></li>
          </ul>
          <img src="images/cart.png" width="30px" height="30px">
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

</div>
</body>
</html>