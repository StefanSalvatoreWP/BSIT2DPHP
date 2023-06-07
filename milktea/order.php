<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="order.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f1f1f1;
            border:1px solid red;
            background-color: lightpink;
            width: 100vw;
            height:100vh;
        }

        .container {
            position: relative;
            left:13rem;
            top:10rem;
            display: inline-flex;
            width:60rem;
            height:30rem;
            border-radius: 4px;
        }

        .item {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            height:10rem;
            right:6rem;
            width: 9rem;
            padding-right:40px
        }

        .item img {
            width: 100px;
            height: 150px;
            object-fit: cover;
            border-radius: 4px;
        }

        h1{
            font-size:medium;
            font-weight:900;
            position: relative;
            left:25px;
            bottom:10px;
        }

        p{
            position: relative;
            left:20px;
            bottom:30px;
            font-size:small;
        }

        .item p {
            margin-top: 10px;
            font-weight: bold;
        }

        .item:hover{
        cursor:pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="item">
        <a href="cart.php?product=Okinawa&price=120">
            <img src="image/okinawa.png" alt="">
            <h1>Okinawa</h1>
            <p>₱120</p>
        </a>
    </div>
    <div class="item">
        <a href="cart.php?product=Pearl&price=100">
            <img src="image/pearl.png" alt="">
            <h1>Pearl</h1>
            <p>₱100</p>
        </a>
    </div>
    <div class="item">
        <a href="cart.php?product=Winter&price=90">
            <img src="image/winter.png" alt="">
            <h1>Winter</h1>
            <p>₱90</p>
        </a>
    </div>
    <!-- Add more items here with the same structure -->
</div>

</body>
</html>