<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recoge Datos</title>
    <?php

    $colorfondo = $_GET["fondo"];
    echo "<style>
        body{
            background-color: $colorfondo;
        }
    </style>"
    ?>
</head>

<body>
    <?php
    $number = $_GET["numero"];
    $sentences = ["Has elegido la frase 0", "Has elegido la frase 1", "Has elegido la frase 2"];
    print $sentences[$number];
    ?>
</body>

</html>