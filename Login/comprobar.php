<?php
session_start();
$usuario = $_POST["usuario"];
$password = $_POST["pass"];
$_SESSION["usuario"] = $usuario;
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
    echo "<script>alert('Contraseña incorrecta');</script>"; // Intentar que se muestre
    header('Location: login.html');
}
