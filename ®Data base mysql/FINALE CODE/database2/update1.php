<?php
$servername = "localhost";
$username = "root";
$password = "";
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
<center>
<br><br><br><br><br><br><br><br>
<?php if ($update_success): ?>
  <h1>Record updated successfully</h1>
<?php else: ?>
  <h1>Record update unsuccessful</h1>
<?php endif; ?>
<br>
<a href='productentry.php'>Return</a>
</center>

<style>
        body{
            padding: 50px 0;
            text-align: center;
            background: url('background1.jpg') no-repeat;
            background-size: cover;
            background-position: center;
        }
</style>
