<?php
function number_suffix($number)
{
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number % 100) <= 13)) {
        return $number . 'th';
    } else {
        return $number . $ends[$number % 10];
    }
}

$notifications = [];
$current_month_day = date("m-d");
$sql = "SELECT * FROM users WHERE DATE_FORMAT(DOB, '%m-%d') = :current_month_day";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':current_month_day', $current_month_day);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $age = (date("Y") - date("Y", strtotime($row["DOB"]))) + 1;
        $notifications[] = "<i class='fa fa-bell'></i> Wish <b>{$row["NAME"]}</b> a Happy Birthday!<br> This is <b>{$row["NAME"]}</b>'s " . number_suffix($age) . " Birthday. date of birth is <b>" . date("d-m-Y", strtotime($row["DOB"])) . "</b>";
    }
}
?>
<link rel="stylesheet" href="style.css">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand position-relative" href="home.php">Simple Birthday Reminder</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="home.php"><span class='fa fa-user'></span> Welcome : <?php echo $_SESSION["login_info"]["ANAME"]; ?> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="home.php"><span class='fa fa-home'></span> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add_reminder.php"><span class='fa fa-plus'></span> Add Reminder</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="true">
                    <span class='fa fa-bell'></span>(<?php echo count($notifications); ?>)
                </a>
                <?php if (count($notifications) > 0): ?>
                    <div class="dropdown-menu dropdown-menu-right p-2" aria-labelledby="navbarDropdown">
                        <?php foreach ($notifications as $row): ?>
                            <a class="dropdown-item pt-3 pb-3 alert alert-success" href="#"><?php echo $row; ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
