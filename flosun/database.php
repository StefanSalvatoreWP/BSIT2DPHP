<?php
// Include the config file
require_once 'config.php';

try {
    // Create a new PDO connection
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Prepare the SQL statement
    $sql = "INSERT INTO users (firstName, lastName, password) VALUES (?, ?, ?)";
    
    // Prepare the statement
    $stmt = $pdo->prepare($sql);
    
    // Get form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $password = $_POST['password'];
    
    // Bind parameters
    $stmt->bindParam(1, $firstName);
    $stmt->bindParam(2, $lastName);
    $stmt->bindParam(3, $password);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo = null;
?>
