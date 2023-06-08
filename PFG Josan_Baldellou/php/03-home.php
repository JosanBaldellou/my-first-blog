<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script type="text/javascript" src="../js/ajax.js"></script>
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
            <h2>BIENVENIDO AL HOME DE TU RESTAURANTE</h2>
            <?php
                if (isset($_SESSION['pedido'])) {
                    newOrder();
                }
            ?>
        </div>
        <div class="home">
            <div class="product">
                <a href="04-productos.php">
                    <button id="ref">Nuevo Producto </button>
                </a>
            </div>

            <div class="addClient">
                <a href="04-añadirCliente.php">
                    <button id="ref">Añadir Cliente </button>
                </a>
            </div>

            <div class="makeOrder">
                <a href="04-hacerPedido.php">
                    <button id="ref">Hacer Pedido </button>
                </a>
            </div>

            <div class="noPay">
                <a href="04-verPendientes.php">
                    <button id="ref">Ver pendeintes de pago </button>
                </a>
            </div>

            <div class="winnings">
                <a href="04-contarcaja.php">
                    <button id="ref">Contar Caja </button>
                </a>
            </div>

            <div class="back">
                <a href="02-seleccionaRestaurante.php">
                    <button id="ref">Volver </button>
                </a>
            </div>
        </div>

    </div>
</body>
</html>