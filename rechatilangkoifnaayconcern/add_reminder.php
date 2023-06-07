<?php 
	session_start();
	require("config.php");
	
	if(!isset($_SESSION["login_info"])){
		header("location:index.php");
	}

	if (isset($_GET["id"])) {
		$id = $_GET["id"];
	
		$sql = "DELETE FROM users WHERE ID = :id";
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':id', $id);
	
		if ($stmt->execute()) {
			header("location: add_reminder.php");
			exit();
		} else {
			echo "<div class='alert alert-danger'>Failed to delete the reminder. Please try again.</div>";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Reminder</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
	<title>Bootstrap Example</title>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class='container mt-4'>
		<div class='row'>
			<div class='col-md-4'>
				<h3 class='text-muted text-center'>ADD DETAILS</h3>
				<?php 
					if(isset($_POST["reg"])){
						$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
						$name = $_POST["name"];
						$email = $_POST["email"];
						$dob = date("Y-m-d", strtotime($_POST["dob"]));
						
						$sql = "INSERT INTO users (NAME, EMAIL, DOB, WISH_YEAR) VALUES (:name, :email, :dob, '-')";
						$stmt = $pdo->prepare($sql);
						$stmt->bindParam(':name', $name);
						$stmt->bindParam(':email', $email);
						$stmt->bindParam(':dob', $dob);

						if ($stmt->execute()) {
							echo "<div class='alert alert-success'>Added Success</div>";
						} else {
							echo "<div class='alert alert-danger'>Failed Try Again</div>";
						}
					}
				?>
				<form action='add_reminder.php' method='post' autocomplete='off'>
				
				<a class="goBack no-text-decoration" href="home.php"><button type="button" class="btn btn-secondary"> Go Back</button></a>
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control"  name='name' placeholder="Name" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name='email' placeholder="Email" required>
					</div>
					<div class="form-group">
						<label>Date Of Birth</label>
						<input type="text" class="form-control datepicker" name='dob' placeholder="dd-mm-yyyy" required>
					</div>
					<div class="form-group">
						<input type='submit' name='reg' value='Submit' class='btn btn-primary'>
					</div>
				</form>
			</div>
			<div class='col-md-8'>
				<table class='table table-bordered mt-5'>
					<thead>
						<tr>
							<td>S.No</td>
							<td>Name</td>
							<td>Email</td>
							<td>DOB</td>
							<td>Delete</td>
						</tr>
					</thead>
					<tbody>
						<?php 
							$sql = "SELECT * FROM users ORDER BY ID DESC";
							$stmt = $pdo->query($sql);
							$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
							if (count($rows) > 0) {
								$i = 0;
								foreach ($rows as $row) {
									$i++;
									echo "
										<tr>
											<td>{$i}</td>
											<td>{$row["NAME"]}</td>
											<td>{$row["EMAIL"]}</td>
											<td>" . date("d-m-Y", strtotime($row["DOB"])) . "</td>
											<td><a href='add_reminder.php?id={$row["ID"]}' class='btn btn-danger'>Delete</a></td>
										</tr>";
								}
							} else {
								echo "
									<tr>
										<td colspan='5' class='text-center'>No records found</td>
									</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
