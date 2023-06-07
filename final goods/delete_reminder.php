<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['reminder_id'])) {
        $reminderId = $_POST['reminder_id'];

        include_once('connection.php');

        $database = new Connection();
        $db = $database->open();

        try {
            $sql = "DELETE FROM reminder WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $reminderId);
            $stmt->execute();

            $_SESSION['message'] = "Reminder deleted successfully!";
        } catch (PDOException $e) {
            $_SESSION['message'] = "There is some problem in connection: " . $e->getMessage();
        }

        $database->close($db);
    }
}

header('Location: view_reminder.php');
exit;
?>
