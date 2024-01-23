<?php
    require __DIR__."/../bbdd/config.php";
    require __DIR__."/../bbdd/accesoBD.php";

    if (isset($_POST["username"]))
    {
        if (!FindBy($database, "student", "username", $_POST["username"]))
        {
            Insert($database, "student",
            [
                "username"=>$_POST["username"],
                "userpass"=>password_hash($_POST["userpass"], PASSWORD_DEFAULT),
                "1" => NULL,
                "2" => NULL,
                "3" => NULL,
                "4" => NULL,
                "5" => NULL,
                "6" => NULL,
                "7" => NULL,
                "8" => NULL,
                "9" => NULL,
                "10" => NULL
            ]);
            echo "El usuario ha sido registrado correctamente";
        }
        else
            echo "El nombre de usuario ya existe";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/index.css">
    <title>Carlos_GONZALEZ_IGLESIAS_ESTRIBOR</title>
</head>
<body>
    <fieldset>
        <legend>Registrarse</legend>
        <form action="./crearusuarios.php" method="post">
            <input type="text" name="username" id="username" placeholder="Nombre de usuario" required>
            <input type="password" name="userpass" id="userpass" placeholder="Contraseña" required>
            <input type="submit" value="Registrarse">
        </form>
        <a href="../index.php">Iniciar Sesión</a>
    </fieldset>
</body>
</html>