<?php
    require_once('student.php');
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
<body class="containerMain">
    <form class="studentContainer" action="studentroute.php" method='POST'>
        <h1>ADD A NEW STUDENT</h1>
     <input type="text" name='firstname' autocomplete="off" placeholder="First name">
        <input type="text" name='lastname' autocomplete="off" placeholder="Last name">
         <input type="text" name='age' autocomplete="off" placeholder="Age">
          <input class="saveButton" type="submit" name='submit' value='Save'>
          <a href="AdvancedList.php"><div class="advanceContainer">
            <img id="rocket-img" class="advanceIcon" src="./img/advancement.png" alt="" srcset="">
            <p>Go to Advanced Menu</p>
        </div> </a>
    </form>
    <form method="post">
</form>
    <div class="developerTeam">
            <h1>Developers</h1>
            <img class="developerIcon" src="./img/john ryan.jpg" alt="" srcset="">
            <img class="developerIcon" src="./img/franzel.png" alt="" srcset="">
            <img class="developerIcon" src="./img/edgilyn gapo.jpg" alt="" srcset="">
            <p>Frontend</p>
            <p>Backend</p>
            <p>Front/Back</p>
            <img class="developerPHP" src="./img/phpmysql.png" alt="" srcset="">
            <p class="poweredPHP">POWERED BY: PHP MYSQL</p>

            <img class="developerFacebook" src="./img/facebook.png" alt="" srcset="">
            <img class="developerFacebook" src="./img/facebook.png" alt="" srcset="">
            <img class="developerFacebook"  src="./img/facebook.png" alt="" srcset="">
        </div>
        <div class="developerNameContent">
           <p class="developerFacebookName">John Ryan Inoc</p>
            <p class="developerFacebookName">Franzel Mangubat</p>
            <p class="developerFacebookName">Edgilyn Gapo</p>
        </div>

    <div class='tableStudent'>
        <table>
        <h1>STUDENT LIST</h1>
            <thead>
                <tr>
                    <th class="thID">Student ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th class="thAge">Age</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $studentlist = new Student();
                    echo $studentlist->getAllStudents();
                ?>
            </tbody>
        </table>
    </div>
    <form class="resetContainer" action="studentroute.php" method='POST'>
        <button type="submit" name="submit" value="Reset">Reset</button>
    </form>
  
</body>
</html>