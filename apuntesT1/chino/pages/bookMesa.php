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
    <title>Reservar Mesa</title>
</head>
<body>
    <h3><?php echo "Hola ".$usr->name?></h3>
    <fieldset>
        <legend>Reservar una mesa</legend>
    </fieldset>
</body>
</html>