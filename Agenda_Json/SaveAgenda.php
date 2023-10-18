<?php
    class Contacto
    {
        public $nombre;
        public $apellido;
        public $telefono;

        
        public function __construct($nombre, $apellido, $telefono)
        {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->telefono = $telefono;
        }
    }
    if (($fp2 = fopen("agenda.csv", "r")) != FALSE) {
        while (($data = fgetcsv($fp2, 1000, ",")) != FALSE) {
            $contacto[] = new Contacto($data[0], $data[1], $data[2]);
        }
        fclose($fp2);
    }
    echo json_encode($contacto);
    ?>