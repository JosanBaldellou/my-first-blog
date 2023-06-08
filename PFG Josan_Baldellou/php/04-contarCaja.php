<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" type="text/css" href="../css/css.css">
</head>
<body>
    <div class="container">

        <div class="header">
            <?php
                include "funciones.php";
                loadHeader();
                ?>
        </div>

        <div class="dateCounting">

        <form name="formularios" action="05-ganancias.php" method="post">
            <p>Dime de que fecha quieres comprobar tus ganancias:<br></p>
            <input type="date" name="money"/><br>
            <input type="submit" name="countingWinnings" value="Ver Caja"/>
        </form>

        <form name="formularios" action="03-home.php">
            <input type="submit" name="back" value="Volver"/>
        </form>

        </div>


    </div>
</body>
</html>