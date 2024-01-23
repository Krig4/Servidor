<?php
    function Insert($db, $collection, $object)
    {
        $db->$collection->insertOne($object);
    }

    function FindBy($db, $collection, $type, $data)
    {
        return $db->$collection->findOne([$type=>$data]);
    }

    function UpdateStudent($db, $username, $gradeToChange, $grade)
    {
        $conexion = $db->student;

        $conexion->updateOne(
            ['username' => $username],
            ['$set' => [$gradeToChange => $grade]]
        );
    }
?>