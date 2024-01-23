<?php
    session_start();
    if(isset($_SESSION["username"]))
    {
        $username = ucfirst($_SESSION["username"]);
        $tabla = $_SESSION["tabla"];
    }
    else
    {
        echo "Primero inicia sesión<br>";
        echo "<a href='../index.php'>Iniciar Sesión</a>";
        header("Location:../index.php?error=error");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/tabla.css">
    <title>Carlos_GONZALEZ_IGLESIAS_ESTRIBOR</title>
    <style>
        form{
            padding: 30px;
        }

        form input, label{
            margin: 5px;
        }
    </style>
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