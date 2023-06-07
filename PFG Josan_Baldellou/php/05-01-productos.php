<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <center>
        <div class="container">
            <div class="header"></div>
            <div class="products">
                <form name="formularios" action="actualizarStock.php" method="post"> 
                    <?php
                        include "funciones.php";
                        viewProducts();
                    ?>     
                </form>

                <form name="formularios" action="04-productos.php">
                    <input type="submit" name="Volver" value="Volver"/>
                </form>

            </div>
        </div>
    </center>
</body>
</html>