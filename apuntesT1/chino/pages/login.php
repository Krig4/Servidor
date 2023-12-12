<?php
    require __DIR__."/../bbdd/config.php";
    require __DIR__."/../bbdd/methods.php";
    if(isset($_POST["name"]))
    {
        $usr = FindBy($database, "user", "name", $_POST["name"]);
        if($usr)
        {
            if(password_verify($_POST["pass"], $usr[0]->pass))
            {
                if($usr[0]->rol == "cliente")
                {
                    session_start();
                    $_SESSION["usr"] = serialize($usr[0]);
                    header("Location: ./bookMesa.php");
                }
                else if($usr[0]->rol == "admin")
                {
                    session_start();
                    $_SESSION["usr"] = serialize($usr[0]);
                    header("Location: ./admin.php");
                }
            }
            else
                echo "<script type='text/javascript'>alert('Los datos no son correctos')</script>";    
        }
        else
            echo "<script type='text/javascript'>alert('Los datos no son correctos')</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <form action="./login.php" method="post">
        <input type="text" name="name" id="name">
        <input type="password" name="pass" id="pass">
        <input type="submit" value="Iniciar">
    </form>
    <a href="./signin.php">Registrarte</a>
</body>
</html>