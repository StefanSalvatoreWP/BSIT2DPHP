<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_POST['flowerName']) && isset($_POST['flowerPrice'])) {
    $product = array(
        'name' => $_POST['flowerName'],
        'price' => $_POST['flowerPrice']
    );
    array_push($_SESSION['cart'], $product);
}

$totalPrice = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="./css/dashboard.css">
    <style>
        /* Add your custom styles here */
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
                <span class="notification"><?php echo count($_SESSION['cart']); ?></span>
            </div>
            <a class="shoppingCart" href="cart.php"><img src="./img/shopping cart.png" alt="" srcset=""></a>
            <img class="userImg" src="./img/user.png" alt="" srcset="">
        </div>
    </div>
    <div class="productContainer">
        <h2>Cart</h2>
        <ul class="cartList">
            <?php
            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $product) {
                    echo '<li>';
                    echo '<h3>' . $product['name'] . '</h3>';
                    echo '<p>' . $product['price'] . '</p>';
                    echo '</li>';

                    $totalPrice += str_replace('₱', '', $product['price']); // Calculate total price
                }
            }
            ?>
        </ul>
        <p>Total: ₱<?php echo $totalPrice; ?></p>
    </div>

    <script>
        // Add click event listener to product list items
        const productListItems = document.querySelectorAll('.productList li');
        productListItems.forEach(item => {
            item.addEventListener('click', addToCart);
        });

        // Function to add a product to the cart
        function addToCart(event) {
            const flowerName = event.target.querySelector('.flowerName').textContent;
            const flowerPrice = event.target.querySelector('.flowerPrice').textContent;
            
            const formData = new FormData();
            formData.append('flowerName', flowerName);
            formData.append('flowerPrice', flowerPrice);

            fetch('cart.php', {
                method: 'POST',
                body: formData
            }).then(() => {
                window.location.reload(); // Refresh the page to update the cart
            });
        }
    </script>
</body>
</html>
