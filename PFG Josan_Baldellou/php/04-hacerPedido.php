<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <div class="clientes">
                     
            <form action="05-cargarClientes.php" method="post">
                <h3>¿Es socio?</h3>
                <input type="radio" name="isMember" value="Si"> Sí<br>
                <input type="radio" name="isMember" value="No"> No<br>
                <input type="submit" name="Enviar" value="Enviar"/>
            </form>
            <form name="back" action="03-home.php">    
                <input type="submit" name="Volver" value="Volver"/><br>
            </form>

        </div>
    </center>
</body>
</html>