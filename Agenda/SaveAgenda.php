<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Guardar Contacto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        div {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            font-size: 18px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button a {
            text-decoration: none;
            color: #fff;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $myfile = fopen("agenda.csv", "a") or die("No se ha podido abrir el archivo!");
    $txt = "$nombre, $apellido, $telefono\n";
    fwrite($myfile, $txt);    
    fclose($myfile);
    ?>
    <div>
        <h1>Contacto Guardado</h1>
        <p>El contacto ha sido guardado exitosamente en la agenda.</p>
        <button><a href="index.html">Volver al Menú Principal</a></button>
    </div>
</body>
</html>
