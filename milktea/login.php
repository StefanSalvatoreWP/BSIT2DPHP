<?php
require 'connect.php';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo "Login successful!";
        header('location: index1.php');
    exit;

    } else {
        echo "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .form{
    margin-top: 5%;
    border-radius: 20px;
   padding: 25px;
   border: 2px solid rgba(255, 255, 255, .5);
   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
   backdrop-filter: blur(20px);
   background: transparent;
   border-radius: 10px;
   justify-content: center;
   position: relative;
   width: 400px;
   padding: 20px;
}
.form input{
    width: 240px;
    height: 35px;
    background: transparent;
    border-top: none;
    border-right: none;
    border-left: none;
    font-size: 15px;
    letter-spacing: 1px;
    margin-top: 30px;
    font-family: sans-serif;
}
.btnn{
    width: 240px;
    height: 40px;
    border: none;
    margin-top: 30px;
    font-size: 18px;
    background: linear-gradient(45deg, #d6292900,#ff7782da);
    border-radius: 12px;
}
.btnn:hover{
    background: rgba(218, 32, 32, 0.062);
    color: linear-gradient(45deg, #fe87872f,#ff778236);
}
.btn{
    background: linear-gradient(45deg, #fe878700,#ff7782da);
}
.btn:hover{
    background: rgba(221, 9, 55, 0.068);
    color: linear-gradient(45deg, #fe878700,#ff7782da);
    
}




</style>



<body>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <center>
            <div class="form">
                <h2>Member Login</h2>
                <input type="text" name="username" placeholder="Username"><br>
                <input type="password" name="password" placeholder="Password"><br>
                <button class="btnn" name="login"><Label>Login</Label></button>
            </div>
            </center>
        </form> 
</body>
</html>