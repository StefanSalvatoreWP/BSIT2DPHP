<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $datetime = date('Y-m-d H:i:s') ;
    $description = $_POST['description'];

    // Perform validation or additional processing as needed

    include_once('connection.php');

    $database = new Connection();
    $db = $database->open();

    try {
        $date_time = $date_time;
        $sql = "INSERT INTO reminder (title, date_time, description) VALUES (:title, :date_time, :description)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':date_time', $date_time);
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

    $database->close($db);
}
    $year=2012; $month=2; $day=27;
    $hour=22; $minute=44; $second=58;

    $sql="SELECT something FROM something WHERE datecolumn>='$year-$month-$day $hour:$minute:$second'";

?>
