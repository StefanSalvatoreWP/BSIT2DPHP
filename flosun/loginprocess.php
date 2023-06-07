<?php
// Include the config file
require_once 'config.php';

// Start a session
session_start();

try {
    // Create a new PDO connection
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Get form data
    $firstNameLogin = $_POST['firstNameLogin'];
    $passwordLogin = $_POST['passwordLogin'];
    
    // Prepare the SQL statement
    $sql = "SELECT firstName FROM users WHERE firstName = ? AND password = ?";
    
    // Prepare the statement
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(1, $firstNameLogin);
    $stmt->bindParam(2, $passwordLogin);
    
    // Execute the statement
    $stmt->execute();
    
    // Check if a matching user is found
    if ($stmt->rowCount() > 0) {
        // Fetch the first name
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $firstName = $row['firstName'];
        
        // Store the first name in a session variable
        $_SESSION['firstName'] = $firstName;
        
        // Redirect to the index page
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid login credentials.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo = null;
?>
