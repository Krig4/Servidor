<?php
    class Car{
        public $brand;
        public $model;
        public $year;

        public function __construct($brand, $model, $year) {
            $this->brand = $brand;
            $this->model = $model;
            $this->year = $year;
        }
    }
?>