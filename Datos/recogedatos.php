<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recoge Datos</title>  
    <style>
        body {
            font-family: 'Fira Sans', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .cuadrado {
            height: 20px;
            width: 20px;
            background-color: <?php echo $color = $_GET["color"]; ?>;
            display: inline-block;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $name = $_GET["nombre"];
        $edad = $_GET["edad"];
        $sexo = $_GET["sexo"];
        $news = $_GET["noticias"];
        ?>

        <h1>Recoge Datos</h1>
        <p>Tu nombre es <?php echo $name; ?>,</p>
        <p>tienes <?php echo $edad; ?> años,</p>
        <p>tu sexo es <?php echo $sexo; ?>,</p>
        <p>tu color favorito es: <div class='cuadrado'></div>,</p>
        <p>y <?php echo $news == "si" ? "deseas recibir noticias." : "no deseas recibir noticias."; ?></p>
    </div>
</body>
</html>
