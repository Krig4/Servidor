<?php
session_start();

$usuario = isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sms = isset($_POST["chat"]) ? $_POST["chat"] : '';

    if (!empty($sms)) {
        $hora = date("Y-m-d H:i:s");  // Variable para obtener fecha y hora
        $usuarioMensaje = htmlspecialchars($usuario, ENT_QUOTES, 'UTF-8'); // Escapar contenido del usuario
        $sms = htmlspecialchars($sms, ENT_QUOTES, 'UTF-8'); // Escapar el mensaje

        if (stripos($sms, '<script>') !== false) { //Si el mensaje contiene la palabra script, no lo ejecuta
            header('Location: chat.php');
            exit; 
        }

        $mensaje = "<i>$hora</i>, <strong>$usuarioMensaje</strong>: $sms\n";  // Combinar las tres variables para dar formato al chat
        $myfile = fopen("comentarios.csv", "a") or die("No se ha podido abrir el archivo!");
        fwrite($myfile, $mensaje);
        fclose($myfile);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        #chat-box {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            overflow-y: scroll;
            max-height: 600px;
        }

        #chat-box p {
            margin: 0 0 10px 0;
        }

        form {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            max-width: 600px;;
            margin: 0 auto;
            padding: 20px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            margin-top: 10px;
            text-decoration: none;
        }

        button {
            background-color: #FF4500;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
        }

        button:hover {
            background-color: #FF2200;
        }
    </style>
</head>

<body>
    <h1>Bienvenido al chat de Terra: <?php echo $usuario; ?></h1>
    <div id="chat-box">
        <?php
        $fp = fopen("comentarios.csv", "r");
        while (!feof($fp)) {
            $data = fgets($fp);
            if (!empty($data)) {
                echo $data . "<br>"; // Muestra cada mensaje en el historial
            }
        }
        fclose($fp);
        ?>
    </div>
    <form method="post" action="chat.php">
        <input id="mensaje" type="text" name="chat" placeholder="Escribe aquí tu mensaje">
        <input type="submit" value="Enviar">
    </form>
    <a href="logout.php"><button>Desloguearse</button></a>
</body>
</html>