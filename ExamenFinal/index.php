<?php
require './config.php';
require './method.php';

session_start();
if (isset($_POST['usrLog']) && isset($_POST['pwdLog'])) {
    $usr = $_POST['usrLog'];
    $pwd = $_POST['pwdLog'];
    echo "Inicio de sesión exitoso.";
    header("Location: ./mostrartabla.php");
    exit(); 
    function verifyCredentials($conn, $usr, $pwd)
{
    try {
        $sql = "SELECT pwd FROM estudiantes WHERE usr = '$usr'";
        $stmt = $conn->query($sql);

        $hashedPwd = $stmt->fetchColumn();

        return ($hashedPwd !== false) && password_verify($pwd, $hashedPwd);
    } catch (PDOException $e) {
        echo "Error al verificar credenciales: " . $e->getMessage();
        return false;
    }
}
    if (verifyCredentials($conn, $usr, $pwd)) {
        $_SESSION['usrLog'] = $usr;
        $num = $_POST['numero'];

        echo "Inicio de sesión exitoso.";
        $num = $_POST['numero'];
        header("Location: ./mostrartabla.php?tabla=").$num;
        exit(); 
    } else {
        echo "<p style='color:red;'> Credenciales incorrectas.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALBERTO_GUERRA_TURNO_ESTRIBOR</title>
    <style>
        body{
            background-color: green;
        }
    </style>
    
</head>
<body>
<h3>INICIO DE SESION - ALUMNO</h3>
    <form action="index.php" method="POST">
        <label for="usrLog">Usuario: </label>
        <input type="text" name="usrLog" id="usrLog" placeholder="usuario" required>
        <label for="pwdLog">Contraseña</label>
        <input type="password" name="pwdLog" id="pwdLog" required>
        <label for="numero">Selecciona un numero:</label>
        <select name="numero" id="numero">
        <?php for ($i = 1; $i <= 10; $i++) : ?>
            <option value=<?=$i ?>><?=$i ?></option>
            <br>
        <?php endfor; ?>
        </select>
        <input type="submit" value="Enviar">
    </form>
    <br>
    <br>
    <a href="./crearusuarios.php"><button>Nuevo Alumno</button></a>
</body>
</html>