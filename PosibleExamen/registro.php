<?php
function guardarUsuario($usuario, $hashPassword) {
    // Simulación de almacenamiento en base de datos
    $usuarios = json_decode(file_get_contents('usuarios.json'), true);
    $usuarios[$usuario] = $hashPassword;
    file_put_contents('usuarios.json', json_encode($usuarios));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    if ($password !== $confirmPassword) {
        echo "Las contraseñas no coinciden. Intenta de nuevo.";
    } else {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        guardarUsuario($usuario, $hashPassword);
        echo "Usuario registrado exitosamente.";
    }
}
?>
