<?php
    require '../bbdd/mongodb/config.php';
    require '../bbdd/mongodb/methods.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <style>
        body{
            display: flex;
            justify-content: center;
        }

        form{
            padding: 1%;
        }

        form .data{
            display: flex;
            flex-direction: row;
            gap: 5%;
        }

        form .data .labels, .fields{
            display: flex;
            flex-direction: column;
        }

        form .data .labels label{
            margin-bottom: 17px;
        }

        form .data .fields input, select{
            margin-bottom: 10px;
        }

        table{
            width: 50%;
            margin-top: 10%;
            border-collapse: collapse;
        }

        table tr td{
            border: solid 1px black;
            width: 200px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php
        $cars = GetAllCars($database);
        if (count($cars) > 0)
        {
            echo "<table>";
            echo "<tr>";
            echo "<td>Marca</td>";
            echo "<td>Modelo</td>";
            echo "<td>Año</td>";
            echo "</tr>";
            for($i = 0; $i < count($cars); $i += 1)
            {
                echo "<tr>";
                echo "<td>".$cars[$i]->brand."</td>";
                echo "<td>".$cars[$i]->model."</td>";
                echo "<td>".$cars[$i]->year."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>
</body>
</html>