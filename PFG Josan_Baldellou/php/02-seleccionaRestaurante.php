<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="../css/css.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <?php
            include "funciones.php";
                if(isset($_POST['usuario'])){
                    comprobarLogin();
                }
                    msg();
            ?>
        </div>

        <div class=restaurants>
            <?php
                mostrarRestaurantes();
            ?>
        </div>

        <div class="formR">
            <h1>Registro de restaurantes</h1>
            <form action="auxiliar.php" method="post">
            <input type="text" name="restaurant" placeholder="Nombre Restaurante"/> <br>
            <input type="submit" name="Enviar" value="Enviar"/>
        </form>
            <form name="back" action="01-index.php">    
                <input type="submit" name="Volver" value="Volver"/><br>
            </form>
        </div>
    </div>
</body>
</html>