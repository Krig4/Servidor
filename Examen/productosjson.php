<?php
    require './config.php';
    class Productos
    {
        public $nombre;
        public $precio;
        public $imagen;
        // public function __construct($nombre, $precio, $imagen)
        // {
        //     $this->nombre = $nombre;
        //     $this->precio = $precio;
        //     $this->imagen = $imagen;
        // }
    }
    $sql = "SELECT * FROM Productos";
    $stmt = $conn->prepare(  $sql );
    $productos=[];
    $i=0;
    foreach ($conn->query($sql) as $row) {
        $productos[$i]=new Productos();
        $productos[$i]->nombre=$row['nombre'] ;
        $productos[$i]->precio=$row['precio'] ;
        $productos[$i]->imagen=$row['imagen'] ;
        $i++;}
    $obj_json = json_encode($productos);
    echo $obj_json;
    ?>