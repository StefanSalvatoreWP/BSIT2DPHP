<?php
require_once('advancedStudent.php');

$page = $_POST['submit'];

if ($page == "Save") {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $age = $_POST['age'];
    $address =$_POST['address'];
    $contact =$_POST['contact'];
    $nationality =$_POST['nationality'];
    $gender =$_POST['gender'];
    $status =$_POST['status'];
    $year =$_POST['year'];
    $studentlist = array(
    "firstname"=>$firstName, 
    "lastname"=>$lastName, 
    "age"=>$age,
    "address"=>$address,
    "contact"=>$contact,
    "nationality"=>$nationality,
    "gender"=>$gender,
    "status"=>$status,
    "year"=>$year,
); 

    $myStudent = new Student();
    $ret = $myStudent->saveStudent($studentlist);
    header('location:AdvancedList.php');
} else if ($page == "Delete") {
    $studentlist = $_POST['student_id'];
    $myStudent = new Student();
    $ret = $myStudent->deleteStudent($studentlist);
    header('location:AdvancedList.php');
} else if ($page == "Update") {
    $id = $_POST['student_id'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $age = $_POST['age'];
    $address =$_POST['address'];
    $contact =$_POST['contact'];
    $nationality =$_POST['nationality'];
    $gender =$_POST['gender'];
    $status =$_POST['status'];
    $year =$_POST['year'];
    $myStudent = new Student();
    $ret = $myStudent->updateStudent(array(
        "student_id" => $id,
        "firstname" => $firstName,
        "lastname" => $lastName,
        "age" => $age,
        "address"=>$address,
        "contact"=>$contact,
        "nationality"=>$nationality,
        "gender"=>$gender,
        "status"=>$status,
        "year"=>$year,
    ));
    header('location:AdvancedList.php');
}
?>
