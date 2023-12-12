<?php
require './method.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h3 {
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        hr {
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <h3>REGISTRA UN AMIGO</h3>
    <form action="index.php" method="POST">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre contacto" required>
        <label for="telefono">Telefono: </label>
        <input type="tel" name="telefono" id="telefono" required>
        <input type="submit" value="Enviar">
    </form>
    <h3>BUSCAR UN AMIGO</h3>
    <form action="index.php" method="POST">
        <label for="buscar">Nombre: </label>
        <input type="text" name="buscar" id="buscar" placeholder="Buscar Contacto" required>
        <input type="submit" value="Buscar Contacto">
    </form>
    <h3>TODOS TUS AMIGOS</h3>
    <form action="index.php" method="POST">
        <input type="submit" value="Ver Agenda" name="agenda">
    </form>
    <?php
    if (isset($_POST["nombre"])) {
        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        $resultado = InsertarContacto($nombre, $telefono, $basedatos);
        echo $resultado;
    }
    if (isset($_POST["agenda"])) {
        $resultados = VerContacto($basedatos);
        foreach ($resultados as $contacto) {
            echo 'Nombre: ' . $contacto['Nombre'] . '<br>';
            echo 'Teléfono: ' . $contacto['Teléfono'] . '<br>';
            echo '<hr>';
        }
    }
    if (isset($_POST["buscar"])) {
        $buscar = $_POST["buscar"];
        $resultado = BuscarContacto($buscar, $basedatos);
        if (is_array($resultado)) {
            echo 'Nombre: ' . $resultado['Nombre'] . '<br>';
            echo 'Teléfono: ' . $resultado['Teléfono'] . '<br>';
            echo '<hr>';
        } else {
            echo $resultado;
        }
    }
    ?>
</body>

</html>
