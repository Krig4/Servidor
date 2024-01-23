<?php
session_start();

if ($_SESSION["username"]) {
    $name = $_SESSION["username"];
    $tabla = $_SESSION["tabla"];
} else {
    echo "Necesitas registrarte antes de acceder a la pagina";
    echo "<a href='../index.php'>Iniciar Sesión</a>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla</title>
</head>
<body>
<h3>Hola <?php echo $username?></h3>
    <fieldset>
        <legend>Tabla</legend>
        <form action="./mostrarcorrecion.php" method="post">
            <?php
                for ($i=1; $i <= 10; $i+=1) {
                    echo "<label for='suma$i'>$tabla + $i = </label>";
                    echo "<input type='number' name='suma$i' id='suma$i' placeholder='Resultado'>";
                    echo "<br>";
                }
            ?>
            <input type="submit" value="Enviar Resultados">
        </form>
    </fieldset>
    <div class="links">
        <a href="../php/cerrarSesion.php"><button>Cerrar Sesion</button></a>
        <a href="./verpuntuaciones.php">Ver últimas puntuaciones</a>
    </div>    
</body>
</html>