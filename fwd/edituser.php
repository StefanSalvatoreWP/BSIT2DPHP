<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit User</title>
  </head>
  <body>
    <h2>Edit User</h2>
    <form autocomplete="off" action="function.php" method="post">
      <?php
      require 'config.php';
      $id = $_GET["id"];
      $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      ?>
      <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
      <label for="">Name</label>
      <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>"> <br>
      <label for="">Email</label>
      <input type="text" id="email" name="email" value="<?php echo $row['email']; ?>"> <br>
      <label for="">Gender</label>
      <select class="" id="gender" name="gender">
        <option value="Male" <?php if($row["gender"] == "Male") echo "selected"; ?>>Male</option>
        <option value="Female" <?php if($row["gender"] == "Female") echo "selected"; ?>>Female</option>
      </select> <br>
      <button type="submit">Edit</button>
      <input type="hidden" name="action" value="edit">
    </form>
    <br>
    <a href="index.php">Go To Index</a>
  </body>
</html>
