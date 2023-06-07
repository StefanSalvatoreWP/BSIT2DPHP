<?php
    require_once('student.php');

    $pr = isset($_GET['student_id']) ? $_GET['student_id'] : '';
     ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>
<body>
    <p>
       You want to delete this student?
        <strong>
            <?php
                echo $pr;
            ?>
        </strong>
    </p>
    <form action="studentroute.php" method="POST">
        <input type="hidden" name="student_id" value="<?php echo $pr; ?>">
        <input type="submit" name="submit" value="Delete">
    </form>
</body>
</html>
