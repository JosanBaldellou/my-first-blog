<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <div class="ending">
                <form name="formularios" action="09-finalizar.php" method="post"> 
                    <h4>¿Paga ahora o lo deja pendiente?</h4>
                    <input type="checkbox" name="pay" value="Pagado"/> Pagado <br><br>
                    <h4>Introcude la fecha del pedido:</h4><br>
                    <input type="date" name="date"/><br><br>
                    <input type="submit" name="Añadir" value="Elegir"/>
                </form>
                <form name="back" action="07-verPedido.php">    
                    <input type="submit" name="Volver" value="Volver"/><br>
                </form>
            </div>
        </div>
    </center>
</body>
</html>