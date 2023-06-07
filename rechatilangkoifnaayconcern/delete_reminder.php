<?php
session_start();
require("config.php");

if (!isset($_SESSION["login_info"])) {
    header("location:index.php");
    exit();
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM users WHERE ID = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        header("location:add_reminder.php");
        exit();
    }
}
?>
