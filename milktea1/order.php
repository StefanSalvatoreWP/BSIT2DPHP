<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <link rel="stylesheet" href="order.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f1f1f1;
            background-image: url("image/background.png");
            background-repeat:  no-repeat;
            /* animation: ripple 5s infinite linear; */
            background-size: cover;
            height: 100vh;
            width: 180vh;
        }

        @keyframes ripple {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: 100% 100%;
            }
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
        }

        .item {
            position: relative;
            width: 300px;
            height: 500px;
            margin: 20px;
            background-color: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out;
        }

        .item:hover {
            transform: scale(1.05);
        }

        .item img {
            width: 100%;
            height: 70%;
            object-fit: contain;
            display: block;
            margin: 0 auto;
            border-radius: 4px 4px 0 0;
        }

        .item-content {
            padding: 15px;
            text-align: center;
        }

        .item h1 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .item p {
            font-size: 16px;
            color: #888;
        }
        .shopping{
            position: relative;
            top: -5px;
            left: 90%;
           
        }
        .shopping img{
            width: 70px;
            top: -5px;
            left: 80%;
        }
        .shopping span{
            background-color: red;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            position: absolute;
            top: -5px;
            left: 2%;
            padding: 3px 10px;
        }
        .btn{
             margin-left: 5%;
             margin-top: 0%; 
             display: inline-block;
             background: linear-gradient(45deg, #fe87870c,#ff7782da);
             border-radius: 6px;
             padding: 10px 20px;
             box-sizing: border-box;
             text-decoration: none;
             color: #fff;
             box-shadow: 3px 8px 22px rgba(94,28,68,0.15);

            }
            .btn:hover{
            background: rgba(221, 9, 55, 0.068);
              color: linear-gradient(45deg, #fe878700,#ff7782da);

             }

    </style>
</head>
<body>
    <div class="shopping">
    <img src="image/cart.png" >
    <span class="quantity">0</span>
    </div>

    <a href="index1.php" class="btn">Return</a>

    <div class="container">
    <div class="item">
    
            <img src="image/okinawa.png" alt="">
            <div class="item-content">
                <h1>Okinawa</h1>
                <p>₱120</p>
                <a href="cart.php?product=Okinawa&price=120">
                <button>Add to Cart</button>
            </div>
        </a>
    </div>
    <div class="item">
            <img src="image/pearl.png" alt="">
            <div class="item-content">
                <h1>Pearl</h1>
                <p>₱100</p>
        <a href="cart.php?product=Pearl&price=100">

                <button>Add to Cart</button>
            </div>
        </a>
    </div>
    <div class="item">

            <img src="image/winter.png" alt="">
            <div class="item-content">
                <h1>Winter</h1>
                <p>₱90</p>
                <a href="cart.php?product=Winter&price=90">
                <button>Add to Cart</button>
            </div>
        </a>
    </div>
    <div class="item">
   
            <img src="image/cocoa.png" alt="">
            <div class="item-content">
                <h1>Cocoa</h1>
                <p>₱90</p>
                <a href="cart.php?product=Cocoa&price=90">
                <button>Add to Cart</button>
            </div>
        </a>
    </div>
    <div class="item">
   
        <img src="image/coffee.png" alt="">
        <div class="item-content">
            <h1>Coffee</h1>
            <p>₱90</p>
            <a href="cart.php?product=Coffee&price=90">
            <button>Add to Cart</button>
        </div>
    </a>
</div>
<div class="item">
 
        <img src="image/green.png" alt="">
        <div class="item-content">
            <h1>Green</h1>
            <p>₱90</p>
            <a href="cart.php?product=Green&price=90">
            <button>Add to Cart</button>
        </div>
    </a>
</div>
<div class="item">
  
        <img src="image/honey.png" alt="">
        <div class="item-content">
            <h1>Honey</h1>
            <p>₱90</p>
            <a href="cart.php?product=Honey&price=90">
            <button>Add to Cart</button>
        </div>
    </a>
</div>
<div class="item">
   
        <img src="image/mango.png" alt="">
        <div class="item-content">
            <h1>Mango</h1>
            <p>₱90</p>
            <a href="cart.php?product=Mango&price=90">
            <button>Add to Cart</button>
        </div>
    </a>
</div>
<div class="item">
   
        <img src="image/oreo.png" alt="">
        <div class="item-content">
            <h1>Oreo</h1>
            <p>₱90</p>
            <a href="cart.php?product=Oreo&price=90">
            <button>Add to Cart</button>
        </div>
    </a>
</div>
<div class="item">
   
        <img src="image/pudding.png" alt="">
        <div class="item-content">
            <h1>Pudding</h1>
            <p>₱90</p>
            <a href="cart.php?product=Pudding&price=90">
            <button>Add to Cart</button>
        </div>
    </a>
</div>
<div class="item">
    <a href="cart.php?product=Strawberry&price=90">
        <img src="image/strawberry.png" alt="">
        <div class="item-content">
            <h1>Strawberry</h1>
            <p>₱90</p>
            <button>Add to Cart</button>
        </div>
    </a>
</div>
<div class="item">
   
        <img src="image/taro.png" alt="">
        <div class="item-content">
            <h1>Taro</h1>
            <p>₱90</p>
            <a href="cart.php?product=Taro&price=90">
            <button>Add to Cart</button>
        </div>
    </a>
</div>
</div>

    </div>
</body>
</html>
