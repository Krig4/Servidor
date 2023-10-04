<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operaciones Matemáticas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
            margin: 10px 0;
        }

        .correct {
            color: #008000;
            font-weight: bold;
        }

        .incorrect {
            color: #FF0000;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $numero1 = rand(1, 20);
        $numero2 = rand(1, 20);
        $operaciones = ["+", "-", "*"];
        $operacion = $operaciones[array_rand($operaciones)];
        $resultado = 0;
        $mensaje = "";

        if ($operacion === "+") {
            $resultado = $numero1 + $numero2;
        } elseif ($operacion === "-") {
            $resultado = $numero1 - $numero2;
        } elseif ($operacion === "*") {
            $resultado = $numero1 * $numero2;
        }
        ?>

        <h1>Operación Matemática</h1>
        <p>Resuelve la siguiente operación:</p>
        <p><?php echo "$numero1 $operacion $numero2 = ?"; ?></p>

        <form method="GET" action="recogesuma.php">
            <input type="hidden" name="numero1" value="<?php echo $numero1; ?>">
            <input type="hidden" name="numero2" value="<?php echo $numero2; ?>">
            <input type="hidden" name="operacion" value="<?php echo $operacion; ?>">
            <input type="number" name="respuesta" required>
            <br>
            <input type="submit" value="Comprobar">
        </form>
    </div>
</body>
</html>
