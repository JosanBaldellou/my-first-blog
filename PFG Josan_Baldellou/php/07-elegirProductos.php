<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center>
        <div class="container">
            <div class="header"></div>
            <div class="products">
                <form name="formularios" action="añadirAlCarrito.php" method="post"> 
                    <?php
                        include "funciones.php";
                        viewProducts();
                    ?>
                    <input type="submit" name="Añadir" value="Elegir"/>
                </form>
                <form name="back" action="06-categorias.php">    
                    <input type="submit" name="Volver" value="Volver"/><br>
                </form>
            </div>
        </div>
    </center>
</body>
</html>