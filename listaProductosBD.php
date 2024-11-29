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

            $busquedaProducto  = 'SELECT * FROM producto'; //Busco todos los productos
            $resultado = mysqli_query($conn, $busquedaProducto); //Realizo el query
            $i = 1; //Declaro una variable incremental para el WHILE


            //Si se encontraron todos los productos
            if ($resultado != NULL) 
            {
                //Mientras se lea cada producto
                while ($row = $resultado->fetch_assoc()) 
                {
                    //Busco el producto segun so código
                    $busquedaProducto2  = 'SELECT * FROM producto WHERE codProducto = '.$i.' ';
                    $resultado2 = mysqli_query($conn, $busquedaProducto2); //Realizo el query

                    //Extraigo la informacion necesitada
                    $nombreP   = $row["nombreProducto"];
                    $IMG_URL_P = $row["URL_imagenProducto"];
                    $precioP   = $row["valorProducto"]; 
                    $codigoP   = $row["codProducto"]; 

                    //Muestro los productos con HTML y variables PHP
                    // Al seleccionar un producto, se abrirar con su ID
                    echo ('
                    <div class="producto">
                    <a href="producto.php?id='.$codigoP.'" target="_blank"> 

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

                    $i = $i + 1; //Incremento la variable 

                 
                }
            
            } 
        
            
            //Cierro la base de datos
            mysqli_close($conn);

        ?>