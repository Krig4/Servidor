<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Suma</title>
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
        $answer = $_GET["respuesta"];
        $numero1 = $_GET["numero1"];        
        $numero2 = $_GET["numero2"];     
    ?>
        <h1>Resultado suma:</h1>
        <p>Tu respuesta es <?php echo $answer; ?>,</p>
        <p>La respuesta es 
        <?php if ($answer == ($numero1 + $numero2)) { ?>
            <span class="correct">correcta</span>
        <?php } else { ?>
            <span class="incorrect">incorrecta</span>
        <?php } ?>
        </p>
    </div>
</body>
</html>
