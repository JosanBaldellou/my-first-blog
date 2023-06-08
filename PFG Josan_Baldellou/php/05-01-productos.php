<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="../css/css.css">
</head>
<body>
<center>
        
        <div class="container">
            <div class="header">
                <?php
                    include "funciones.php";
                    loadHeader();
                ?>
            
            </div>
                <?php
                    viewProducts();
                ?>
                <form name="formularios" action="04-productos.php">
                    <input type="submit" name="Volver" value="Volver"/>
                </form>
        </div>
    </center>
</body>
</html>