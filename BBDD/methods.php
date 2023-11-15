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
function SaveCSV($conn) // SQL a CSV
{
    // Limpiar el búfer de salida
    ob_clean();
    // Realiza la consulta
    $sql = "SELECT * FROM Alumno";
    $result = $conn->query($sql);

    // Nombre del archivo CSV
    $csvFile = 'ListadoAlumnos.csv';

    // Abre el archivo en modo escritura
    $file = fopen($csvFile, 'w');
    // Escribe los datos de la consulta en el CSV
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        fputcsv($file, $row);
    }
    // Cierra el archivo
    fclose($file);

    // Configura los encabezados para la descarga
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $csvFile . '"');

    // Lee el archivo y lo imprime en la salida estándar
    readfile($csvFile);
    exit;
}

function ImportSQL($conn) // CSV a SQL
{
    $csvFile = "./ListadoAlumnos.csv";
    // Abre el archivo CSV en modo lectura
    $file = fopen($csvFile, 'r');

    // Prepara la consulta de inserción
    $sql = "INSERT INTO Alumno (" . implode(',') . ") VALUES (:" . implode(',:') . ")";
    $stmt = $conn->prepare($sql);

    // Lee cada línea del CSV y realiza la inserción en la base de datos
    while (($data = fgetcsv($file)) !== false) {
        $params = $data;
        $stmt->execute($params);
    }

    // Cierra el archivo
    fclose($file);
    
    echo "Datos importados desde CSV a MySQL correctamente.";
}

