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
