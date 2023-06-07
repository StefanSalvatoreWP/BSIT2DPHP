<?php
require 'config.php';

if(isset($_POST["action"])){
  if($_POST["action"] == "insert"){
    insert();
  }
  else if($_POST["action"] == "edit"){
    edit();
  }
  else{
    delete();
  }
}

function insert(){
  global $conn;

  $name = $_POST["name"];
  $email = $_POST["email"];
  $gender = $_POST["gender"];

  $query = "INSERT INTO users (name, email, gender) VALUES (:name, :email, :gender)";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':gender', $gender);
  $stmt->execute();
  header('Location: index.php');
}


function edit(){
  global $conn;

  $id = $_POST["id"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $gender = $_POST["gender"];

  $query = "UPDATE users SET name = :name, email = :email, gender = :gender WHERE id = :id";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':gender', $gender);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  header('Location: index.php');
}

function delete(){
  global $conn;

  $id = $_POST["id"];

  $query = "DELETE FROM users WHERE id = :id";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  header('Location: index.php');
}
?>
