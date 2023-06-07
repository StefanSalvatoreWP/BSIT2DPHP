<?php
session_start();
$_SESSION["loggedin"] = true;

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

$username = isset($_SESSION["username"]) ? $_SESSION["username"] : "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milktea</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    
    <div class="container">
        <div class="navbar">
            <img src="image/logo.png" class="logo">
            <div class="userContainer">
                <p>Welcome, <?php echo $username; ?></p>
                <li class="Logout"><a class="logout" href="logout.php">Logout</a></li>
            </div>
            <nav>
       
            </nav>
            <img src="image/cart.png" class="cart">
        </div>
        <div class="content">
            <a href="Order.php" class="btn">Order Now</a>
            <!-- <h1>You should always <br>feel refreshing</h1> -->

            <div class="arrow-icon">
                <img src="image/back3.png">
                <img src="image/next2.png">
            </div>
        </div>
    </div>
</body>
</html>
