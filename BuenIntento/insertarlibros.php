<?php
require_once __DIR__. './accesoBD.php';

$conn = BBDD();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $genero = $_POST["genero"];

    $BusquedaGenero = "SELECT genero FROM t_genero WHERE genero = '$genero'";
    $resultadoGenero = $conn->query($BusquedaGenero);

    if ($resultadoGenero->num_rows > 0) {
        $row = $resultadoGenero->fetch_assoc();
        $genero = $row["genero"];
        InsertarLibro($conn, $titulo, $autor, $genero);
    }
}

$BusquedaGenero = "SELECT * FROM t_genero";
$resultadoGenero = $conn->query($BusquedaGenero);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar Libros</title>
</head>
<body>
    <h2>Insertar Libro</h2>
    <form action="insertarlibros.php" method="post">
        Titulo: <input type="text" name="titulo"><br>
        Autor: <input type="text" name="autor"><br>
        Género:
        <select name="genero">
            <?php
            while ($row = $resultadoGenero->fetch_assoc()) {
                echo "<option value='" . $row["genero"] . "'>" . $row["genero"] . "</option>";
            }
            ?>
        </select><br>
        <input type="submit" value="Insertar">
    </form>
    <br>
    <a href="verlibros.php">Ver Libros</a>
</body>
</html>
