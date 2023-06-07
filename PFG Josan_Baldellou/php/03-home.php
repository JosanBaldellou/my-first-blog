<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../css/css.css">
</head>
<body>

    <?php
        session_start();
        if(isset($_GET['nombreRestaurante'])){
            $_SESSION['restauranteIndicado']=$_GET['nombreRestaurante'];
        }
    ?>

    <div class="container">

        <div class="header">
            <?php
                include "funciones.php";
                loadHeader();
                if (isset($_SESSION['pedido'])) {
                    newOrder();
                }
            ?>
        </div>
        <div class="menu">
            <div class="product"><a href="04-productos.php">Nuevo Producto</div>
            <div class="addClient"><a href="04-añadirCliente.php">AñadirCliente</div>
            <div class="makeOrder"><a href="04-hacerPedido.php">Hacer Pedido</div>
            <div class="noPay"><a href="04-verPendientes.php">Ver Pendientes de pago</div>
            <div class="winings"><a href="04-contarcaja.php">Contar Caja</div>
            <div class="back"><a href="02-seleccionaRestaurante.php">Volver</div>
        </div>

    </div>
</body>
</html>