<?php

function Insert($db, $col, $object)
{
    $db -> $col -> insertOne($object);
}

function Find($db, $col, $type, $data)
{
    return $db->$col->findOne([$type=>$data]);
}

function Update($db, $col, $name, $nameValue, $attribute, $value)
{
    $conexion = $db->$col;

    $conexion->updateOne(
        [$name => $nameValue],
        ['$set' => [$attribute => $value]]
    );
}
