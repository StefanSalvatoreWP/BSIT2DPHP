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

// Process login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username exists in the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Verify the password
        if ($password === $user['password']) {
            $_SESSION['username'] = $username;
            header('Location: add_contact.php');
            exit();
        } else {
            $loginError = 'Invalid password.';
        }
    } else {
        $loginError = 'Invalid username.';
    }
}
// Process logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit();
}

// Add contact to the database
if (isset($_POST['submit'])) {
    checkLogin();

    $contactName = $_POST['Contact_Name'];
    $telNumber = $_POST['Tel_Number'];
    $address = $_POST['Address'];
    $relation = $_POST['Relation'];

    $stmt = $pdo->prepare("INSERT INTO contacts (contact_name, tel_number, address, relation, username) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$contactName, $telNumber, $address, $relation, $_SESSION['username']]);

    header('Location: add_contact.php');
    exit();
}

// Delete contact from the database
if (isset($_GET['delete'])) {
    checkLogin();

    $contactId = $_GET['delete'];

    $stmt = $pdo->prepare("DELETE FROM contacts WHERE id = ? AND username = ?");
    $stmt->execute([$contactId, $_SESSION['username']]);

    header('Location: add_contact.php');
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

// Retrieve contacts from the database
checkLogin();

$stmt = $pdo->prepare("SELECT * FROM contacts WHERE username = ?");
$stmt->execute([$_SESSION['username']]);
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact</title>
    <script src="Search.js"></script>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <?php if (isset($_SESSION['username'])): ?>
        <!-- User is logged in -->
        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <a href="add_contact.php?logout=1">Logout</a>

        <form action="" method="POST">
            <label for="Contact_Name">Contact Name:</label>
            <input type="text" name="Contact_Name" id="Contact_Name">
            <label for="Tel_Number">Tel Number:</label>
            <input type="text" name="Tel_Number" id="Tel_Number">
            <label for="Address">Address:</label>
            <input type="text" name="Address" id="Address">
            <label for="Relation">Relation:</label>
            <input type="text" name="Relation" id="Relation">
            <br>
            <input hidden type="text" name="hidden_value" id="hidden_value" value="Save">
            <input type="submit" name="submit" value="Add to Contacts">
        </form>

        <div class="tbl-contacts">
            <table>
                <thead>
                    <tr>
                        <th>Contact Name</th>
                        <th>Tel Number</th>
                        <th>Address</th>
                        <th>Relation</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contacts as $contact): ?>
                        <tr>
                            <td><?php echo $contact['contact_name']; ?></td>
                            <td><?php echo $contact['tel_number']; ?></td>
                            <td><?php echo $contact['address']; ?></td>
                            <td><?php echo $contact['relation']; ?></td>
                            <td>
                                <a href="update_contact.php?id=<?php echo $contact['id']; ?>">Edit</a>
                                <a href="add_contact.php?delete=<?php echo $contact['id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br>
            <div class="center">
                <input type="text" id="search" onkeyup="searchTask()" placeholder="Search Contact">
            </div>
        </div>
    <?php else: ?>
        <!-- User is not logged in -->
        <h2>Login</h2>
        <?php if (isset($loginError)): ?>
            <p><?php echo $loginError; ?></p>
        <?php endif; ?>
        <form action="" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            <input type="submit" name="login" value="Login">
        </form>
    <?php endif; ?>
</body>
</html>
