<!DOCTYPE html>
<html  class="updateContent">
<head>
	<title>Update Student</title>
	<link rel="stylesheet" href="main.css">
</head>
<body class="advancedBody">


	<?php
		require_once('advancedStudent.php');

		$id = $_GET['student_id'];
		$myStudent = new Student();
		$student = $myStudent->getStudentById($id);
	?>

	<form class="advancedupdateformContainer" action="advancedStudentRoute.php" method="post">
	<div class="updateBackContainer" >
	<a href="AdvancedList.php">
	<img class="updateBack" src="./img/arrow.png" alt="" srcset=""><p>Back</p> 
	</a> 
	</div>
	<h2 class="advancedH2">Update Student</h2>
		<input type="hidden" name="student_id" value="<?php echo $id; ?>" autocomplete="off">
		<label for="firstname">First Name:</label>
        <input class="inputFirstName"  type="text" name="firstname" value="<?php echo $student['first_Name']; ?>" autocomplete="off"><br>
        <label for="lastname">Last Name:</label>
        <input class="inputLastName" type="text" name="lastname" value="<?php echo $student['last_Name']; ?>" autocomplete="off"><br>
		<label class="inputAge"  for="age" >Age:</label>
		<input class="updateAge" type="text" name="age" value="<?php echo $student['age']; ?>" autocomplete="off"><br>
        <label for="address">Address:</label>
        <input class="columnaddress" type="text" name="address" value="<?php echo $student['address']; ?>" autocomplete="off"><br>
        <label for="contact">Contact:</label>
        <input class="columncontact" type="text" name="contact" value="<?php echo $student['contact']; ?>" autocomplete="off"><br>
        <input class="updateSubmit" type="submit" name="submit" value="Update">
        <div class="column1">
        <label for="nationality">Nationality:</label>
        <input class="columnnationality" type="text" name="nationality" value="<?php echo $student['nationality']; ?>" autocomplete="off"><br>
        <label for="gender">Gender:</label>
        <input class="columngender" type="text" name="gender" value="<?php echo $student['gender']; ?>" autocomplete="off"><br>
        <label for="status">Status:</label>    
        <input class="columnstatus" type="text" name="status" value="<?php echo $student['status']; ?>" autocomplete="off"><br>
        <label for="year">Year:</label>
        <input class="columnyear" type="text" name="year" value="<?php echo $student['year']; ?>" autocomplete="off"><br>
        </div>
		
	</form>
</body>
</html>
