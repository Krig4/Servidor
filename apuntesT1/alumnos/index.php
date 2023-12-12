<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/index.css">
    <title>Inicio</title>
</head>
<body>
    <fieldset>
        <legend>Out de PHP</legend>
        <?php
            require './php/config.php';
            require './php/method.php';

            if (isset($_POST["name"]) && isset($_POST["surname"]))
                $addMessage = InsertStudent($conn, $_POST["name"], $_POST["surname"], $_POST["age"]);
        ?>
    </fieldset>
    <fieldset>
        <legend>Añadir Estudiante</legend>
        <div class="message">
            <?php
                if(isset($addMessage))
                    echo "<p>$addMessage</p>";
            ?>
        </div>
        <form action="./index.php" method="post">
            <div class="campos">
                <div class="campo">
                    <label for="name">Nombre: </label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="campo">
                    <label for="surname">Apellido: </label>
                    <input type="text" name="surname" id="surname">
                </div>
                <div class="campo">
                    <label for="surname">Edad: </label>
                    <input type="number" name="age" id="age" required>
                </div>
            </div>
            <input type="submit" value="Guardar">
        </form>
    </fieldset>
    <fieldset>
        <legend>Otras opciones</legend>
        <a href="./php/search.php">Buscar estudiante</a>
        <a href="./php/students.php">Ver todos los estudiantes</a>
    </fieldset>
</body>
</html>
<?php
    $conn=null;
?>