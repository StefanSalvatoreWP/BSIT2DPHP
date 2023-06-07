<?php
require 'connect.php';
$result = "";

if (isset($_POST["register"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $sql = "INSERT INTO users (firstname, lastname, username, password) VALUES (:firstname, :lastname, :username, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    
    if ($stmt->execute()) {
       $result = "Registration successful!";
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
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
			background-size:cover;
			min-height: 100vh;
			margin: 0;
			background-image: url('./image/background.png');
			object-fit:cover;
			font-family: Arial, sans-serif;
		}

		.container {
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
			
		}

		.well {
			margin-bottom: 20px;
		}

		.label1 {
			margin-bottom: 10px;
			
		}

		h3, h4, label, input, button, a {
			margin: 0;
			padding: 0;
		}

		h3 {
			margin-bottom: 40px;
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
			letter-spacing: 1px;
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

		a {
			color: #007bff;
			text-decoration: none;
			margin-buttom: 30px;
		}

		a:hover {
			text-decoration: underline;
		}

		h3.UWU{
			color:green;
			position: relative;
			top:55px
		}

		p{
			position: relative;
			bottom: 30px;
		}

		h3.uwuTitle{
			position: relative;
			top:15px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h3 class="UWU"><?php echo  $result ?></h3>
		<div class="well">
			<h3 class="uwuTitle">Registration</h3>
			<hr>
			<form action="registration.php" method="POST">
				<h4>Register here...</h4>
				<hr>
				<div class="label1">
					<label>Firstname:</label>
					<input type="text" class="form-control" name="firstname" autocomplete="off">
				</div>
				<div class="label1">
					<label>Lastname:</label>
					<input type="text" class="form-control" name="lastname" autocomplete="off">
				</div>
				<div class="label1">
					<label>Username:</label>
					<input type="text" class="form-control" name="username" autocomplete="off">
				</div>
				<div class="label1">
					<label>Password:</label>
					<input type="password" class="form-control" name="password">
				</div>
				<br>
				<div class="label1">
					<button class="button1" name="register">Register</button>
				</div>
				<br><br>
				<a href="index.php"><p>Login</p> </a>
			</form>
		</div>
	</div>
</body>
</html>
