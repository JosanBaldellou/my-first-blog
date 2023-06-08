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
        <div class="products">
        <h3>¿Deseas añadir productos, o ver los existentes?</h3>
        <form name="formularios" action="05-añadirProducto.php">
            <input type="submit" name="addProduct" value="Añadir Producto"/>
        </form>

        <form name="formularios" action="05-verProductos.php">
            <input type="submit" name="seeProducts" value="Ver Productos"/>
        </form>

        <form name="formularios" action="03-home.php">
            <input type="submit" name="back" value="Volver"/>
        </form>

        </div>


    </div>
</body>
</html>