<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
        }

        th {
            background-color: #ccc;
            font-weight: bold;
        }

        td {
            padding: 10px;
        }

        th, td {
            border: 1px solid #ddd;
            text-align: left;
        }

        h1 {
            text-align: center;
            background-color: #000;
            color: #fff;
            padding: 20px;
            margin: 0;
        }
    </style>
</head>
<?php
$nombre = $_POST["nombre"];
$matricula = $_POST["matricula"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$marca = $_POST["marca"];
$seguro = $_POST["seguro"]
?>
<body>
    <h1>Detalles del Cliente</h1>
    <table>
        <tbody>
            <tr>
            
                <th>Nombre</th>
                <td><?php echo $nombre; ?></td>
            </tr>
            <tr>
                <th>Matrícula</th>
                <td><?php echo $matricula; ?></td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td><?php echo $telefono; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <th>Marca</th>
                <td><?php echo $marca; ?></td>
            </tr>
            <tr>
                <th>Seguro</th>
                <td><?php echo $seguro; ?></td>
            </tr>
            <tr>
                <th>Horarios</th>
                <td>
                    <?php
                        if(isset($_POST["manana"]))
                            echo $_POST["manana"] . "<br>";

                        if(isset($_POST["tarde"]))
                            echo $_POST["tarde"] . "<br>";

                        if(isset($_POST["noche"]))
                            echo $_POST["noche"] . "<br>";
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
