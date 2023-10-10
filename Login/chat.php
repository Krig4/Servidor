<?php
session_start();
$usuario = $_SESSION["usuario"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
</head>
<body>
    <h1>Bienvenido al chat de Terra: <?php echo $usuario; ?></h1>
</body>
</html>