<?php
        require __DIR__."/../bbdd/config.php";
        require __DIR__."/../bbdd/accesoBD.php";
        session_start();
        if(isset($_SESSION["username"]))
        {
            $username = ucfirst($_SESSION["username"]);
            $tabla = $_SESSION["tabla"];
            $user = FindBy($database, "student", "username", $_SESSION["username"]);
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
    <title>Carlos_GONZALEZ_IGLESIAS_ESTRIBOR</title>
    <style>
        body{
            background-color: lightgreen;
        }
    </style>
</head>
<body>
    <?php
        echo "<h3> Hola $username estas son tus ultimas puntuaciones de las tablas $tabla</h3>";
        echo "<ul>";
        for ($i = 1; $i < 11; $i += 1)
        {
            if($user["$i"])
                echo "<li> Tabla del $i: ".$user["$i"]."/10</li>";
            else
                echo "<li> Tabla del $i: No intentado</li>";
        }
        echo "</ul>";
    ?>
    <div class="links">
        <a href="../php/cerrarSesion.php"><button>Cerrar Sesion</button></a>
        <a href="./mostrarTabla.php">Volver a intentar la tabla del <?php echo $tabla?></a>
    </div>
</body>
</html>