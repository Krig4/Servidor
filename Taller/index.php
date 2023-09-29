<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Taller</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        form {
            width: 500px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"],
        select {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;  
        }

        fieldset {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-top: 20px;
        }

        legend {
            font-weight: bold;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            display: block;
            margin-top: 20px;
            width: 100%;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <form method="post" action="datosTaller.php">
        <h1>Formulario</h1>
        <label for="id_nombre">Nombre:</label>
        <input id="id_nombre" type="text" name="nombre" required>
        <label for="id_matricula">Matrícula:</label>
        <input id="id_matricula" type="text" name="matricula" required>
        <label for="id_telefono">Teléfono:</label>
        <input id="id_telefono" type="tel" name="telefono" required>
        <label for="id_email">E-Mail:</label>
        <input id="id_email" type="email" name="email" required>
        <label for="id_marca">Marca:</label>
        <select id="id_marca" name="marca" required>
            <?php
            if (($handle = fopen("marcas.csv", "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    echo '<option value="' . $data[0] . '">' . $data[0] . '</option>';
                }
                fclose($handle);
            }
            ?>
        </select>
        <fieldset>
            <legend>Tiene seguro:</legend>
            <input type="radio" id="id_seguro_si" name="seguro" value="Si" checked />
            <label for="id_seguro_si">Si usa seguro</label>
            <input type="radio" id="id_seguro_no" name="seguro" value="No" />
            <label for="id_seguro_no">No usa seguro</label>
        </fieldset>
        <fieldset>
            <legend>Horario de llamada:</legend>
            <input type="checkbox" id="id_manana" name="manana" value="Mañana ">
            <label for="id_manana">Horario 9 - 12</label>
            <input type="checkbox" id="id_tarde" name="tarde" value="Tarde ">
            <label for="id_tarde">Horario 13 - 17</label>
            <input type="checkbox" id="id_noche" name="noche" value="Noche ">
            <label for="id_noche">Horario 18 - 22</label>
        </fieldset>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>
