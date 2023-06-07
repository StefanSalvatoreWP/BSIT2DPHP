<?php 

$host = "localhost";
$Uname = "root";
$Pass = "root123";
$db_name = "improject";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $Uname, $Pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}
?>