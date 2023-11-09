<?php
function Insert($conn, $firstname, $lastname)
{
    try {      // set the PDO error mode to exception
        $sql = "INSERT INTO Alumno (firstname, lastname)
        VALUES ('$firstname', '$lastname')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
function StundentList($conn)
{
    $sql = "SELECT * FROM Alumno";
    $stmt = $conn->query($sql);
    $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($alumnos) > 0) {
        echo "<table>";
        echo "<tr><th>Nombre</th><th>Apellido</th></tr>";

        foreach ($alumnos as $alumno) {
            echo "<tr>";
            echo "<td>" . $alumno["firstname"] . "</td>";
            echo "<td>" . $alumno["lastname"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "0 results";
    }
}
function SearchStudent($conn, $searchname)
{
    $sql = "SELECT * FROM Alumno WHERE firstname = '$searchname'";
    $stmt = $conn->query($sql);
    $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($alumnos) > 0) {
        echo "<table>";
        echo "<tr><th>Nombre</th><th>Apellido</th></tr>";

        foreach ($alumnos as $alumno) {
            echo "<tr>";
            echo "<td>" . $alumno["firstname"] . "</td>";
            echo "<td>" . $alumno["lastname"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "0 results";
    }
}
function SaveCSV($conn)
{
    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Realiza la consulta
    $sql = "SELECT * FROM tu_tabla";
    $result = $conn->query($sql);

    // Nombre del archivo CSV
    $csvFile = 'resultados.csv';

    // Abre el archivo en modo escritura
    $file = fopen($csvFile, 'w');

    // Escribe el encabezado del CSV
    fputcsv($file, array('Columna1', 'Columna2', 'Columna3'));

    // Escribe los datos de la consulta en el CSV
    while ($row = $result->fetch_assoc()) {
        fputcsv($file, $row);
    }

    // Cierra el archivo
    fclose($file);

    // Cierra la conexión a la base de datos
    $conn->close();

    echo "Datos exportados a CSV correctamente.";
}
