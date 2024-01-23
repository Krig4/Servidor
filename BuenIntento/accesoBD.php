<?php
function BBDD()
{
    $config = parse_ini_file("./config.ini", true);
    $servername = $config['database']['servername'];
    $username = $config['database']['username'];
    $password = $config['database']['password'];
    $dbname = $config['database']['dbname'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    return $conn;
}
function InsertarLibro($conn, $titulo, $autor, $genero)
{
    $sql = "INSERT INTO t_libros (titulo, autor, genero) VALUES ('$titulo', '$autor', '$genero')";
    $conn->query($sql);
}
