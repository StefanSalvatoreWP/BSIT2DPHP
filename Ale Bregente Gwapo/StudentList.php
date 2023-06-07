<?php
    require_once('student.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
      
    </style>
</head>
<body>
    <div class="navBar">
        <div class="navbarLogo">
<p>© 2023 All rights reserved.</p>
            <img class="removedProjectX" src="./img/ProjectXremove.png" alt="">
        </div>
        <ul>
            
        </ul>
    </div>
    <div class="addContainer">
<h1 class="addEmployee" id="employeeLink">Add Employee</h1>
</div>
    <div class="studentSidebar">
    <img class="phpLogo" src="./img/phplogo.png" alt="" srcset=""><p>Mysql</p>
    <img class="phpLogo" src="./img/javascript logo.png" alt="" srcset=""><p>Javascript</p>
        <div class="logoDiv">
        <h1 class="h1Project">Project <span> X </span></h1>
        </div>
     
        <ul>
            <li><a href="StudentList.php">Student List</a></li>
            <li><a href="testdb.php">Test Database</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="#">FAQS</a></li>
        </ul>
    </div>
    <div class='tblStudent'>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
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
    <form class="studentForm hidden" action="studentroute.php" method='POST'>
        <label for="">
            <input type="text" class="studentFormInput" name='firstname' autocomplete="off" placeholder="First name">
        </label><br>
        <label for="">
            <input type="text" class="studentFormInput"  name='lastname' autocomplete="off" placeholder="Last name">
        </label><br>
        <label for="">
            <input type="text" class="studentFormInput"  name='age' autocomplete="off" placeholder="Age">
        </label>
        <input class="studentSubmit" type="submit" name='submit' value='Save'>
    </form>
   
    <script src="main.js">
    </script>
</body>
</html>
