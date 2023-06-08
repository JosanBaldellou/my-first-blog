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
            <div class="counting">
                <?php
                    ending();
                    confirmation();
                ?>
                <form name="back" action="03-home.php">    
                    <input type="submit" name="Volver" value="Volver"/><br>
                </form>
            </div>
        </div>
    </center>
</body>
</html>