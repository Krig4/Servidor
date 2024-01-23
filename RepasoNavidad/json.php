<?php

// Ruta del archivo JSON local
$json_file = "carburantes.json";

// Obtener el contenido JSON
$json_data = file_get_contents($json_file);

// Decodificar el JSON
$data = json_decode($json_data, true);

// Verificar si la decodificación fue exitosa
if ($data === null) {
    die("Error al decodificar el JSON");
}

// Obtener la información de las gasolineras
$gasolineras = $data['ListaEESSPrecio'];

// Crear una tabla HTML
echo "<table border='1'>
        <tr>
            <th>Municipio</th>
            <th>Precio Gasóleo A</th>
            <th>Precio Gasolina 95</th>
        </tr>";

// Variables para almacenar la estación de servicio más barata
$estacionBarata = null;
$precioGasolinaBarata = PHP_FLOAT_MAX;

// Iterar sobre las gasolineras
foreach ($gasolineras as $gasolinera) {
    $municipio = $gasolinera['Municipio'];
    $precioGasoleoA = $gasolinera['Precio Gasoleo A'];
    $precioGasolina95 = $gasolinera['Precio Gasolina 95'];

    // Imprimir fila de la tabla
    echo "<tr>
            <td>{$municipio}</td>
            <td>{$precioGasoleoA}</td>
            <td>{$precioGasolina95}</td>
        </tr>";

    // Verificar si la gasolina es más barata en esta estación
    if ($precioGasolina95 < $precioGasolinaBarata) {
        $estacionBarata = $gasolinera;
        $precioGasolinaBarata = $precioGasolina95;
    }
}

echo "</table>";

// Imprimir la estación de servicio más barata
if ($estacionBarata) {
    echo "<p>La estación de servicio más barata para la gasolina 95 es: {$estacionBarata['Rótulo']} en {$estacionBarata['Dirección']} con un precio de {$estacionBarata['Precio Gasolina 95']} euros</p>";
} else {
    echo "<p>No se encontraron datos de estaciones de servicio.</p>";
}

?>
