<?php
session_start();

// Database configuration
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'root123';
$dbName = 'voltes';

// Create a new PDO instance
$pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUsername, $dbPassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Check if the user is logged in
function checkLogin() {
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit();
    }
}

// Process logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit();
}

// Update contact in the database
if (isset($_POST['update'])) {
    checkLogin();

    $contactId = $_POST['contact_id'];
    $contactName = $_POST['contact_name'];
    $telNumber = $_POST['tel_number'];
    $address = $_POST['address'];
    $relation = $_POST['relation'];

    $stmt = $pdo->prepare("UPDATE contacts SET contact_name = ?, tel_number = ?, address = ?, relation = ? WHERE id = ? AND username = ?");
    $stmt->execute([$contactName, $telNumber, $address, $relation, $contactId, $_SESSION['username']]);

    header('Location: add_contact.php');
    exit();
}

// Retrieve contact details for pre-filling the form
if (isset($_GET['contact_id'])) {
    checkLogin();

    $contactId = $_GET['contact_id'];
    $stmt = $pdo->prepare("SELECT * FROM contacts WHERE id = ? AND username = ?");
    $stmt->execute([$contactId, $_SESSION['username']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$contact) {
        // Contact not found, redirect to add_contact.php or display an error message
        header('Location: add_contact.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Contact</title>
</head>
<body>
<h2>Update Contact</h2>
    <form method="post" action="update_contact.php">
        <?php if (isset($contact)): ?>
            <input type="hidden" name="contact_id" value="<?php echo $contact['id']; ?>">
            <label for="contact_name">Contact Name:</label>
            <input type="text" id="contact_name" name="contact_name" value="<?php echo $contact['contact_name']; ?>" required><br><br>
            <label for="tel_number">Telephone Number:</label>
            <input type="tel" id="tel_number" name="tel_number" value="<?php echo $contact['tel_number']; ?>" required><br><br>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo $contact['address']; ?>" required><br><br>
            <label for="relation">Relation:</label>
            <input type="text" id="relation" name="relation" value="<?php echo $contact['relation']; ?>" required><br><br>
            <input type="submit" name="update" value="Update">
        <?php else: ?>
            <p>Contact not found.</p>
        <?php endif; ?>
    </form>
</body>
</html>
