<?php

require './config.php';
require './method.php';

session_start();
$tablaSeleccionada = isset($_POST['tabla']) ? $_POST['tabla'] : 1;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ALBERTO_GUERRA_TURNO_ESTRIBOR</title>
    <style>
        body{
            background-color: green;
        }
    </style>
</head>
<body>
    <form method="post" action="mostrarcorreccion.php">
        <?php for ($i = 1; $i <= 10; $i++) : ?>
            <label><?= $tablaSeleccionada ?> + <?= $i ?> = </label>
            <input type="text" name="respuestas[<?= $i ?>]" required>
            <br>
        <?php endfor; ?>
        <input type="hidden" name="tabla" value="<?= $tablaSeleccionada ?>">
        <input type="submit" name="corregir" value="Corregir">
    </form>
</body>
</html>