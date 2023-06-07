<link rel="stylesheet" href="styles.css">

<?php
$servername = "localhost";
$username = "root";
$password = "root123";
$dbname = "shadow";

$update_success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE student SET fname = :value2, lname = :value3, email = :value4 WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $value2 = $_POST['fname'];
    $value3 = $_POST['lname'];
    $value4 = $_POST['email'];
    $id = $_POST['id'];
    $stmt->bindParam(':value2', $value2);
    $stmt->bindParam(':value3', $value3);
    $stmt->bindParam(':value4', $value4);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      $update_success = true;
    } else {
      $update_success = false;
    }

  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
}
?>

<div style="background-color: rgba(255,255,255,0.8); padding: 50px;">
  <h1>Update Record</h1>
  <?php if ($update_success): ?>
    <p class="successsful">Record updated <span>successfully</span> </p>
  <?php else: ?>
    <p class="unsuccessful">Record update <span>unsuccessful</span> </p>
  <?php endif; ?>
  <a href='productentry.php'>Return</a>
</div>

<style>
  body {
    margin: 0;
    padding: 0;
    background: url('background1.jpg') no-repeat center center fixed;
    background-size: cover;
  }
</style>
