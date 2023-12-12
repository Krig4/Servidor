<?php
    require_once __DIR__.'./../../vendor/autoload.php';

    $config = parse_ini_file(__DIR__."/../config.ini", true);
    $namebd = $config["mongodb"]["namebd"];
    $ip = $config["mongodb"]["ip"];
    $port = $config["mongodb"]["port"];

    $client = new MongoDB\Client("mongodb://$ip:$port");
    $database = $client->$namebd;
?>