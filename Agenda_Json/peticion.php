<?php
$url = "192.168.4.205/Servidor/AgendaConJson/agenda.json";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$json = curl_exec($curl);
curl_close($curl);

$objeto_json = json_decode($json);
for ($i = 0; $i < count($objeto_json); $i++) {
    echo $objeto_json[$i]->name;
    echo $objeto_json[$i]->surname;
    echo $objeto_json[$i]->tel;
}
