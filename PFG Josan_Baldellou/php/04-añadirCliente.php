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
        <h2>Registro de clientes</h2>
        <div class="container">
            <div class="header"></div>


            <div class="clients">
            <form name="formularios" action="añadirCliente.php" method="post">
                <input type="text" name="cName" placeholder="Nombre"/><br>
                <input type="text" name="cSurname" placeholder="Apellidos"/><br>
                <input type="checkbox" name="member" value="Si"/> Socio <br>
                <input type="submit" name="enviar" value="Enviar"/>
            </form>
                <br>
                <form name="formularios" action="03-home.php">
                    <input type="submit" name="Volver" value="Volver"/>
                </form>
            </div>
            
            </div>
        </div>
    </center>
</body>
</html>