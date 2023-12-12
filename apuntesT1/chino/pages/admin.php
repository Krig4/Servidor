<?php
    require __DIR__."/../php/user.php";
    session_start();
    if(!isset($_SESSION["usr"]))
        header("Location:./login.php");
    else
        $usr = unserialize($_SESSION["usr"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>
<body>
    <header>
        <h3>Hola <?php echo $usr->name?></h3>
    </header>
    <nav>
        <ul>
            <li><a href="./allMenu.php">Gestionar Menús</a></li>
            <li><a href="./newPersonal.php">Gestionar personal</a></li>
        </ul>
    </nav>
    <table>
        <tr>
            <td>Mesa</td>
        </tr>
        <tr>
            <td>Num</td>
            <td>Camarero</td>
            <td>Menú</td>
            <td>Gestionar</td>
        </tr>
    </table>
</body>
</html>