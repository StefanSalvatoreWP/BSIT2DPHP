<?php

require 'config.php';

try {
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

function registerUser($firstName, $lastName, $email, $password, $subscribeNewsletter)
{
    global $pdo;

    try {
        $statement = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password, subscribe_newsletter) VALUES (?, ?, ?, ?, ?)");
        $statement->bindParam(1, $firstName);
        $statement->bindParam(2, $lastName);
        $statement->bindParam(3, $email);
        $statement->bindParam(4, $password);
        $statement->bindParam(5, $subscribeNewsletter);
        $statement->execute();

        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        die('Registration failed: ' . $e->getMessage());
    }
}

function loginUser($email, $password)
{
    global $pdo;

    try {
        $statement = $pdo->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
        $statement->execute([$email]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Password is correct, login successful
            return true;
        } else {
            // Invalid email or password
            return false;
        }
    } catch (PDOException $e) {
        die('Login failed: ' . $e->getMessage());
    }
}

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $subscribeNewsletter = isset($_POST['subscribeNewsletter']) ? 1 : 0;

    $userID = registerUser($firstName, $lastName, $email, $password, $subscribeNewsletter);

    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['emaillogin'];
    $password = $_POST['passwordlogin'];

    if (loginUser($email, $password)) {
        // User logged in successfully
        header('Location: dashboard.php');
        exit();
    } else {
        // Login failed
        echo 'Login failed. Please check your credentials.';
    }
}
?>
