<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Agenda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Ver Agenda</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
        </tr>
        <?php
        $fp = fopen("agenda.csv", "r");
        while (!feof($fp)) 
        {
            $data = fgets($fp). "<br>";
            $arrayFrase=explode(",", $data);
           if(count($arrayFrase)==3)
           {
            echo "<tr>";
            echo "<td>" . $arrayFrase[0] . "</td>";
            echo "<td>" . $arrayFrase[1] . "</td>";
            echo "<td>" . $arrayFrase[2] . "</td>";
            echo "</tr>";
           }
            
        }
        fclose($fp);
        ?>
    </table>
</body>

</html>
