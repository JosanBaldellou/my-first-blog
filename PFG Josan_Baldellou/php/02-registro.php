<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/css.css">
</head>
<body>

<div class="container">
        <div class="header"></div>

        <div class="form">
            <h1>Registrarse </h1>
            <?php
            include "funciones.php";
                if(isset($_POST['nickname'])){
                    signIn();
            ?>
            <form name="formularios" action="index.php">
                <input type="submit" name="Volver" value="Volver"/>
            </form>
            <?php
                }else{
            ?>
            <form action="registro.php" method="post">
                <input type="text" name="name" placeholder="Nombre"/> <br>
                <input type="text" name="surnames" placeholder="Apellidos"/> <br>
                <input type="text" name="email" placeholder="email"/> <br>
                <input type="text" name="nickname" placeholder="Usuario"/> <br>
                <input type="password" name="password" placeholder="Contraseña"/><br>
                <input type="submit" name="Registrarse" value="Registrarse"/> 
                </form>
            </form>
        
            <form name="formularios" action="01-index.php">
                <input type="submit" name="Volver" value="Volver"/>
            </form>
            <?php
                }
            ?>
        </div>
    </div>










        
</body>
</html>