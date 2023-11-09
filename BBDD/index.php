<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Alumnos</title>
    <?php
    include("config.php"); // Incluye las funciones o metodos de la web
    include("methods.php"); 
    ?>
</head>
<body>
<form method="post" action="index.php">
        <h1>Nuevo Alumno</h1>
        <label for="firstname">Nombre:</label>
        <input id="firstname" type="text" name="firstname" required>
        <label for="lastname">Apellido:</label>
        <input id="lastname" type="text" name="lastname" required>
        <input type="submit" value="Enviar">
    </form>
    <form method="post" action="index.php">
    <h2>Listado de alumnos</h2>
    <input type="submit" value="Ver Listado" name="list">
    </form>
    <form method="post" action="index.php">
        <h2>Busqueda de alumno</h2>
        <label for="searchname">Nombre:</label>
        <input id="searchname" type="text" name="searchname" required>
        <input type="submit" value="Consultar alumno" name="search">
    </form>
    <form method="post" action="index.php">
    <h2>Exportar en archivos</h2>
    <input type="submit" value="Exportar CSV" name="csv">
    <input type="submit" value="Exportar SQL" name="sql">
    </form>
    <?php
    if (isset($_POST["search"])) {
        $searchname = $_POST["searchname"];
        SearchStudent($conn, $searchname);
    }
    if (isset($_POST["list"])) {
        StundentList($conn);
    }
    if (isset($_POST["firstname"]) && isset($_POST["lastname"])) {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        Insert($conn, $firstname, $lastname);
    }
    $conn = null;
?>
</body>
</html>