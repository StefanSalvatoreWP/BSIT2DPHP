<?php
session_start();
require("config.php");

?>
<!DOCTYPE html>
<html lang="en">
    <?php include "header.php";?>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="index.php">Simple Birthday Reminder</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </nav>
        <div class='container mt-3'>
            <div class="jumbotron"><h2 class='text-muted text-center'>SIMPLE BIRTHDAY REMINDER</h2></div>
            <div class='row'>
                <div class='col-md-5 mx-auto'>
                    <h3 class='text-muted text-center'>LOGIN</h3>
                    <?php 
                        if(isset($_POST["login"])){
                            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                            $uname = $_POST["uname"];
                            $upass = $_POST["upass"];

                            $sql = "SELECT * FROM admin WHERE ANAME = :uname AND APASS = :upass";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':uname', $uname);
                            $stmt->bindParam(':upass', $upass);
                            $stmt->execute();

                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                            if($row){
                                $_SESSION["login_info"] = $row;
                                header('location:home.php');
                                exit();
                            } else {
                                echo "<div class='alert alert-danger'>Invalid Login Details.</div>";
                            }
                        }
                    ?>
                    <form action='index.php' method='post'>
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" name='uname'  placeholder="UserName" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name='upass' placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input type='submit' name='login' value='Login' class='btn btn-primary'>
                        </div>
                        
                        <a href="sign-up.php">SIGN-UP</a>
                    </form>
                </div>
                
            </div>
        </div>
    </body>
</html>
