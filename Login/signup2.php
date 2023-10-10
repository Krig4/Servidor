<?php
$usuario = $_POST["usuario"];
$password = $_POST["pass"];
$userFree = true; // Suponemos que el usuario está libre inicialmente

// Abre el archivo para lectura
$fp = fopen("usuarios.csv", "r");
if ($fp) {
    while (($data = fgets($fp)) !== false) {
        $arrayFrase = explode(",", $data);
        if (count($arrayFrase) == 2) {
            $existingUser = trim($arrayFrase[0]);
            if ($usuario == $existingUser) {
                $userFree = false; // El usuario ya existe
                break;
            }
        }
    }
    fclose($fp);
} else {
    die("No se ha podido abrir el archivo!");
}

if ($userFree) {
    $myfile = fopen("usuarios.csv", "a");
    if ($myfile) {
        $txt = "$usuario, $password\n";
        fwrite($myfile, $txt);
        fclose($myfile);
    } else {
        die("No se ha podido abrir el archivo!");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrado</title>
</head>

<body>
    <div>
        <?php
        if ($userFree) {
            echo "<h1>Te has registrado correctamente</h1>";
        } else {
            echo "<h1>El nombre de usuario ya está en uso. Por favor, elige otro.</h1>";
        }
        ?>
        <a href="login.html"><button>Volver al Menú Principal</button></a>
    </div>
</body>

</html>
