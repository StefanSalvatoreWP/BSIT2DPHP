<?php


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/dashboard.css">
    <style>
        .notification {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: red;
            color: white;
            padding: 5px;
            border-radius: 50%;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="navBar">
        <div class="logoContainer"><h1>Flower</h1></div>
    </div>
    <div class="listContainer">
        <ul>
            <li class="selectList"><a href="#">Home</a></li>
            <li class="selectList"><a href="#">About</a></li>
            <li class="selectList"><a href="#">Products</a></li>
            <?php
            session_start();
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                echo '<li class="selectListLogout"><a href="logout.php">Logout</a></li>';
                echo '<li class="selectListLogout">Welcome, ' . $username . '</li>';
            } else {
                echo '<li class="selectList"><a href="#" onclick="showLoginForm()">Login</a></li>';
                echo '<li class="selectList"><a href="#" onclick="showSignupForm()">Signup</a></li>';
            }
            ?>
        </ul>
        <div class="iconsContainerDash">
            <img src="./img/black heart.png" alt="" srcset="">
            <div class="addtoCart">
                <span class="notification">0</span>
            </div>
            <a class="shoppingCart" href="cart.php"><img src="./img/shopping cart.png" alt="" srcset=""></a>
            <img class="userImg" src="./img/user.png" alt="" srcset="">
        </div>
    </div>
    <div class="productContainer">
        <h2>Latest <span>Products</span></h2>
        <ul class="productList">
            <li>
                <img class="flowerImg" src="./flower img/Flower 1.png" alt="" srcset="">
                <h3 class="flowerName">Pink Flower </h3>
                <p class="flowerPrice">₱320</p>
            </li>
        </ul>

        <ul class="productList">
            <li>
                <img  class="flowerImgBigSize" src="./flower img/Flower 2.png" alt="" srcset="">
                <h3 class="flowerName">Pink Flower </h3>
                <p class="flowerPrice">₱320</p>
            </li>
        </ul>
    </div>

 <script src="dashboard.js"></script>
</body>
</html>
