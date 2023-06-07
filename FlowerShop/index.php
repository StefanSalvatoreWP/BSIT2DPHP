<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <style>
     
    </style>
    <title>Flower Shop</title>
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
            <li class="selectList"><a href="#" onclick="showSignupForm()">Signup</a></li>
            <li class="selectList"><a href="#" onclick="showLoginForm()">Login</a></li>
        </ul>
        <div class="iconsContainer">
            <img src="./img/black heart.png" alt="" srcset="">
            <img src="./img/shopping cart.png" alt="" srcset="">
            <img src="./img/user.png" alt="" srcset="">
        </div>
        <div class="middleContent">
            <h1>Fresh Flowers</h1>
            <h2>Natural & Beautiful Flowers</h2>
            <p class="lorem">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur veniam porro deleniti. Inventore suscipit ab deleniti vero voluptate autem vel labore deserunt porro nobis quisquam, consequuntur pariatur quae, assumenda explicabo.
            pisci repudiandae pariatur quis iste ut! Adipisci, voluptatibus!</p>
            <div class="shopnowContainer">
                <p>Shop Now</p>
            </div>
        </div>
    </div>

    <div class="overlay" id="overlay">
        <div class="formContainer">
            <div id="loginForm">
                <h2 id="formTitle"></h2>
                <!-- Login Form -->
                <form action="" method="POST">
                    <input type="text" id="username" name="username" placeholder="Username" required><br>
                    <input type="password" id="password" name="password" placeholder="Password" required><br>
                    <button type="submit" name="login">Login</button>
                </form>
            </div>

            <div id="signupForm">
                <h2 id="formTitle"></h2>
                <!-- Signup Form -->
                <form action="" method="POST">
                    <input type="text" id="username" name="username" placeholder="Username" required><br>
                    <input type="password" id="password" name="password" placeholder="Password" required><br>
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password"><br>
                    <button type="submit" name="signup">Signup</button>
                </form>
            </div>

            <button onclick="hideForm()">Close</button>
        </div>
    </div>

    <script src="main.js"></script>

    <?php

    require_once 'serverconfig.php';

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header('Location:dashboard.php');
        } else {
            echo '<script>alert("Invalid username or password.");</script>';
        }
    }

    // Signup functionality
    if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        if ($password === $confirmPassword) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
            $stmt->execute([$username, $hashedPassword]);

            echo '<script>alert("Signup successful!");</script>';
        } else {
            echo '<script>alert("Password and confirm password do not match.");</script>';
        }
    }
    ?>
</body>
</html>
