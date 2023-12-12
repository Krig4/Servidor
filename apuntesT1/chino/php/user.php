<?php
    class User{
        public $name;
        public $pass;
        public $rol;

        public function __construct($name, $pass, $rol) {
            $this->name = $name;
            $this->pass = $pass;
            $this->rol = $rol;
        }
    }
?>