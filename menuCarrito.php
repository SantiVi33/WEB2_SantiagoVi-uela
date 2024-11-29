<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <title>Carrito</title>
</head>
<body>
    <header>

        <div class="Cabecera">
            <?php
                include 'cabecera.php';
            ?>
        </div>

    </header>

    <nav class="Botones">
        <!-- <div class="Botones"> -->

            <ul class="barra"> 
            <!-- <ul> -->
                <div class="n1">
                    
                    <li>
                        <a href="nosotros.php">Quienes Somos</a>
                    </li>

                </div>

                <div class="n1">
                    
                    <li>
                        <a href="#contacto">Contacto</a>
                    </li>

                </div>

                <div class="n1">
                    
                    <li>
                        <a href="listaProductos.php">Productos</a>
                    </li>
                    
                </div>



            </ul> 

        <!-- </div> -->
        
    </nav>

    <div class="tablaProductos">

        <p>Hola {Usuario} este es su carrito actualmente</p>

        <?php
            date_default_timezone_set("America/Argentina/Buenos_Aires");

            //Configuracion de la conexion a la base de datos
            $nameServer = "localhost";
            $nameUser = "root";
            $pass = "";
            $nameDB = "sanromar";
            
            //Establecer conexion a la base de datos
            
            $conn = mysqli_connect ($nameServer, $nameUser, $pass, $nameDB);
            
            //Verificar la conexion
            
            if (!$conn) 
            {
                die("Error de conexion a la base de datos: " . mysqli_connect_error());
            }

            //Obtengo la codigo y la cantidad del producto seleccionado;
            $codProducto = $_GET['id'];
            $cantidad = $_GET['cant'];

            //Busco el producto segun su codigo y realizo la query
            $busquedaProducto  = "SELECT * FROM producto WHERE codProducto = $codProducto ";
            $resultado = mysqli_query($conn, $busquedaProducto);

            //Extraigo la informacion necesaria
            if($row = $resultado->fetch_assoc())
            {
                $nombreP   = $row["nombreProducto"];
                $precioP   = $row["valorProducto"]; 
                $total = $precioP * $cantidad;

            //Muestro la informacion
                echo 
                ('
                    <div class="tabla">
                        <table>
                            <caption>Carrito</caption>
                                    <tr>
                                        <th class="thProd">Producto</th>
                                        <th>Cantidad</th>
                                        <th>Valor</thd>
                                    </tr>
                                <tr>
                                    <td class="prodCarr">'.$nombreP.'</td>
                                    <td>'.$cantidad.'</td>
                                    <td>'.$precioP.'</td>
                                </tr>
                        </table>
                        <div class="textCompra">
                            <h3 class="textTotal">
                                Total:$ '.$total.'
                                <p class="textEmergente">Recuerde que si esta registrado como comercio tiene un descuento final del 5%</p>
                            </h3>
                        </div>
                    </div>
                ');
            }
            //Cierro la base de datos 
            mysqli_close($conn);
        ?>
        
       

    </div>

    <div class="botonesProducto">

        
        <button class="btCarrito">
            <a href="#">Finalizar compra</a>
        </button> 


        <button class="btCarrito">
            <a href="listaProductos.php">Volver a los productos</a>
        </button>


    </div>

    <footer id="contacto" class="footerConteiner">
        <?php
            include 'footer.php';
        ?>
    </footer>
    
</body>
</html>