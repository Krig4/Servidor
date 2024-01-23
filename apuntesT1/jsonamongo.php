<?php
require 'vendor/autoload.php';

// Paso 2: Crear una conexión con la base de datos
$uri = "mongodb://localhost:27017";
$client = new MongoDB\Client($uri);

// Paso 3: Seleccionar la base de datos y la colección
$database = $client->selectDatabase('nombre_de_tu_base_de_datos');
$collection = $database->selectCollection('nombre_de_tu_coleccion');

// Paso 4: Leer el archivo JSON
$jsonFile = file_get_contents('ruta_a_tu_archivo.json');
$data = json_decode($jsonFile, true);

// Paso 5: Insertar los datos en la colección
$result = $collection->insertMany($data);

// Paso 6: Manejar errores
if ($result->getInsertedCount() > 0) {
    echo "Datos insertados correctamente";
} else {
    echo "Error al insertar datos";
}
?>
<?php

// Conectar a MongoDB
$cliente = new MongoDB\Client("mongodb://localhost:27017");

// Seleccionar la base de datos
$baseDeDatos = $cliente->nombre_de_tu_base_de_datos;

// Seleccionar la colección
$coleccion = $baseDeDatos->nombre_de_tu_coleccion;

// Leer el archivo JSON
$jsonFilePath = 'ruta/a/tu/archivo.json';
$jsonData = json_decode(file_get_contents($jsonFilePath), true);

// Insertar datos en la colección
$coleccion->insertMany($jsonData);

?>