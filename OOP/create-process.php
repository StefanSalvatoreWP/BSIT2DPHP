<?php
    if(isset($_POST['add'])) {
        require_once("config.php");
        $cf = new config();

        $cf->setFirstname($_POST['firstname']);
        $cf->setLastname($_POST['lastname']);
        $cf->setAge($_POST['age']);
        $cf->setAddress($_POST['address']);
        $cf->setGender($_POST['gender']);
        $cf->setNationality($_POST['nationality']);
        $cf->create();

        echo "<script>alert('Added Success!');document.location='index.php'</script>";
    }
?>