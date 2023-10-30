<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        h1 {
            background-color: #0077b6;
            color: #fff;
            padding: 20px;
        }
        form {
            margin: 20px;
            display: flex;
            justify-content: center;
        }
        select {
            padding: 10px;
            border: 1px solid #0077b6;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #0077b6;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #005691;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
            max-width: 600px;
        }
        table, th, td {
            border: 1px solid #0077b6;
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: #0077b6;
            color: #fff;
        }
        </style>
</head>

<body>
    <h1>Modas Paco</h1>
    <form action="shop.php" method="POST">
        <select name="Clothes" id="Clothes">
            <option value="Elegir">Elegir:</option>
            <option value="Camiseta">Camisetas</option>
            <option value="Pantalon">Pantalones</option>
            <input type="submit" value="Buscar" />
        </select>
    </form>
    <?php
    $fp = fopen("inventary.csv", "r");
    while ($line = fgets($fp)) { 
        $type[] = explode(",", $line)[0];
        $size[] = explode(",", $line)[1];
        $color[] = explode(",", $line)[2];
    }
    fclose($fp);
    if (isset($_POST["Clothes"])) {
        echo "<table>";
        echo "<tr><th>Tipo</th><th>Talla</th><th>Color</th></tr>";
        for ($i=0; $i < count($type); $i++) { 
            if ($_POST["Clothes"] == $type[$i]) {
                echo "<tr>";
                echo "<td>" . $type[$i] . "</td>";
                echo "<td>" . $size[$i] . "</td>";
                echo "<td>" . $color[$i] . "</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
        setcookie("clothes", $_POST["Clothes"], time() + 3600);
    } else if (isset($_COOKIE["clothes"])) {
        echo "<table>";
        echo "<tr><th>Tipo</th><th>Talla</th><th>Color</th></tr>";
        for ($i=0; $i < count($type); $i++) { 
            if ($_COOKIE["clothes"] == $type[$i]) {
                echo "<tr>";
                echo "<td>" . $type[$i] . "</td>";
                echo "<td>" . $size[$i] . "</td>";
                echo "<td>" . $color[$i] . "</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
    }
    ?>
</body>

</html>