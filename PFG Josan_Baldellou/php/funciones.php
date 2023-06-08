<?php

function loadHeader(){
    print ("<form class='menu' action='03-home.php'>
    <input type='submit' id='home' class='iMenu' value='INICIO'/> 
    </form>
    <form class='menu'  action='04-productos.php'>
    <input type='submit' id='products' class='iMenu' value='PRODUCTOS'/>
    </form>
    <form class='menu' action='04-añadirCliente.php'>
    <input type='submit' id='clients' class='iMenu' value='CLIENTES'/>
    </form>
    <form class='menu' action='04-hacerPedido.php'>
    <input type='submit' id='orders' class='iMenu' value='PEDIDOS'/>
    </form>
    <form class='menu' action='04-verPendientes.php'>
    <input type='submit' id='waiting' class='iMenu' value='PENDIENTES'/>
    </form>
    <form class='menu' action='04-contarCaja.php'>
    <input type='submit' id='money' class='iMenu' value='CAJA'/>
    </form>");
}

function msg(){
    print "<h2>Bienvenido, aquí tienes la lista de restaurantes</h2>";
}

function comprobarLogin() { /*USADA EN HOME*/ 
    require "conexion.php";
    session_start();
    if(isset($_POST['usuario'])){
        $usuario=$_POST['usuario'];
        $_SESSION['usuario']=$_REQUEST['usuario'];
        $password=$_POST['contraseña'];
        //utilizamos la consulta para mostrar si el inicio de sesion es correcto
        $consulta =  "SELECT nickname, contraseña FROM usuarios WHERE nickname='$usuario' AND contraseña='$password'";
        $filas=mysqli_query($conexion,$consulta);
        //si el usuario introducido no es correcto,
        //te devuelve a la pagina de inicio con un mensaje de error (comprobación en formularioPrincipal.php)
        if(mysqli_num_rows($filas)==0) {
            $_SESSION['error']=1;
            header("Location: 01-index.php");
        }
    }else{
        $_SESSION['usuario']=0;
    }
}

function signIn(){
    require "conexion.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $nickname=$_POST['nickname'];
    $name=$_POST['name'];
    $surnames=$_POST['surnames'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $duplicate=mysqli_query($conexion, "SELECT nickname FROM usuarios where nickname='$nickname';");
    $rows = mysqli_num_rows($duplicate);
    if ($rows==0){
        $query="INSERT INTO usuarios VALUES ('$nickname','$name','$surnames','$email','$password');";
        if(mysqli_query($conexion,$query)) {
            echo "Te has registrado con éxito";
        } else {
            echo "No se ha podido realizar la inserción";
        }
    }else{
        echo "Ese nombre de usuario ya está registrado, prueba otro";
    }
}

function mostrarRestaurantes(){ /* USADA EN EL HOME */
    require "conexion.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['usuario'])){
        $usuario=$_SESSION['usuario']; 
        if ($usuario=='admin'){
            $busqueda=mysqli_query($conexion,"SELECT nombre, propietario FROM restaurantes ORDER BY propietario, nombre;");
            $nfilas = mysqli_num_rows ($busqueda);
            if ($nfilas > 0) {
                print ("<TABLE border='1'>");print ("<TR>");
                print ("<TH>Nombre</TH>"); print ("<TH>Propietario</TH>");
                print ("</TR>");
                for ($i=0; $i<$nfilas; $i++) {
                    $resultado = mysqli_fetch_array ($busqueda);
                    print ("<TR>"); 
                    print ("<TD>" . $resultado['nombre'] . "</TD>");
                    print ("<TD>". $resultado['propietario'] . "</TD>");
                    print ("</TR>");
                }
                print ("</TABLE>\n");
            }else{
                print ("<TABLE border='1'>");print ("<TR>");
                print ("<TH>Nombre</TH>"); print ("</TR>");
                print ("<TR>"); 
                print ("<TD>" . "No tienes reataurantes todavía" . "</TD>");
                print ("</TR>");
                print ("</TABLE>\n");
            }
        }else{
            $busqueda=mysqli_query($conexion,"SELECT nombre FROM restaurantes WHERE propietario='$usuario';");
            $nfilas = mysqli_num_rows ($busqueda);
            if ($nfilas > 0) {
                print ("<TABLE border='1'>");print ("<TR>");
                print ("<TH>Nombre</TH>"); print ("</TR>");
                for ($i=0; $i<$nfilas; $i++) {
                    $resultado = mysqli_fetch_array ($busqueda);
                    print ("<TR>"); 
                    print ("<TD><a href='03-home.php?nombreRestaurante="/*con esto nos llevamos los datos a restaurante.php*/. $resultado['nombre'] . "'>" . $resultado['nombre'] . "</TD>"); //incluimos un enlace en el nombre para que nos lleve a reataurante.php
                    print ("</TR>");
                }
                print ("</TABLE>\n");
            }else{
                print ("<TABLE border='1'>");print ("<TR>");
                print ("<TH>Nombre</TH>"); print ("</TR>");
                print ("<TR>"); 
                print ("<TD>" . "No tienes reataurantes todavía" . "</TD>");
                print ("</TR>");
                print ("</TABLE>\n");
            }
        }   
        $_SESSION['propietario']=$usuario;   
    }
}

function addRestaurant(){
    require "conexion.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['propietario'])){
        $owner=$_SESSION['propietario'];
        if (isset($_POST['restaurant'])){
            $restaurant=$_POST['restaurant'];
            $duplicate=mysqli_query($conexion, "SELECT nombre FROM restaurantes where nombre='$restaurant';");
            $rows = mysqli_num_rows($duplicate);
            if ($rows==0){
                $query="INSERT INTO restaurantes (nombre, propietario) VALUES ('$restaurant', '$owner');";
                if(mysqli_query($conexion,$query)) {
                    echo "Restaurante añadido con éxito";
                } else {
                    echo "No se ha podido realizar la inserción";
                }
            }else{
                echo "Ese nombre de restaurante ya está registrado, prueba otro";
            }
        }
    } echo "No hay usuario";
}

function checkProducts(){
    require "conexion.php";
    $busqueda=mysqli_query($conexion,"SELECT categoria FROM productos;");
    $filas = mysqli_num_rows ($busqueda);
    if ($filas>0){
        while ($resultado=mysqli_fetch_array ($consulta)){
            print ('<option value="'.$resultado['categoria'].'">'.$resultado['categoria'].'</option>');
        }
    }else{
        print ('<option>No hay productos</option>');
    }
}

function loadingCategories(){
    require "conexion.php";
    $busqueda=mysqli_query($conexion,"SELECT DISTINCT categoria FROM productos;");
    $filas = mysqli_num_rows ($busqueda);
    while ($resultado=mysqli_fetch_array ($busqueda)){
        print ('<option value="'.$resultado['categoria'].'">'.$resultado['categoria'].'</option>');
    }
}

function addProduct(){
    require "conexion.php";
    session_start();
    $restaurant=$_SESSION['restauranteIndicado'];
    $product=$_POST['pName'];
    $category = $_POST['category'];
    $stock= $_POST['stock'];
    $price=$_POST['uPrice'];
    $busqueda=mysqli_query($conexion,"SELECT id FROM productos WHERE nombre='$product';");
    $rows = mysqli_num_rows($busqueda);
            if ($rows==0){
                $query=mysqli_query($conexion,"INSERT INTO productos (nombre, categoria) VALUES ('$product', '$category');");
                $tryAgain=mysqli_query($conexion,"SELECT id FROM productos WHERE nombre='$product';");
                $resultProduct = mysqli_fetch_array ($tryAgain);
                $idProduct=$resultProduct['id'];
                $queryRestaurant=mysqli_query($conexion,"SELECT id FROM restaurantes WHERE nombre='$restaurant';");
                $resultRestaurant = mysqli_fetch_array ($queryRestaurant);
                $idRestaurant=$resultRestaurant['id'];
                $newQuery=mysqli_query($conexion, "INSERT INTO productos_restaurantes VALUES ('$idProduct','$idRestaurant', '$stock', '$price');");
            }else{
                $resultProduct = mysqli_fetch_array ($busqueda);
                $idProduct=$resultProduct['id'];
                $query=mysqli_query($conexion,"SELECT id FROM restaurantes WHERE nombre='$restaurant';");
                $resultRestaurant = mysqli_fetch_array ($query);
                $idRestaurant=$resultRestaurant['id'];
                $newQuery=mysqli_query($conexion,"INSERT INTO productos_restaurantes VALUES ('$idProduct','$idRestaurant', '$stock', '$price');");
            }   
}

function viewProducts(){
    session_start();
    require "conexion.php";
    $restaurant=$_SESSION['restauranteIndicado'];
    if(isset($_POST['categories'])){
        $category=$_POST['categories'];
        $query=mysqli_query($conexion,"SELECT id FROM restaurantes WHERE nombre='$restaurant'");
        while($resultado = mysqli_fetch_array ($query)){
            $idRestaurant=$resultado['id'];
            $newQuery=mysqli_query($conexion,"SELECT producto, stock, precio FROM productos_restaurantes WHERE restaurante='$idRestaurant'");
            while($resultado2 = mysqli_fetch_array ($newQuery)){
                $idProduct=$resultado2['producto'];
                $anotherQuery=mysqli_query($conexion,"SELECT DISTINCT nombre, categoria FROM productos WHERE categoria='$category' AND id='$idProduct'");
                $nFilas = mysqli_num_rows ($anotherQuery);
                if($nFilas >0) {
                    print ("<TABLE border='1'>");print ("<TR>");
                    print ("<TH>nombre</TH>"); print ("<TH>categoría</TH>");
                    print ("<TH>stock</TH>"); print ("<TH>precioUnidad</TH>");
                    print ("<TH>cantidad</TH>"); print ("</TR>");
                    for ($i=0; $i<$nFilas; $i++) {
                        $resultado3 = mysqli_fetch_array ($anotherQuery);
                        if (isset($_SESSION['pedido'][$idProduct])){
                            $quedan = $resultado2['stock'] - $_SESSION['pedido'][$idProduct];
                        }else{
                            $quedan = $resultado2['stock'];
                        }
                        print ("<TR>"); print ("<TD>" . $resultado3['nombre'] . "</TD>");
                        print ("<TD>" . $resultado3['categoria'] . "</TD>"); 
                        print ("<TD>" . $quedan . "</TD>");
                        print ("<TD>" . $resultado2['precio'] . "</TD>");
                        print ("<TD><input type='number' name=" . $idProduct .
                        " value='0' min='0' max='". $resultado2['stock']. "'/></TD>"); print ("</TR>");
                    }
                }
            }
        }
    }
}

function checkClients(){
    require "conexion.php";
    session_start();
    $restaurant=$_SESSION['restauranteIndicado'];
    $busqueda=mysqli_query($conexion,"SELECT nombre, apellidos, restaurante FROM clientes WHERE restaurante='$restaurant';");
    $nfilas = mysqli_num_rows ($busqueda);
    if ($nfilas > 0) {
        echo "Aquí tienes la lista de todos los clientes";
        print ("<TABLE border='1'>");print ("<TR>");
        print ("<TH>Nombre</TH>"); print ("<TH>Apellidos</TH>");
        print ("</TR>");
        for ($i=0; $i<$nfilas; $i++) {
            $resultado = mysqli_fetch_array ($busqueda);
            print ("<TR>"); 
            print ("<TD>" . $resultado['nombre'] . "</TD>");
            print ("<TD>". $resultado['apellidos'] . "</TD>");
            print ("</TR>");
        }
        print ("</TABLE>\n");
    }else{
        echo "No tienes clientes, añadelos ahora:";
    }
}

function addClient(){ 
    require "conexion.php";
    session_start();
    $restaurant=$_SESSION['restauranteIndicado'];
    $name=$_POST['cName'];
    $surname = $_POST['cSurname'];
    if(isset($_POST['member'])){
        $member= "Si";
    }else{
        $member="No";
    }
    $busqueda=mysqli_query($conexion,"SELECT id FROM clientes WHERE nombre='$name';");
    $rows = mysqli_num_rows($busqueda);
    if ($rows==0 || (($name=="") && ($surname==""))){
        $query=mysqli_query($conexion,"INSERT INTO clientes (nombre, apellidos, socio, nPedidos) VALUES ('$name', '$surname' ,'$member', 0);");
        $tryAgain=mysqli_query($conexion,"SELECT id FROM clientes WHERE nombre='$name';");
        $resultClient = mysqli_fetch_array ($tryAgain);
        $idClient=$resultClient['id'];
        $queryRestaurant=mysqli_query($conexion,"SELECT id FROM restaurantes WHERE nombre='$restaurant';");
        $resultRestaurant = mysqli_fetch_array ($queryRestaurant);
        $idRestaurant=$resultRestaurant['id'];
        $newQuery=mysqli_query($conexion, "INSERT INTO clientes_restaurantes VALUES ('$idClient','$idRestaurant');");
    }else{
        $resultClient = mysqli_fetch_array ($busqueda);
        $idClient=$resultClient['id'];
        $query=mysqli_query($conexion,"SELECT id FROM restaurantes WHERE nombre='$restaurant';");
        $resultRestaurant = mysqli_fetch_array ($query);
        $idRestaurant=$resultRestaurant['id'];
        $newQuery=mysqli_query($conexion,"INSERT INTO clientes_restaurantes VALUES ('$idClient','$idRestaurant');");
    }   
}

function loadingClients(){
    require "conexion.php";
    $member="";
    if(isset($_POST['isMember'])){
    $member=$_POST['isMember'];
    }
    if ($member=="Si"){
        $busqueda=mysqli_query($conexion,"SELECT id, CONCAT (nombre, ' ', apellidos) AS nombrecompleto FROM clientes WHERE socio='Si';");
        $nfilas = mysqli_num_rows ($busqueda);
        if ($nfilas > 0) {
            print ("<TABLE border='1'>");print ("<TR>");
            print ("<TH>Nombre</TH>"); print ("</TR>");
            for ($i=0; $i<$nfilas; $i++) {
                $resultado = mysqli_fetch_array ($busqueda);
                print ("<TR>"); 
                print ("<TD><a href='06-categorias.php?cliente=". $resultado['id'] . "'>" . $resultado['nombrecompleto'] . "</TD>");
                print ("</TR>");
            }
            print ("</TABLE>\n");
        }
    }else if($member=="No"){
        $busqueda=mysqli_query($conexion,"SELECT id, CONCAT (nombre, ' ', apellidos) AS nombrecompleto FROM clientes  WHERE socio='No';");
        $nfilas = mysqli_num_rows ($busqueda);
        if ($nfilas > 0) {
            print ("<TABLE border='1'>");print ("<TR>");
            print ("<TH>Nombre</TH>"); print ("</TR>");
            for ($i=0; $i<$nfilas; $i++) {
                $resultado = mysqli_fetch_array ($busqueda);
                print ("<TR>"); 
                print ("<TD><a href='06-categorias.php?cliente=". $resultado['id'] . "'>" . $resultado['nombrecompleto'] . "</TD>");
                print ("</TR>");
            }
            print ("</TABLE>\n");
        }
    }else{
        $busqueda=mysqli_query($conexion,"SELECT id, CONCAT (nombre, ' ', apellidos) AS nombrecompleto FROM clientes;");
        $nfilas = mysqli_num_rows ($busqueda);
        if ($nfilas > 0) {
            print ("<TABLE border='1'>");print ("<TR>");
            print ("<TH>Nombre</TH>"); print ("</TR>");
            for ($i=0; $i<$nfilas; $i++) {
                $resultado = mysqli_fetch_array ($busqueda);
                print ("<TR>"); 
                print ("<TD><a href='06-categorias.php?cliente=". $resultado['id'] . "'>" . $resultado['nombrecompleto'] . "</TD>");
                print ("</TR>");
            }
            print ("</TABLE>\n");
        }
    }
}

function addToOrder(){
    session_start();
    $contador=0; //variable para llevar el recuento de las lineas del pedido
    $envio=0; //variable para comprobar si los productos se añaden correctamente
    //recorremos todos los códigos y nos traemos la cantidad en cada código
    foreach ($_POST as $codigo => $cantidad) {
        //si hay una cantidad puesta, guardamos en el pedido ese índice con su cantidad
        if ($cantidad > 0 && $codigo !='Añadir') {
            $_SESSION['pedido'][$codigo] = $cantidad;
            $envio=1;
            $contador++;
            echo $cantidad . " " . $codigo . " " . $_SESSION['pedido'] . " " . $envio . " " . $contador;
        }    
    }
    $_SESSION['contador']=$contador;
}

function checkOrder(){
    require "conexion.php";
        session_start();
        $precioTotal=0;
        if (isset($_SESSION['pedido'])) {
            print ("<TABLE border='1'>");print ("<TR>");
                print ("<TH>Codigo</TH>"); print ("<TH>Nombre</TH>");
                print ("<TH>Cantidad</TH>"); print ("<TH>PrecioUnidad</TH>");
                print ("<TH>PrecioTotal</TH>"); print ("</TR>");
            //recorremos todos los códigos y nos traemos la cantidad en cada código
            foreach ($_SESSION['pedido'] as $codigo => $cantidad) {
                //mostamos la tabla
                //si hay una cantidad puesta, mostraremos los productos en una tabla
                if ($cantidad > 0 && $codigo !='Añadir') {
                    $consulta=mysqli_query($conexion, "SELECT nombre, precioUnidad, stock FROM productos WHERE id='$codigo'");
                    while ($resultado=mysqli_fetch_array ($consulta)){
                        $precio=$cantidad*$resultado['precioUnidad'];
                        print ("<TR>");
                        print ("<TD>" . $codigo . "</TD>");
                        print ("<TD>" . $resultado['nombre'] . "</TD>"); 
                        print ("<TD>" . $cantidad) . ("</TD>");
                        print ("<TD>" . $resultado['precioUnidad'] . "€". "</TD>");
                        print ("<TD>" . $precio . "€". "</TD>");
                        print ("</TR>");
                        $precioTotal += $precio;
                        $_SESSION['stock']=$resultado['stock']-$cantidad;
                    } 
                } 
            }
        print ("<TR>");
        print("<TD>" . " " . "</TD>");
        print("<TD>" . " Precio Final " . "</TD>");
        print("<TD>" . "" . "</TD>");
        print("<TD>" . "" . "</TD>");
        print("<TD>" . $precioTotal."€" . "</TD>"); 
        print ("</TR>");
        print("</TABLE>");
        $_SESSION['total']=$precioTotal;
    }
}

function ending(){
    $ok=0;
    session_start();
    if (isset($_POST['pay'])){
        $pagado="Pagado";
    }else{
        $pagado="Pendiente";
    }
    $date=$_POST['date'];
    $client= $_SESSION['cliente'];
    $total=$_SESSION['total'];
    $restaurant=$_SESSION['restauranteIndicado'];
    require "conexion.php";
    $busqueda=mysqli_query($conexion, "SELECT nPedidos FROM clientes WHERE id='$client';");
    $newQuery=mysqli_query($conexion, "SELECT id FROM restaurantes WHERE nombre='$restaurant';");
    $resultRestaurant = mysqli_fetch_array ($newQuery);
    $idRestaurant=$resultRestaurant['id'];
    $resultClient = mysqli_fetch_array ($busqueda);
    $pedidos=$resultClient['nPedidos'];
    $query=mysqli_query($conexion,"INSERT INTO pedidos (cliente, fecha, estado, precioTotal, restaurante) VALUES ('$client', '$date', '$pagado', $total, '$idRestaurant');");
    $consulta=mysqli_query($conexion, "SELECT id FROM pedidos ORDER BY id DESC LIMIT 1");
    $resultado = mysqli_fetch_array ($consulta);
    $idOrder =$resultado['id'];
    foreach ($_SESSION['pedido'] as $codigoProducto => $cantidad) {
        $consulta2=mysqli_query($conexion, "SELECT id, stock, precioUnidad FROM productos WHERE id='$codigoProducto'");
        $resultado2 = mysqli_fetch_array ($consulta2);
        $stock=$resultado2['stock'];
        $precioUnidad=$resultado2['precioUnidad'];
        $precio=$cantidad*$precioUnidad;
        $contador=$_SESSION['contador'];
        mysqli_query($conexion, "INSERT INTO productos_pedidos VALUES ('$codigoProducto', '$idOrder', '$cantidad');");
        $stock-=$cantidad;
        mysqli_query($conexion, "UPDATE productos SET stock='$stock' WHERE id='$codigoProducto'");
        $ok=1;
    }
    if($ok==1){
        $_SESSION['end']="Pedido registrado con éxito";
        $pedidos++;
        mysqli_query($conexion, "INSERT INTO clientes (nPedidos) VALUES ('$pedidos') WHERE id='';");
    }else{
        $_SESSION['end']="No se ha podido registrar el pedido";
    }
}

function confirmation(){
    if (isset($_SESSION['end'])){
        $msg=$_SESSION['end'];
    }
    echo $msg;
}

function noPay(){
    session_start();
    require "conexion.php";
    $restaurant=$_SESSION['restauranteIndicado'];
    $find=mysqli_query($conexion, "SELECT id FROM restaurantes WHERE nombre='$restaurant'");
    $resultado=mysqli_fetch_array ($find);
    $idRestaurant=$resultado['id'];
    $consulta=mysqli_query($conexion, "SELECT * FROM pedidos WHERE estado='Pendiente' AND restaurante='$idRestaurant'");
    $nFilas = mysqli_num_rows ($consulta);
    if($nFilas>0){
        while ($resultado=mysqli_fetch_array ($consulta)){
            $idClient=$resultado['cliente'];
            $consulta2=mysqli_query($conexion, "SELECT CONCAT (nombre, ' ', apellidos) AS nombrecompleto FROM clientes WHERE id='$idClient'");
            $resultado2=mysqli_fetch_array ($consulta2);
            print "<h3>Estos son los pedidos sin pagar</h3>";
            print ("<TABLE border='1'>");print ("<TR>");
            print ("<TH>Nombre</TH>"); print ("<TH>Pedido</TH>");
            print ("<TH>Fecha</TH>"); print ("<TH>Estado</TH>");
            print ("<TH>PrecioTotal</TH>"); print ("</TR>");
            print ("<TR>"); 
            print ("<TD>" . $resultado2['nombrecompleto'] . "</TD>");
            print ("<TD>". $resultado['id'] . "</TD>");
            print ("<TD>". $resultado['fecha'] . "</TD>");
            print ("<TD>". $resultado['estado'] . "</TD>");
            print ("<TD>". $resultado['precioTotal'] . "</TD>");
            print ("</TR>");
        }
        print ("</TABLE>\n");
    }else{
        echo "No tienes pedidos pendientes de pago";
    }
}

function countWinnings(){
    session_start();
    require "conexion.php";
    $restaurant=$_SESSION['restauranteIndicado'];
    $wininngs=0;
    $date=$_POST['money'];
    $find=mysqli_query($conexion, "SELECT id FROM restaurantes WHERE nombre='$restaurant'");
    $resultado=mysqli_fetch_array ($find);
    $idRestaurant=$resultado['id'];
    $consulta=mysqli_query($conexion, "SELECT precioTotal FROM pedidos WHERE fecha='$date' AND restaurante='$idRestaurant'AND estado='Pagado'");
    while ($resultado=mysqli_fetch_array ($consulta)){
        $wininngs+=$resultado['precioTotal'];
    }
    if(isset($wininngs)){
    print "<h3>La cantidad ganada hoy es de: " . $wininngs. "€</h3>";
    }
}

function newOrder(){
    if(isset($_SESSION['pedido'])){
    unset ($_SESSION['pedido']);
    }
}
?>