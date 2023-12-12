<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/search.css">
    <title>Buscar un estudiante</title>
</head>
<body>
<fieldset>
    <legend>Out PHP</legend>
    <?php
        require './config.php';
        require './method.php';
    ?>
</fieldset>
<fieldset>
    <legend>Buscar Estudiante</legend>
    <form action="./search.php" method="post">
        <div class="campos">
            <div class="campo">
                <label for="tag">Buscar por: </label>
                <select name="tag" id="tag">
                    <option value="firstname">Nombre</option>
                    <option value="lastname">Apellido</option>
                    <option value="age">Edad</option>
                </select>
            </div>
            <div class="campo">
                <label for="name">Dato</label>
                <input type="text" name="data" id="data" required>
            </div>
        </div>
        <input type="submit" value="Buscar">
    </form>
</fieldset>
<?php
    if(isset($_POST["tag"])){
        $result = SelectStudent($conn, $_POST["tag"], $_POST["data"]);

        if($result){
            echo "<fieldset>";
            echo "<legend>Resultados</legend>";
            if(!$result->rowCount())
                echo "<p>No se han encontrado resultados</p>";
            echo "<table>";
            echo "<tr>";
            echo "<td>Id</td>";
            echo "<td>Nombre</td>";
            echo "<td>Apellido</td>";
            echo "<td>Edad</td>";
            echo "</tr>";
            foreach($result as $row){
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["firstname"]."</td>";
                echo "<td>".$row["lastname"]."</td>";
                echo "<td>".$row["age"]."</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</fieldset>";
        }
    }
?>
<fieldset>
    <legend>Otras opciones</legend>
    <a href="../index.php">Añadir Estudiante</a>
    <a href="./students.php">Ver todos los estudiantes</a>
</fieldset>
</body>
</html>
<?php $conn = null;?>