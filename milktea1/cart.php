<?php
session_start();

if (isset($_GET['product']) && isset($_GET['price'])) {
   
    $product = $_GET['product'];
    $price = $_GET['price'];
  
    if (!isset($_SESSION['cart_items'])) {
        $_SESSION['cart_items'] = array();
    }

    $_SESSION['cart_items'][] = array('product' => $product, 'price' => $price);
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f1f1f1;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f9f9f9;
        }

        td img {
            max-width: 50px;
            max-height: 50px;
            border-radius: 4px;
        }

        td p {
            margin: 0;
        }

        .total {
            margin-top: 20px;
            text-align: right;
        }

        .total span {
            font-weight: bold;
        }

        .checkout-btn {
            display: block;
            width: 100%;
            text-align: center;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .checkout-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<a href="order.php" class="btn">Return</a>
    <div class="container">
        <h1>Shopping Cart</h1>
        <table>
            <tr>
                <th>Product</th>
                <th>Price</th>
            </tr>
            <?php
            // Iterate through the cart items and display them in the table
            foreach ($_SESSION['cart_items'] as $item) {
                echo '<tr>';
                echo '<td>' . $item['product'] . '</td>';
                echo '<td>₱' . $item['price'] . '</td>';
                echo '</tr>';
            }
            ?>
        </table>
        <div class="total">
            <span>Total: ₱<?php
                // Calculate the total price of all items in the cart
                $total = 0;
                foreach ($_SESSION['cart_items'] as $item) {
                    $total += $item['price'];
                }
                echo $total;
                ?></span>
        </div>
        <a href="#" class="checkout-btn">Proceed to Checkout</a>
    </div>
</body>
</html>
