<?php
require_once __DIR__ . "/../bbdd/config.php";
require_once __DIR__ . "/../bbdd/methods.php";

    if (isset($_POST["username"])) {
        if (!Find($database, 'students', 'name', $_POST["username"])) { 
            Insert($database, 'students', [
                "name" => $_POST["username"],
                "password" => password_hash($_POST["userpass"], PASSWORD_DEFAULT),
                "1" => null,
                "2" => null,
                "3" => null,
                "4" => null,
                "5" => null,
                "6" => null,
                "7" => null,
                "8" => null,
                "9" => null,
                "10" => null,
            ]);           
            echo "El usuario ha sido registrado correctamente";
        } else {
            echo "El usuario ya existe";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repaso</title>
</head>
<body>
    <fieldset>
        <legend>Registrarse</legend>
        <form action="./singup.php" method="post">
            <input type="text" name="username" id="username" placeholder="Nombre de usuario" required>
            <input type="password" name="userpass" id="userpass" placeholder="Contraseña" required>
            <input type="submit" value="Registrarse">
        </form>
        <a href="../index.php">Iniciar Sesión</a>
    </fieldset>
</body>
</html>