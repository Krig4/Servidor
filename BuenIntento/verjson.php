<?php
require_once __DIR__. './accesoBD.php';
class Libros{
    public $autor;
    public $titulo;
    public $genero;
}
$conn = BBDD();
$sql = "SELECT * FROM t_libros";
$stmt = $conn->prepare(  $sql );
    $libros=[];
    $i=0;
    foreach ($conn->query($sql) as $row) {
        $libros[$i]=new libros();
        $libros[$i]->titulo=$row['titulo'] ;
        $libros[$i]->autor=$row['autor'] ;
        $libros[$i]->genero=$row['genero'] ;
        $i++;}
    $obj_json = json_encode($libros);
    echo $obj_json;
    ?>