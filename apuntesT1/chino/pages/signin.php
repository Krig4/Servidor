<?php

use MongoDB\Operation\InsertOne;

require __DIR__ . "/../bbdd/config.php";
require __DIR__ . "/../bbdd/methods.php";
require __DIR__."/../php/user.php";
if (isset($_POST["name"]))
{
    $check = FindBy($database, "user", "name", $_POST["name"]);
    if(!$check)
        InsertOne($database, "user", new User($_POST["name"], password_hash($_POST["pass"], PASSWORD_DEFAULT), "cliente"));
    else
        echo "<script type='text/javascript'>alert('El nombre de usuario ya existe')</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
</head>
<body>
    <form action="./signin.php" method="post">
        <input type="text" name="name" id="name" required>
        <input type="password" name="pass" id="pass" required>
        <input type="submit" value="Registrarse">
    </form>
    <a href="./login.php">Iniciar Sesion</a>
</body>
</html>