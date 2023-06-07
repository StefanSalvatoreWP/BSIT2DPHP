<?php
require_once("allfunction.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    // Other form fields

    $db = new Database();
    $connection = $db->getDbConnection();

   
    $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $connection->prepare($query);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      
        header('Location:login.php');
    } else {
     
        echo "Signup failed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup Form</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .signup-form {
      width: 300px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .signup-form input[type="text"],
    .signup-form input[type="password"] {
      width: 100%;
      padding: 8px 12px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .signup-form button {
      width: 100%;
      padding: 8px 12px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      box-sizing: border-box;
      background-color: #4caf50;
      color: white;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">
    <form class="signup-form" method="POST" action="">
      <h2>Signup</h2>
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Signup</button>
    </form>
  </div>
</body>
</html>
