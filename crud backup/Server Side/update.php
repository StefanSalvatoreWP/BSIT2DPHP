<!DOCTYPE html>
<html>
<head>
	<title>Update Student</title>
</head>
<body>
	<h2>Update Student</h2>

	<?php
		require_once('student.php');

		$id = $_GET['student_id'];
		$myStudent = new Student();
		$student = $myStudent->getStudentById($id);
	?>

	<form action="studentroute.php" method="post">
		<input type="hidden" name="student_id" value="<?php echo $id; ?>">
		<label for="firstname">First Name:</label>
        <input type="text" name="firstname" value="<?php echo $student['first_Name']; ?>"><br>
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" value="<?php echo $student['last_Name']; ?>"><br>
		<label for="age">Age:</label>
		<input type="number" name="age" value="<?php echo $student['age']; ?>"><br>
		<input type="submit" name="submit" value="Update">
	</form>
</body>
</html>
