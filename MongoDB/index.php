<?php

require_once __DIR__ . '/vendor/autoload.php';

$m = new MongoDB\Client("mongodb://localhost:27017");

echo "Conexión exitosa";

$basedatos = $m->local->amigos;

// Datos del nuevo registro
$nuevoRegistro = [
    'nombre' => 'Ejemplo',
    'edad' => 25,
];

// Insertar el nuevo registro en la colección
$resultado = $basedatos->insertOne($nuevoRegistro);

if ($resultado->getInsertedCount() > 0) {
    echo "Nuevo registro agregado exitosamente";
} else {
    echo "Error al agregar el nuevo registro";
}

?>
