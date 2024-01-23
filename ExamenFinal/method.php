<?php
function InsertarAlumno($conn, $usr, $pwd)
{
    try {
        $sql = "INSERT INTO estudiantes (usr, pwd) VALUES ('$usr', '$pwd')";
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo "Error al insertar el registro: " . $e->getMessage();
    }
}