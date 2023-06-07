<?php
session_start();

// Clear all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to the login page or any other desired page
header('Location: login.php');
exit();
?>
