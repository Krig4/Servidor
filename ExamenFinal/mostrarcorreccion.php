<?php
if (isset($_POST['corregir'])) {
    $tablaSeleccionada = isset($_POST['tabla']) ? $_POST['tabla'] : 1;
    $respuestas = isset($_POST['respuestas']) ? $_POST['respuestas'] : [];
}
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
    <h2>Corrección</h2>
    <?php
    for ($i = 1; $i <= 10; $i++) {
        $respuestaUsuario = isset($respuestas[$i]) ? $respuestas[$i] : '';
        $respuestaCorrecta = $tablaSeleccionada + $i;
        $esCorrecta = ($respuestaUsuario == $respuestaCorrecta);
        
        echo "<div style='background-color: " . ($esCorrecta ? 'green' : 'red') . ";'>";
        echo "$tablaSeleccionada + $i = $respuestaUsuario";
        echo "</div>";
    }
    ?>
</body>
</html>