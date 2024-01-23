<?php
    require_once __DIR__ . "/./bbdd/config.php";
    require_once __DIR__ . "/./bbdd/methods.php";

    if (isset($_POST["username"])) {
        $user = Find($database, 'students', 'name', $_POST["username"]);
        if ($user) {
            if (password_verify($_POST["userpass"], $user["password"])) {
                session_start();
                $_SESSION["username"] = $user["name"];
                $_SESSION["tabla"] = $_POST["tabla"];
                header("Location: ./pages/mostrarTabla.php");
            }
            else
                echo "los datos no son corretos";
        } else {
            echo "Los datos no son correctos";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre Examen</title>
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
        <a href="./pages/singup.php">Registrarse</a>
    </fieldset>
</body>
</html>