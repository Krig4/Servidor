<?php
    require __DIR__."/../bbdd/config.php";
    require __DIR__."/../bbdd/methods.php";
    session_start();
    if(!isset($_SESSION["usr"]))
        header("Location:./login.php");
    else
        $usr = unserialize($_SESSION["usr"]);

    if (isset($_POST["name"]))
    {
        InsertOne($database, "user", [
            "name"=>$_POST["name"],
            "pass"=>password_hash($_POST["pass"], PASSWORD_DEFAULT),
            "role"=>"waiter",
            "state" => 1
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
            $waiter = FindBy($database, "user", "rol", "waiter");
            if($waiter)
            {
                
                for($i = 0; $i < count($waiter); $i += 1)
                {
                    echo "<tr>";
                    echo "<td style='border:solid 1px black'>".$waiter[$i]->name."</td>";
                    echo "</tr>";
                }
            }
        ?>
    </table>
    <fieldset>
        <legend>Añadir</legend>
        <form action="./newPersonal.php" method="post">
            <input type="text" name="name" id="name" required>
            <input type="password" name="pass" id="pass" required>
            <input type="submit" value="Añadir">
        </form>
    </fieldset>  
</body>
</html>