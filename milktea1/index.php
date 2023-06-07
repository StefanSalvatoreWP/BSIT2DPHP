<?php
session_start();

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $dsn = "mysql:host=localhost;dbname=shop_db;charset=utf8mb4";
    $dbUsername = "root";
    $dbPassword = "root123";

    try {
        $conn = new PDO($dsn, $dbUsername, $dbPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
    
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && $password === $user['password']) {
            $_SESSION['username'] = $username;
            header('Location: index1.php');
            exit;
        } else {
            echo "Invalid username or password!";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
		body {
             padding: 20px; 
             display: flex;
             justify-content: center; 
             align-items: center; 
             min-height: 100vh; 
             margin: 0; 
             background-image: url(image/background.png); 
             background-size: cover; 
             background-repeat: no-repeat; 
             font-family: Arial, sans-serif; 
            } 
            .container 
            { 
            width: 400px;
            height: 500px; 
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px; 
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            text-align: center; 
           } .navbar 
           { 
            margin-bottom: 20px; 
          } 
           .well {
             
            margin-bottom: 20px; 
         } 
         .label1 
         {
             margin-bottom: 10px;
             border-left: none; 
        } 
         h3, h4, label, input, button, a 
         { 
            margin: 0; padding: 0; 
        } 
        h3 { 
            margin-bottom: 20px; 
        } 
        h4 {
            margin-bottom: 10px; 
        } 
        input { 
            width: 100%; 
            padding: 8px; 
            border: 1px solid #ccc; 
            border-radius: 4px; 
            box-sizing: border-box; 
            margin-bottom: 10px; 
            background: transparent;
			border-top: none;
  		    border-right: none;
   			border-left: none;
        } 
        button { 
           padding: 10px 20px; 
          background-color: #4CAF50; 
          color: white; 
          border: none; 
          border-radius: 4px; 
          cursor: pointer; 
        } 
        button:hover { 
            background-color: #45a049; 
        } 
        a { color: #007bff; 
        text-decoration: none; 
       }
        a:hover {
         text-decoration: underline; }
    
    </style>

    
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <a class="navbar-brand">A CUP OF HAPPINESS</a>
            </div>
        </nav>
        <div class="well">
            <h3>Login and Registration</h3>
            <hr>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <h4>Login here...</h4>
                <hr>
                <div class="label1">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" required autocomplete="off"/>
                </div>
                <div class="label1">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" required />
                </div>
                <br>
                <div class="label1">
                    <button class="button1" name="login">Login</button>
                    <br><br>
                    <a href="registration.php">Registration</a>
    
                </div>
            </form>
        </div>
    </div>
</body>
</html>
