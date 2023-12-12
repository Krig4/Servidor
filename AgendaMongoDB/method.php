<?php
include 'contacto.php';
$config = parse_ini_file("./config.ini", true);
$bbdd = $config['basedatos'];
$colection = $config['coleccion'];
require_once __DIR__ . '/../MongoDB/vendor/autoload.php'; //Añadir vendor para su uso
$m = new MongoDB\Client("mongodb://localhost:27017");
$basedatos = $m->$bbdd->$colection;

function InsertarContacto($nombre, $telefono, $basedatos)
{
    $contacto = new Contacto($nombre, $telefono);
    $resultado = $basedatos->insertOne($contacto);

    if ($resultado->getInsertedCount() > 0) {
        return "Nuevo registro agregado exitosamente";
    } else {
        return "Error al agregar el nuevo registro";
    }
}

function VerContacto($basedatos)
{
    $documentos = $basedatos->find();
    $resultados = [];

    foreach ($documentos as $documento) {
        $resultados[] = [
            'Nombre' => $documento['nombre'],
            'Teléfono' => $documento['telefono']
        ];
    }

    return $resultados;
}

function BuscarContacto($buscar, $basedatos)
{
    $documento = $basedatos->findOne(['nombre' => $buscar]);

    if ($documento) {
        return [
            'Nombre' => $documento['nombre'],
            'Teléfono' => $documento['telefono']
        ];
    } else {
        return 'Contacto no encontrado.';
    }
}


