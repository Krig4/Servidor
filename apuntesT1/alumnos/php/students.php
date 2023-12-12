<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/students.css">
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
<div>
    <fieldset>
        <legend>Buscar todos los estudiantes</legend>
        <form action="./students.php" method="post">
            <div class="campos">
                <div class="campo">
                    <label for="pass">Contraseña</label>
                    <input type="password" name="pass" id="pass">
                </div>
            </div>
            <input type="submit" value="Buscar" name="search">
        </form>
        <?php
            if(isset($_POST["search"])){
                $result = SelectAllStudent($conn);

                if($result){
                    echo "<fieldset class='fieldset_show'>";
                    echo "<legend>Base de datos</legend>";
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
    </fieldset>
    <fieldset>
        <legend>CSV</legend>
        <form action="./students.php" method="post">
            <div class="campos">
                <div class="campo">
                    <label for="pass">Contraseña</label>
                    <input type="password" name="pass" id="pass">
                </div>
            </div>
            <input type="submit" value="Crear csv" name="csv">
        </form>
        <?php
            if(isset($_POST["csv"]))
            {
                $result = SelectAllStudent($conn);
                if($result)
                {
                    $fd = fopen("../csv/students.csv", "w");
                    foreach($result as $row){
                        fwrite($fd, $row["id"]);
                        fwrite($fd, ",");
                        fwrite($fd, $row["firstname"]);
                        fwrite($fd, ",");
                        fwrite($fd, $row["lastname"]);
                        fwrite($fd, ",");
                        fwrite($fd, $row["age"]);
                        fwrite($fd, "\n");
                    }
                    fclose($fd);
                    echo "  <script>
                                if(confirm('CSV creado correctamente, ¿Quieres descargarlo?'))
                                    window.open('../csv/students.csv');
                            </script>
                        ";
                }
            }

            if(file_exists("../csv/students.csv"))
            {
                echo "<fieldset class='fieldset_show'>";
                echo "<legend>CSV</legend>";
                $f = fopen("../csv/students.csv", "r");
                while($linea = fgets($f))
                {
                    echo "<p>$linea<p>";
                    $id[] = explode(",", $linea)[0];
                    $firstname[] = explode(",", $linea)[1];
                    $lastname[] = explode(",", $linea)[2];
                    $age[] = str_replace("\n", "", explode(",", $linea)[3]);
                }
                echo "<form action='./students.php' method='post'>";
                echo "<input type='submit' value='Importar csv' name='import'>";
                echo "</form>";
                echo "</fieldset>";
            }

            if(isset($_POST["import"])){
                for($i = 0; $i < count($id); $i += 1)
                    echo InsertStudentId($conn, $id[$i], $firstname[$i], $lastname[$i], $age[$i]);
            }
        ?>
    </fieldset>
</div>
<fieldset>
    <legend>Otras opciones</legend>
    <a href="../index.php">Añadir Estudiante</a>
    <a href="./search.php">Buscar estudiante</a>
</fieldset>
</body>
</html>
<?php $conn = null;?>