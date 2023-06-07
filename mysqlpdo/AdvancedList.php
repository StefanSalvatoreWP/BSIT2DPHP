<?php
    require_once('advancedStudent.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Advanced List</title>
    <script>
      function validateInput(input) {
  let isValid = input.value.length <= 15 && input.value.length >= 4;

  if (isValid && input.value !== "") {
    input.classList.remove("invalidInput");
    input.classList.add("validInput");
  } else if (!isValid && input.value !== "") {
    input.classList.remove("validInput");
    input.classList.add("invalidInput");
  } else {
    input.classList.remove("validInput");
    input.classList.remove("invalidInput");
  }
}

function validateInputNumber(input) {
  let isValid = input.value.length <= 15 && input.value.length >= 1 && !isNaN(input.value);

  if (isValid && input.value !== "") {
    input.classList.remove("invalidInput");
    input.classList.add("validInput");
  } else if (!isValid && input.value !== "") {
    input.classList.remove("validInput");
    input.classList.add("invalidInput");
  } else {
    input.classList.remove("validInput");
    input.classList.remove("invalidInput");
  }
}
</script>


</head>
<body class="advancedcontainerMain">
    <form class="advancedstudentContainer" action="advancedStudentRoute.php" method='POST'>
        <h1 class="advancedH1">ADD A NEW STUDENT</h1>
        <input class="advancedInput" type="text" name='firstname' autocomplete="off" placeholder="First name" maxlength="10" oninput="validateInput(this)">
<input class="advancedInput" type="text" name='lastname' autocomplete="off" placeholder="Last name" maxlength="10" oninput="validateInput(this)">
<input class="advancedInput" type="text" name='age' autocomplete="off" placeholder="Age" maxlength="3" oninput="validateInputNumber(this)">
<input class="advancedInput" type="text" name='address' autocomplete="off" placeholder="address" maxlength="15" oninput="validateInput(this)">
<input class="advancedInput" type="text" name='contact' autocomplete="off" placeholder="contact" maxlength="11" oninput="validateInputNumber(this)">
<input class="advancedInput" type="text" name='nationality' autocomplete="off" placeholder="nationality" maxlength="15" oninput="validateInput(this)">
<input class="advancedInput" type="text" name='gender' autocomplete="off" placeholder="gender" maxlength="15" oninput="validateInput(this)">
<input class="advancedInput" type="text" name='status' autocomplete="off" placeholder="status" maxlength="15" oninput="validateInput(this)">
<input class="advancedInput" type="text" name='year' autocomplete="off" placeholder="year" maxlength="15" oninput="validateInput(this)">
<input class="saveButton" type="submit" name='submit' value='Save'>
          <a href="StudentList.php" class="advancedLink">
            <div href="StudentList.php" class="newadvanceContainer">
            <img id="rocket-img" class="advanceIcon" src="./img/advancement.png" alt="" srcset="">
            <p>Go to Standard Menu</p>
        </div> </a>
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

    <div class='advancedtableStudent'>
        <table>
        <h1 class="advancedStudentList">ADVANCED STUDENT LIST</h1>
            <thead>
                <tr>
                    <th class="thIDadvanced">Student ID</th>
                    <th class="advancedTH">First Name</th>
                    <th class="advancedTH">Last Name</th>
                    <th class="thAge">Age</th>
                    <th class="advancedTH">Address</th>
                    <th class="advancedTH">Contact</th>
                    <th class="advancedTH">Nationality</th>
                    <th class="advancedTH">Gender</th>
                    <th class="advancedTH">Status</th>
                    <th class="advancedTH">Year</th>
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
 
  
</body>
</html>