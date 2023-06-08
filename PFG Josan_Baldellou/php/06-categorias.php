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
            <?php
                session_start();
                if(isset($_GET['cliente'])){
                $_SESSION['cliente']=$_GET['cliente'];
            }
            ?>
            <div class="header">
                <?php
                    include "funciones.php";
                    loadHeader();
                ?>
            
            </div>
            <div class="clientes">
            <form name="categories" action="07-elegirProductos.php" method="post">
                    <select name="categories">
                    <?php
                    loadingCategories();
                    ?>
                    </select>
                    <br>
                    <input type="submit" value="Elegir"/>
                </form>
                <form name="seeOrder" action="07-verPedido.php">    
                    <input type="submit" name="order" value="Ver Pedido"/><br>
                </form>
                <form name="back" action="04-hacerPedido.php">    
                    <input type="submit" name="Volver" value="Volver"/><br>
                </form>

            </div>

        </div>
    </center>
</body>
</html>