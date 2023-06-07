<?php
    session_start();

    if (isset($_SESSION['username'])) {
        header("Location: index.php");
        exit;
    }

    require_once('config.php');
    require_once('contacts.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $contacts = new contacts();

        if ($contacts->getState() == 1) {

            $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
            $stmt = $contacts->db_con->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $_SESSION['username'] = $username;
                header('Location: index.php');
                exit; 
            } else {
                $login_error = "Invalid username or password!";
            }
        } else {
            $login_error = "Database connection error: " . $contacts->getErrMsg();
        }
    }
?>



<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h2>Login</h2>
	<form method="post" action="login.php">
		<label>Username:</label>
		<input type="text" name="username"><br><br>
		<label>Password:</label>
		<input type="password" name="password"><br><br>
		<input type="submit" name="submit" value="Login">
	</form>
    <a href="signup.php"> <button>Signup</button></a>
</body>
</html>