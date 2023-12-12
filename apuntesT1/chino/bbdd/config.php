<?php
require_once __DIR__.'/../vendor/autoload.php';

$config = parse_ini_file("config.ini", true);
$namebd = $config["namebd"];
$ip = $config["ip"];
$port = $config["port"];

$client = new MongoDB\Client("mongodb://$ip:$port");
$database = $client->$namebd;

$adminPass = password_hash("admin", PASSWORD_DEFAULT);

$admin = $database->user->findOne(["rol" => "admin"]);

if(!$admin)
{
    $database->user->insertOne(
        [
            "name"=>"admin",
            "pass"=>$adminPass,
            "rol"=>"admin"
        ]
    );
}
?>