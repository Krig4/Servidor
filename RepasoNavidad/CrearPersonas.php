<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla de Personas</title>
</head>
<body>

<?php
// Paso 1: Crear la clase Persona
class Persona {
    public $nombre;
    public $apellido;
    public $edad;

    public function __construct($nombre, $apellido, $edad) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
    }
}

// Paso 2: Crear la función crearPersonas()
function crearPersonas() {
    $personas = [
        new Persona("Juan", "Pérez", 30),
        new Persona("Berta", "Gómez", 25),
        new Persona("Carlos", "López", 35)
    ];

    return $personas;
}

// Paso 3: Obtener el array de personas y crear la tabla HTML
$personasArray = crearPersonas();

// Crear la tabla
echo "<table border='1'>";
// Crear encabezado
echo "<tr><th>Nombre</th><th>Apellido</th><th>Edad</th></tr>";
// Mostrar datos de cada persona
foreach ($personasArray as $persona) {
    echo "<tr><td>{$persona->nombre}</td><td>{$persona->apellido}</td><td>{$persona->edad}</td></tr>";
}
echo "</table>";
?>

</body>
</html>
