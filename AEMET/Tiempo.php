<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Tiempo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        form {
            text-align: center;
            margin: 20px;
        }

        h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        select {
            padding: 10px;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        h3 {
            font-size: 20px;
            margin: 20px 0 10px;
            text-align: center;
        }

        .temperature-info {
            text-align: center;
            font-size: 24px;
        }

        .icon {
            width: 32px; /* Tamaño de las imágenes de los iconos */
            height: 32px;
            vertical-align: middle; /* Centra las imágenes verticalmente */
            margin-right: 5px; /* Espacio entre la imagen y el texto */
        }
    </style>
</head>
<body>
    <h1>La Previsión del Tiempo con Roberto Brasero</h1>
    <form action="Tiempo.php" method="POST">
        <h2>Escoge una de las siguientes ciudades para ver la previsión del tiempo</h2>
        <select name="Clima" id="Clima">
            <option value="Alcorcon">Alcorcón</option>
            <option value="Sotillo">Sotillo de la Adrada</option>
            <option value="Valencia">Valencia</option>
        </select>
        <br><br>
        <input type="submit" value="Buscar" />
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ciudad = $_POST["Clima"];
        $url = "";

        // Definir la URL correcta según la ciudad seleccionada
        if ($ciudad == "Alcorcon") {
            $url = "https://www.aemet.es/xml/municipios/localidad_28007.xml";
        } elseif ($ciudad == "Sotillo") {
            $url = "https://www.aemet.es/xml/municipios/localidad_05240.xml";
        } elseif ($ciudad == "Valencia") {
            $url = "https://www.aemet.es/xml/municipios/localidad_46250.xml";
        }

        // Realizar la solicitud HTTP y cargar el archivo XML
        $xml = simplexml_load_file($url);

        // Extraer la información del pronóstico de temperatura para los próximos 3 días
        for ($i = 0; $i < 3; $i++) {
            $dia = $xml->prediccion->dia[$i];
            $fecha = $dia['fecha'];
            $tempMax = $dia->temperatura->maxima;
            $tempMin = $dia->temperatura->minima;

            echo "<h3>Pronóstico para $fecha:</h3>";
            echo '<div class="temperature-info">';
            echo "<p><img class='icon' src='./icono_temperatura_alta.png' alt='icono temperatura'> Temperatura máxima: $tempMax °C</p>";
            echo "<p><img class='icon' src='./icono_temperatura_baja.png' alt='icono temperatura'> Temperatura mínima: $tempMin °C</p>";
            echo '</div>';
        }
    }
    ?>
</body>
</html>
