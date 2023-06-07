<!DOCTYPE html>
<html>
<head>
  <title>User Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <title>Bootstrap Example</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <h2>USER REGISTRATION</h2>
  <a class="goBack no-text-decoration" href="home.php"><button type="button" class="btn btn-secondary mb-3"> Go Back</button></a><br>
  <?php
  require("config.php");

  if(isset($_POST['submit'])){
    $ANAME = $_POST['ANAME'];
    $APASS = $_POST['APASS'];

    $check_query = "SELECT * FROM admin WHERE ANAME = :ANAME";
    $stmt = $pdo->prepare($check_query);
    $stmt->bindParam(':ANAME', $ANAME);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      echo "Username or email already exists. Please choose a different one.";
    } else {
      $sql = "INSERT INTO admin (ANAME, APASS) VALUES (:ANAME, :APASS)";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':ANAME', $ANAME);
      $stmt->bindParam(':APASS', $APASS);

      if ($stmt->execute()) {
        echo "You're Successfully Sign Up!";
      } else {
        echo "Error: " . $stmt->errorInfo()[2];
      }
    }
  }
  ?>
  
  <form method="POST" action="">
    <label for="username">Username:</label>
    <input type="text" name="ANAME" required><br><br>
      
    <label for="password">Password:</label>
    <input type="password" name="APASS" required><br><br>
    
    <input type="submit" name="submit" value="Register">
  </form>
</body>
</html>
