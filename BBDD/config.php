<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Alumnos";

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // Creo BBDD
  $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
  $conn->exec($sql);
  $conn->exec("USE $dbname");
  // Creo la tabla
  $sql = "CREATE TABLE IF NOT EXISTS Alumno (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL
    )";
    // use exec() because no results are returned
    $conn->exec($sql);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
 
?>