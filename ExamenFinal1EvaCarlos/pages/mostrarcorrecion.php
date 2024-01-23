<?php
        require __DIR__."/../bbdd/config.php";
        require __DIR__."/../bbdd/accesoBD.php";
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
    <title>Carlos_GONZALEZ_IGLESIAS_ESTRIBOR</title>
    <link rel="stylesheet" href="../styles/tabla.css">
</head>
<body>
    <?php
        echo "<h3> Hola $username estas son tus correciones de la tabla $tabla</h3>";
    ?>
    <fieldset>
        <legend>Correciones</legend>
        <?php
            $counter = 0;
            for ($i = 1; $i <= 10; $i += 1)
            {
                if (!empty($_POST["suma$i"]) && $_POST["suma$i"] == $i + $_SESSION["tabla"])
                {
                    $counter += 1;
                    echo "<p style='color:green'>";

                }
                else
                    echo "<p style='color:red'>";
                echo $tabla." + ".$i." = ";
                if (!empty($_POST["suma$i"]))
                    echo $_POST["suma$i"];
                else if (empty($_POST["suma$i"]))
                    echo "Ninguna Respuesta";
                echo "</p>";
            }
            echo "<p style='border:solid 1px black; width:fit-content; padding:10px;'>Has conseguido $counter/10</p>";

            $user = FindBy($database, "student", "username", $_SESSION["username"]);
            if ($user["$tabla"] == NULL)
                UpdateStudent($database, $_SESSION["username"], $tabla, $counter);
            else
            {
                if ($user["$tabla"] < $counter)
                    UpdateStudent($database, $_SESSION["username"], $tabla, $counter);
            }
        ?>
    </fieldset>
    <div class="links">
        <a href="../php/cerrarSesion.php"><button>Cerrar Sesion</button></a>
        <a href="./mostrarTabla.php">Volver a intentar la tabla del <?php echo $tabla?></a>
        <a href="./verpuntuaciones.php">Ver últimas puntuaciones</a>
    </div>
</body>
</html>