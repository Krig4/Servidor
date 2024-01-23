<?php
require_once __DIR__. './accesoBD.php';

$conn = BBDD();

$sql = "SELECT * FROM t_libros";
       
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Libros</title>
</head>
<body>
    <h2>Listado de Libros</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Autor</th>
            <th>Género</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["titulo"] . "</td><td>" . $row["autor"] . "</td><td>" . $row["genero"] . "</td></tr>";
        }
        ?>
    </table>
    <br>
</body>
</html>