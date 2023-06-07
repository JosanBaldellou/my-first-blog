<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO DE PRODUCTOS</title>
    <link rel="stylesheet" href="css/css.css">
</head>
<body>
    <center>
        <h2>Formulario de inserción de productos</h2>
        <div class="container">
            <div class="header"></div>

            <form name="formularios" action="añadirProducto.php" method="post">
                <input type="text" name="pName" placeholder="Producto"/><br>
                <select name="category">
                    <option value="Bebidas alcohólicas">Bebidas alc.</option>
                    <option value="Bebidas">Bebidas</option>
                    <option value="Snacks">Snacks</option>
                    <option value="Cafes">Cafés</option>
                    <option value="Bocadillos">Bocadillos</option>
                    <option value="Picoteo">Picoteo</option>
                    <option value="Menú">Menú</option>
                    <option value="Carta">Carta</option>
                </select> <br>
                <input type="number" name="stock" placeholder="Cantidad"/><br>
                <input type="number" step="any" name="uPrice" placeholder="Precio Unitario"/><br>
                <input type="submit" name="enviar" value="Enviar"/>
            </form>
                <br>
                <form name="formularios" action="03-home.php">
                    <input type="submit" name="Volver" value="Volver"/>
                </form>
        </div>
    </center>
</body>
</html>