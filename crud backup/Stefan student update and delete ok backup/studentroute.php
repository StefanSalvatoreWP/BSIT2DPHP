<?php
require_once('student.php');

$page = $_POST['submit'];

if ($page == "Save") {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $age = $_POST['age'];
    $studentlist = array("firstname"=>$firstName, "lastname"=>$lastName, "age"=>$age); 

    $myStudent = new Student();
    $ret = $myStudent->saveStudent($studentlist);
    header('location:studentList.php');
} else if ($page == "Delete") {
    $studentlist = $_POST['student_id'];
    $myStudent = new Student();
    $ret = $myStudent->deleteStudent($studentlist);
    header('location:studentList.php');
} else if ($page == "Update") {
    $id = $_POST['student_id'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $age = $_POST['age'];
    $myStudent = new Student();
    $ret = $myStudent->updateStudent(array(
        "student_id" => $id,
        "firstname" => $firstName,
        "lastname" => $lastName,
        "age" => $age
    ));
    header('location:studentList.php');
}
?>
