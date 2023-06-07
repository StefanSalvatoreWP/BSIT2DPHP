<?php
    require_once('advancedStudent.php');

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
<body class="advancedDelete">
    <div class="deleteContainer" id="delete-form">
        
        <div class="deleteBackContainer"> 
            
       <a href="AdvancedList.php"> <img class="deleteBack" src="./img/arrow.png" alt="" srcset="">
        <p class="deleteP">Back</p>
       </a>
    </div>
       
    <p>
      Are you sure? you want to delete this student that has an id of? 
        <strong>
            <?php
                echo $pr;
            ?>
        </strong>
       <p>if you delete this it cannot be undone.</p> 
    </p>
    <form action="AdvancedStudentRoute.php" method="POST">
        <input type="hidden" name="student_id" value="<?php echo $pr; ?>">
        <input type="hidden" name="first_Name" value="<?php echo $fn; ?>">
        <input type="submit" name="submit" value="Delete">
    </form>
    </div>
    
</body>
</html>
