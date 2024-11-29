<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <title>SanRoMar</title>
</head>
<body>
    <header>

        <div class="Cabecera">
            <?php
                include 'cabecera.php';
            ?>
        </div> 

    </header>

    '<nav class="Botones">

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

    <div class="granConteiner"> 

       
      <article class="conteiner">  

            <h2>OFERTAS DEL DÍA</h2><br>
    

        <div class="ofertas">

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

                //Muestro los 6 primeros productos de la base de datos
                for ($i=1; $i <= 6; $i++) { 

                    //Busco un producto por codigo
                    $busquedaProducto  = 'SELECT nombreProducto, URL_imagenProducto, valorProducto  FROM producto WHERE codProducto = '.$i.' ';

                    //Realizo el query 
                    $resultado = mysqli_query($conn, $busquedaProducto);
                   

                //Si encuentro el producto, extraigo la informacion necesaria
                if ($resultado != NULL) 
                {
                    while ($row = $resultado->fetch_assoc()) {
                        $nombreP   = $row["nombreProducto"];
                        $IMG_URL_P = $row["URL_imagenProducto"];
                        $precioP   = $row["valorProducto"]; 
                    }
                
                //Muestro el prododucto utilizando HTML y las variables PHP
                echo ('
                <div class="producto">
                <a href="producto.php?id='.$i.'" target="_blank">
                    <img src="'.$IMG_URL_P.'" alt="9 de oro">
                </a>     
                <div class="nomProd">
                    <h3>'.$nombreP.'</h3>
                </div> 
                <div class="precProd">
                    <p>Precio: $'.$precioP.'</p>

                </div>
                </div>
                ');
                } 
                }

            //Cierro la base de datos
            mysqli_close($conn);
        

            ?>

        </div>

    </article> 


    <aside class="conteiner2">


        <div class="publicidad"> 
            <a href="#" target="_blank">
                <img src="img/Publicidades/leon.jpg" alt="logo IFEE">
            </a>                 
        </div>

        <div class="publicidad"> 
            <a href="#" target="_blank">
                <img src="img/Publicidades/leon.jpg" alt="logo IFEE">
            </a>                 
        </div>

        <div class="publicidad"> 
            <a href="#" target="_blank">
                <img src="img/Publicidades/leon.jpg" alt="logo IFEE">
            </a>                 
        </div>

        <div class="publicidad"> 
            <a href="#" target="_blank">
                <img src="img/Publicidades/leon.jpg" alt="logo IFEE">
            </a>                 
        </div>

        <div class="publicidad"> 
            <a href="#" target="_blank">
                <img src="img/Publicidades/leon.jpg" alt="logo IFEE">
            </a>                 
        </div>

        <div class="publicidad"> 
            <a href="#" target="_blank">
                <img src="img/Publicidades/leon.jpg" alt="logo IFEE">
            </a>                 
        </div>

        <div class="publicidad"> 
            <a href="#" target="_blank">
                <img src="img/Publicidades/leon.jpg" alt="logo IFEE">
            </a>                 
        </div>

        <div class="publicidad"> 
            <a href="#" target="_blank">
                <img src="img/Publicidades/leon.jpg" alt="logo IFEE">
            </a>                 
        </div>

        <div class="publicidad"> 
            <a href="#" target="_blank">
                <img src="img/Publicidades/leon.jpg" alt="logo IFEE">
            </a>                 
        </div>

        <div class="publicidad"> 
            <a href="#" target="_blank">
                <img src="img/Publicidades/leon.jpg" alt="logo IFEE">
            </a>                 
        </div>


    <aside>

    </div> 

    <div class="publicidadesHorizontales">

        <div class="publicidadH"> 
            <a href="#" target="_blank">
                <img src="img/Publicidades/IFEE.jpg" alt="logo IFEE">
            </a>                 
        </div>

        <div class="publicidadH"> 
            <a href="#" target="_blank">
                <img src="img/Publicidades/IFEE.jpg" alt="logo IFEE">
            </a>                 
        </div>

        <div class="publicidadH" > 
            <a href="#" target="_blank">
                <img src="img/Publicidades/IFEE.jpg" alt="logo IFEE">
            </a>                 
        </div>

        <div class="publicidadH" > 
            <a href="#" target="_blank">
                <img src="img/Publicidades/IFEE.jpg" alt="logo IFEE">
            </a>                 
        </div>

        <div class="publicidadH" > 
            <a href="#" target="_blank">
                <img src="img/Publicidades/IFEE.jpg" alt="logo IFEE">
            </a>                 
        </div>

        <div class="publicidadH"> 
            <a href="#" target="_blank">
                <img src="img/Publicidades/IFEE.jpg" alt="logo IFEE">
            </a>                 
        </div>
        
    </div>

    <br>

    <footer id="contacto" class="footerConteiner">
        <?php
            include 'footer.php';
        ?>
    </footer>
</body>
</html>