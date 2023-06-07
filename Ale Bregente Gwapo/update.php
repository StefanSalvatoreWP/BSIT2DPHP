<!DOCTYPE html>
<html>
<head>
	<title>Update Student</title>
	<link rel="stylesheet" href="style.css">
</head>
<body class="updateBody">
	<h2>Update Student</h2>

	<?php
		require_once('student.php');

		$id = $_GET['student_id'];
		$myStudent = new Student();
	?>

	<form class="updateForm" action="studentroute.php" method="post">
		<input type="hidden" name="student_id" value="<?php echo $id; ?>">
		<label for="firstname">First Name:</label>
        <input type="text" name="firstname" value=""><br>
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" value=""><br>
		<label for="age">Age:</label>
		<input class="ageInput" type="number" name="age" value=""><br>
		<input type="submit" class="updateSubmit" name="submit" value="Update">
	</form>
</body>
</html>
