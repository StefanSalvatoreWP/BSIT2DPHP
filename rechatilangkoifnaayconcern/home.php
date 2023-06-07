<?php
session_start();
require("config.php");

if (!isset($_SESSION["login_info"])) {
    header("location:index.php");
    exit();
}

$users = [];
$current_month_day = date("m-d");
$current_year = date("Y");


$sql = "SELECT * FROM users WHERE DATE_FORMAT(DOB, '%m-%d') = :current_month_day AND WISH_YEAR <> :current_year";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':current_month_day', $current_month_day);
$stmt->bindParam(':current_year', $current_year);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


foreach ($users as $user) {

}


$reminders = [];
$sql = "SELECT * FROM users";
$stmt = $pdo->prepare($sql);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $reminders = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include "header.php";?>
    <body>
		<link rel="stylesheet" href="style.css">
        <?php include "navbar.php"; ?>
        <div class='container mt-4'>
            <div class='row'>
                <div class='col-md-4'>
                    <div class="d-flex justify-content-between mb-5 ml-20">
                        <?php foreach ($notifications as $row): ?>
                            <div class="alert alert-primary pt-4 pb-4" href="#"><?php echo $row; ?></div>
                        <?php endforeach; ?>
						<a href="logout.php" class="logoutmain btn btn-danger">Logout</a>
                    </div>
                </div>
                <div class='col-md-8'>
                    <div class="jumbotron">
                        <h1 class="display-4">Birthday Reminder</h1>
                        <hr class="my-4">
                        <p class="lead">"Don't forget to celebrate your special day! Happy birthday!"</p>
                    </div>
                    <h3 class='text-muted'>Reminders:</h3>
                    <?php if (count($reminders) > 0): ?>
                        <table class='table table-bordered mt-3'>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date of Birth</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reminders as $reminder): ?>
                                    <tr>
                                        <td><?php echo $reminder["NAME"]; ?></td>
                                        <td><?php echo $reminder["EMAIL"]; ?></td>
                                        <td><?php echo date("d-m-Y", strtotime($reminder["DOB"])); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>No reminders found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </body>
</html>
