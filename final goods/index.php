<?php
// Assuming you have already established a database connection
// Replace the database credentials with your own
$servername = "localhost";
$username = "root";
$password = "root123";
$dbname = "final";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Create a new PDO instance
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Prepare the SQL statement to insert the reminder
    $sql = "INSERT INTO reminder (title, date_time, description) VALUES (:title, :datetime, :description)";

    // Get the form values
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $datetime = isset($_POST['datetime']) ? $_POST['datetime'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';

    // Prepare the statement
    $stmt = $db->prepare($sql);

    // Bind the values
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':datetime', $datetime);
    $stmt->bindParam(':description', $description);

    // Execute the statement
    if ($stmt->execute()) {
        // Successful insertion
        header('Location: create_reminder.php?success=1');
        exit();
    } else {
        // Failed insertion
        echo "Error: " . $stmt->errorInfo()[2];
        // You may handle the error gracefully and display an error message to the user
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Reminder</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>REMINDER</h1>
        <?php
        if (isset($_GET['success'])) {
            echo '<p class="success-message">Reminder created successfully!</p>';
        }
        ?>
        <form action="add_reminder.php" method="POST">
            <div class="form-group">
                <label for="title">TITLE:</label>
                <input type="text" name="title" id="title" required>
            </div>

            <div class="form-group">
                <label for="datetime">DATE & TIME:</label>
                <input type="datetime-local" name="datetime" id="datetime" required>
            </div>

            <div class="form-group">
                <label for="description">DESCRIPTIONS:</label><br>
                <textarea name="description" id="description" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">CREATE</button>
            </div>
        </form>

        <p>View all reminders lists <a href="view_reminder.php">CLICK HERE</a></p>
    </div>
</body>
</html>
