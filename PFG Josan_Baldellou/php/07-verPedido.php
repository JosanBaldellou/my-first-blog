<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/css.css">
</head>
<body>
    <center>
    <?php
        include "funciones.php";
        checkOrder();
    ?>

    <form name="end" action="08-finalizar.php" method="post">
        <input type="submit" value="Finalizar">
    </form> 

    <form name="volver" action="06-categorias.php" method="post">
        <input type="submit" value="Volver">
    </form> 
    </center>
</body>
</html>