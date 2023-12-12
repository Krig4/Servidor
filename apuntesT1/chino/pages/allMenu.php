<?php
    require __DIR__."/../bbdd/config.php";
    require __DIR__."/../bbdd/methods.php";
    session_start();
    if(!isset($_SESSION["usr"]))
        header("Location:./login.php");
    else
        $usr = unserialize($_SESSION["usr"]);

    if (isset($_POST["first"]))
    {
        InsertOne($database, "menu", [
            "name"=>$_POST["name"],
            "first"=>$_POST["first"],
            "dessert"=>$_POST["dessert"]
        ]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td{
            border: solid 1px black;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td>Personal</td>
        </tr>
        <tr>
            <td>Nombre</td>
        </tr>
        <?php
            $menu = FindBy($database, "menu", "name", "menu");
            if($menu)
            {
                
                for($i = 0; $i < count($menu); $i += 1)
                {
                    echo "<tr>";
                    echo "<td style='border:solid 1px black'>".$menu[$i]->name."$i</td>";
                    echo "<td style='border:solid 1px black'>".$menu[$i]->$first."$i</td>";
                    echo "<td style='border:solid 1px black'>".$menu[$i]->$dessert."$i</td>";
                    echo "</tr>";
                }
            }
        ?>
    </table>
    <fieldset>
        <legend>Añadir Menu</legend>
        <form action="./allMenu.php" method="post">
            <input type="text" name="name" id="name" value="menu">
            <input type="text" name="first" id="first" required>
            <input type="text" name="dessert" id="dessert" required>
            <input type="submit" value="Añadir">
        </form>
    </fieldset>  
</body>
</html>