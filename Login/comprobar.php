<?php
session_start(); // Lo usamos para mantener el usuario en distintos php y paginas
$usuario = $_POST["usuario"];
$password = $_POST["pass"];
$_SESSION["usuario"] = $usuario; // Declaro variables que quiero mantener con esta estructura para el futuro de las paginas
$_SESSION["pass"] = $password;
$login = false;
$fp = fopen("usuarios.csv", "r");
while (!feof($fp)) {
    $data = fgets($fp);
    $arrayFrase = explode(",", $data);
    if (count($arrayFrase) == 2) {
        if ($usuario == $arrayFrase[0] && $password == $arrayFrase[1]) {
            $login = true;
            break;
        }
    }
}
fclose($fp);
if ($login) {
    header('Location: chat.php'); // Te manda a cualquier archivo directamente sin verse por el usuario
} else {
    // Intentar mostrar un mensaje de error al login
    header('Location: login.html');
}
