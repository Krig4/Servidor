<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuadernillo Rubio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
            margin-top: 30px;
        }

        p {
            color: #666;
        }

        form {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        h4 {
            font-size: 20px;
            color: #333;
            margin-top: 10px;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Suma de Números Aleatorios</h1>
    <p>Rellena la suma de los siguientes dos números:</p>
    
    <form id="formulario" method="GET" action="recogesuma.php">
        <input type="number" name="numero1" value=<?php echo $numero1 = rand(1,20);?> hidden>            
        <input type="number" name="numero2" value=<?php echo $numero2 = rand(1,20);?> hidden>
        <h4><?php echo "$numero1 + $numero2 = " ?></h4>            
        <input type="number" id="respuesta" name="respuesta">
        <br>
        <input type="submit" value="Comprobar">
    </form>
</body>
</html>
