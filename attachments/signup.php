<?php
    require_once('config.php');
    require_once('contacts.php');

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = new contacts();

        $result = $db->savecontacts($username, $password);

        if($result == 1){
            echo "User registered successfully!";
        }
        else{
            echo "Failed to register user.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <h2>Sign Up</h2>
    <form method="post" action="signup.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" name="submit" value="Sign Up">
    </form>
    <a href="login.php"> <button>Signup</button></a>
</body>
</html>
