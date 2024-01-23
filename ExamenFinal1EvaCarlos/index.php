<?php
    require __DIR__."/./bbdd/config.php";
    require __DIR__."/./bbdd/accesoBD.php";

    if (isset($_POST["username"]))
    {
        if(FindBy($database, "student", "username", $_POST["username"]))
        {
            $student = FindBy($database, "student", "username", $_POST["username"]);
            if (password_verify($_POST["userpass"], $student["userpass"]))
            {
                session_start();
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["tabla"] = $_POST["tabla"];
                header("Location: ./pages/mostrarTabla.php");
            }
            else
                echo "Los datos son incorrectos";
        }
        else
            echo "Los datos son incorrectos";
    }

    if(isset($_GET["error"]))
        echo "Primero debes iniciar sesión";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css">
    <title>Carlos_GONZALEZ_IGLESIAS_ESTRIBOR</title>
</head>
<body>
    <fieldset>
        <legend>Iniciar Sesión</legend>
        <form action="./index.php" method="post">
            <input type="text" name="username" id="username" placeholder="Nombre de usuario" required>
            <input type="password" name="userpass" id="userpass" placeholder="Contraseña" required>
            <label for="tabla">Seleccionar tabla</label>
            <select name="tabla" id="tabla" required>
                <?php
                    for($i = 1; $i < 11; $i += 1)
                        echo "<option value='$i'>$i</option>";
                ?>
            </select>
            <input type="submit" value="Iniciar">
        </form>
        <a href="./pages/crearusuarios.php">Registrarse</a>
    </fieldset>
</body>
</html>