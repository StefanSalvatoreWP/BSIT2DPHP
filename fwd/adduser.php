<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add User</title>
  </head>
  <body>
    <h2>Add User</h2>
    <form autocomplete="off" action="function.php" method="post">
      <label for="">Name</label>
      <input type="text" id="name" name="name" value=""> <br>
      <label for="">Email</label>
      <input type="text" id="email" name="email" value=""> <br>
      <label for="">Gender</label>
      <select class="" id="gender" name="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select> <br>
      <button type="submit">Insert</button>
      <input type="hidden" name="action" value="insert">
    </form>
    <br>
    <a href="index.php">Go To Index</a>
  </body>
</html>
