<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/css.css">
    <title>INICIA SESIÓN</title>
</head>
<body>
    <div class="container">
        <div class="header"></div>
        <div class="form">
        <h1>Iniciar sesión </h1>
        <form action="02-seleccionaRestaurante.php" method="post">
            <input type="text" name="usuario" placeholder="Usuario"/> <br>
            <input type="password" name="contraseña" placeholder="Contraseña"/><br>
            <input type="submit" name="Iniciar sesión" value="Iniciar sesión"/>
        </form>
        <form name="formularios" action="02-registro.php">    
            <input type="submit" name="Registrarse" value="Registrarse"/> <br>
        </form>
        </div>
        
    </div>
</body>
</html>