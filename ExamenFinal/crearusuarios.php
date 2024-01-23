<?php
require './config.php';
require './method.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALBERTO_GUERRA_TURNO_ESTRIBOR</title>
    <style>
        body{
            background-color: green;
        }
    </style>
</head>

<body>
    <h3>REGISTRA UN ALUMNO</h3>
    <form action="crearusuarios.php" method="POST">
    <label for="usrLog">Usuario: </label>
        <input type="text" name="usrLog" id="usrLog" required>
        <label for="pwdLog">Contraseña</label>
        <input type="password" name="pwdLog" id="pwdLog" required>
        <input type="submit" value="Enviar">
    </form>
        <a href="./index.php"><button>Menu Principal</button></a>
    <?php
    if (isset($_POST['usrLog']) && isset($_POST['pwdLog'])) {
        InsertarAlumno($conn, $_POST['usrLog'], $_POST['pwdLog']);
    }
    ?>
</body>