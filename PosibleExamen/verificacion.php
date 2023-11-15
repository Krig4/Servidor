<?php
function obtenerHashPassword($usuario) {
    // Simulación de consulta a la base de datos
    $usuarios = json_decode(file_get_contents('usuarios.json'), true);
    return $usuarios[$usuario] ?? null;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuarioVerificar = $_POST["usuario_verificar"];
    $passwordVerificar = $_POST["password_verificar"];

    $hashGuardado = obtenerHashPassword($usuarioVerificar);

    if ($hashGuardado && password_verify($passwordVerificar, $hashGuardado)) {
        echo "Verificación exitosa. Bienvenido, $usuarioVerificar!";
    } else {
        echo "Error en la verificación. Usuario o contraseña incorrectos.";
    }
}
?>
