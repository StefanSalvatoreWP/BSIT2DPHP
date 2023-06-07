<!DOCTYPE html>
<html  class="updateContent">
<head>
	<title>Update Student</title>
	<link rel="stylesheet" href="main.css">
</head>
<body class="updateBody">


	<?php
		require_once('student.php');

		$id = $_GET['student_id'];
		$myStudent = new Student();
		$student = $myStudent->getStudentById($id);
	?>

	<form class="updateformContainer" action="studentroute.php" method="post">
	<div class="updateBackContainer" >
	<a href="StudentList.php">
	<img class="updateBack" src="./img/arrow.png" alt="" srcset=""><p>Back</p> 
	</a> 
	</div>
	<h2>Update Student</h2>
		<input type="hidden" name="student_id" value="<?php echo $id; ?>">
		<label for="firstname">First Name:</label>
        <input class="inputFirstName"  type="text" name="firstname" value="<?php echo $student['first_Name']; ?>"><br>
        <label for="lastname">Last Name:</label>
        <input class="inputLastName" type="text" name="lastname" value="<?php echo $student['last_Name']; ?>"><br>
		<label class="inputAge"  for="age" >Age:</label>
		<input class="updateAge" type="number" name="age" value="<?php echo $student['age']; ?>"><br>
		<input class="updateSubmit" type="submit" name="submit" value="Update">
	</form>
</body>
</html>
