<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <title>Producto</title>
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

            <ul class="barra"> 
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

    </nav>

    <div class="ConteinerProducto">

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

            //Obtengo la codigo del producto seleccionado;
            $codProducto = $_GET['id'];

            //Busco la informacion del producto marcado
            $busquedaProducto  = "SELECT * FROM producto WHERE codProducto = $codProducto ";
            $resultado = mysqli_query($conn, $busquedaProducto); //Realizo el query

            //Si encuentra el producto, extraigo la informacion
            if($row = $resultado->fetch_assoc()) 
            {
                $nombreP   = $row["nombreProducto"];
                $IMG_URL_P = $row["URL_imagenProducto"];
                $desc_Prod = $row["descripcionProducto"];
                $precioP   = $row["valorProducto"]; 
                $stockProd = $row["stockProducto"];
                $total = 0; //Declaro la variable total


                //Muestro la informacion del producto
                echo 
                ('
                    <h3>'.$nombreP.'</h3>
            
                    <img src="'.$IMG_URL_P.'" alt="9 de oro">
    
                    <p>'.$desc_Prod.'</p>
            
                    <div class="descripcion">
                
        
                    <h4>Precio Por unidad: $'.$precioP.'</h4> 
                
                ');
                }
    ?>
            <!-- Pequeño formulario para pedir la cantidad            -->
            <form method="POST" id="formulario">
                <label>Cantidad</label>
                <input type="number" name="cantPedida" id="cantPedida">
                <input type="submit" value="Verificar Stock" id="enviar">
                <input type="hidden" name="stock" id="stock" value="<?php print ($row["stockProducto"]);?>">
            </form> 
            
            <!-- Uso JAVASCRIP para que el formulario pueda usarse sin abrir otra página -->
            <script>
                $("#enviar").click(function() {
                    $.ajax({
                        url: "producto.php",
                        type: "POST",
                        data: $("formulario").serialize(),
                    });
                }); 
            </script> 

    <?php
        //Extraigo la cantidad solicitada
        extract($_POST);  
        //Evito error al comienzo con el stocl nulo;
        if(isset($cantPedida)) 
        {
            //Calculo el total del precio
            $total = $cantPedida * $precioP; 
            echo 'Cantidad solicitada: '.$cantPedida.' ';

            //Evaluo si hay stock o no
            if ($cantPedida >  $stock) 
            {
                echo '<h5>Stock disponible: NO </h5>';
            }
            else 
            {
                //Si hay stock, muestro el total y las opciones (botones) para agregar al carro o volver, en caso de la primera, se enviara el codigo del producto y la cantidad.
                echo 
                ('
                <h5>Stock disponible: SI </h5>
                            
                <h4>Total: $'.$total.' </h4>;

                <div class="botonesProducto">

                    <button class="btProducto">
                        <a href="menuCarrito.php?id='.$codProducto.'&cant='.$cantPedida.'">Agregar al carrito</a>
                    </button> 


                    <button class="btProducto">
                        <a href="listaProductos.php">Volver a los productos</a>
                    </button>

                </div>
                ');
            }
        }
                
    ?>


    </div>

    <footer id="contacto" class="footerConteiner">
        <?php
            include 'footer.php';
        ?>
    </footer>
    
    <script src="funcioes.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>