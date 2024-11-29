<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

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

   
    ?>

        <img src="img/logo.png" alt="Logo SanRoMar">


    <div class="logoSanRoMar">
        
        <a href="index.php">
            <h1>San-Ro-Mar</h1>
        </a> 

    </div>



        <?php 

        //Obtengo la ID del usuario que inicio sesion
        if (isset($_GET['id'])) {
            $codPersona = $_GET['id']; //Obtengo el codigo del 
            
            //Busco el usuario
            $busquedaUsuario  = "SELECT * FROM usuario WHERE ID_persona =  '$codPersona' ";

            //Realizo la query
            $resultado = mysqli_query($conn, $busquedaUsuario ); 
               
            //Extraigo la informacion solicitada del usuario que inicio sesion;
            if($row = $resultado->fetch_assoc()) {
                $nombreCliente   = $row["nombreCliente"];
                $apellidoCliente = $row["apellidoCliente"];
                $numDocumento    = $row["numDocumento"];
                $usuarioCliente  = $row["usuarioCliente"];
                $estaActivo      = $row["sesionActiva"];
            }
        }


        //Evito error al abrir la pagina por primera vez
        if (!isset($estaActivo)) {
            $estaActivo = NULL;
        }

        //Evaluo que modal mostrar, dependiendo si hay un usuario que inicio sesion o no
        if($estaActivo == TRUE) { 
            
        ?>
        <!-- Si hay un usuario registrado, muestro el modal con la información del mismo  -->
        <button onclick="document.getElementById('id01').style.display='block' " class="w3-button">Usuario</button>
            <div id="id01" class="w3-modal">
                <div class="w3-modal-content w3-animate-top">
                    <div class="w3-container">
                        <span onclick="document.getElementById('id01').style.display='none' " class="w3-button w3-display-topright">&times;</span>

                        <?php 
                        echo (' 
                                <p>bienvenido '.$usuarioCliente.'</p>
                                <p>Informacion: '.$nombreCliente.' - '.$apellidoCliente.' - Documento n° '.$numDocumento.')</p>
                            ');
                        ?>

                        <!-- Boton de cerrar sesion (solo regresa al idex, la funcion no funciona) -->
                        <a href="index.php">
                        <input type="button" value="Cerrar sesion" onclick="cerrarSesion()">
                        </a>
        
                        <!-- Boton para volver a la pagina actual  -->
                        <input type="button" value="VOLVER" onclick="document.getElementById('id01').style.display='none'">
                    </div>
                </div>
            </div>    
        <?php            
        }

        // Si no hay ningun usuario con sesion iniciada, se activa el modal LOGIN 
        else 
        {
        ?>

            <button onclick="document.getElementById('id01').style.display='block' " class="w3-button">Login</button>
                <div id="id01" class="w3-modal">
                    <div class="w3-modal-content w3-animate-top">
                        <div class="w3-container">
                            <span onclick="document.getElementById('id01').style.display='none' " class="w3-button w3-display-topright">&times;</span>
                            <form action="login.php" method="POST" autocomplete="off" class="formLogin">
                                <input type="text" name="usuarioCliente" id="usuarioCliente" placeholder="Usuario"><br><br>
                                <input type="password" name="passwordCliente" id="passwordCliente" placeholder="Clave"><br><br>
                                <input type="submit" value="INGRESAR">
                                <input type="button" value="VOLVER" onclick="document.getElementById('id01').style.display='none' ">
                            </form>
                            <p>Todavia no eres cliente? <a href="registro.php"> Unete!</a></p>
                        </div>
                    </div>
                </div> 
            <?php
                }
            ?>
            

        <script>
           function cerrarSesion() {
            <?php
                $estaActivo = FALSE;
            ?>
           }
        </script> 

<!-- Cierro la base de datos -->
        <?php
        mysqli_close($conn);
        ?>
</body>

