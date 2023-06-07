<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $datetime = date('Y-m-d H:i:s');
    $description = $_POST['description'];

    include_once('connection.php');

    $database = new Connection();
    $db = $database->open();

    try {
        $sql = "INSERT INTO reminder (title, date_time, description) VALUES (:title, :date_time, :description)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':date_time', $datetime);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
        
        $_SESSION['message'] = "Reminder created successfully!";
        header("Location: view_reminder.php?success=1");
        exit();
    } catch (PDOException $e) {
        $_SESSION['message'] = "There is some problem in connection: " . $e->getMessage();
        header("Location: view_reminder.php");
        exit();
    }
}

$database->close($db);
