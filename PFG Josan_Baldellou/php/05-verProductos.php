<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO DE PRODUCTOS</title>
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
                <h2>Lista de productos</h2>
                Estos son las categorías de los productos que tienes actualmente
                <form name="categories" action="05-01-productos.php" method="post">
                    <select name="categories">
                    <?php
                        loadingCategories();
                    ?>
                    </select>
                    <br>
                    <input type="submit" value="Elegir"/>
                </form>
                    

                <form name="formularios" action="03-home.php">
                    <input type="submit" name="Volver" value="Volver"/>
                </form>
            </div>
        </div>
    </center>
</body>
</html>