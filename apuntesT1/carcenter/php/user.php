<?php
class User{
    public $name;
    public $surname;
    public $birthdate;
    public $rol;
    public $money;

    public function __construct($name, $surname, $birthdate, $rol) {
        $this->name = $name;
        $this->surname = $surname;
        $this->birthdate = $birthdate;
        if($rol == 1)
            $this->rol = "admin";
        else if ($rol == 2)
            $this->rol = "client";
        $this->money = 100000;
    }

    public function Substract_money($substract){
        if($this->rol == "client")
            $this->money -= $substract;
    }
}
?>