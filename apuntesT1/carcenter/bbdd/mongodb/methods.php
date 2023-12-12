<?php
    function GetAllCars($db){
        $carCenter = $db->coches->find();
        foreach($carCenter as $car)
            $cars[] = $car;
        return $cars;
    }
?>