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

//Verificar si se envio el formulario
if ($_SERVER["REQUEST_METHOD"] == "GET") 
{
    
    //Obtener los valores del formulario
    extract($_GET);
    
    //crifro la contraseña del usuario;
    $passwordCliente = password_hash($_GET['passwordCliente'],PASSWORD_DEFAULT);

    //Verifico que el usuario no exista
    $userAux = "SELECT * FROM usuario WHERE usuarioCliente = '$usuarioCliente'";
    $resultado = mysqli_query($conn, $userAux);
    if (mysqli_num_rows($resultado) == 1) {
        die("El usuario ya existe ");
    }

    //Verifico que la persona no este ya registrada por su DNI
    $userAux = "SELECT * FROM usuario WHERE numDocumento = '$numDocumento'";
    $resultado = mysqli_query($conn, $userAux);
    if (mysqli_num_rows($resultado) == 1) {
        die("Ya hay un usuario con este documento");
    }

    $sesionActiva = TRUE; 

    //Evaluo si es comerciante o no para ingresar la informacion correcta.
    if($textoComerciante == 'si') 
    {
        $esComerciante = TRUE;
        //Insertar los datos del usuario en la base de datos
        $sql = "INSERT INTO usuario
        (nombreCliente,apellidoCliente,sexoPersona,tipoDocumento,numDocumento,telFijo,telCelular,CUIL,
        fechaNacimiento,frenteDocumento,inversoDocumento,provinciaCliente,ciudadCliente,calleCliente,
        numeroDireccionCliente,esComerciante,tipoFacturacion,CUIT,correoCliente,usuarioCliente,passwordCliente,
        sesionActiva,FechaAltaUsuario,FechaUltimaModifiacionUsuario,FechaBajaUsuario) 
        VALUES ('$nombreCliente','$apellidoCliente','$sexoPersona','$tipoDocumento','$numDocumento',
        '$telFijo','$telCelular','$CUIL','$fechaNacimiento','$frenteDocumento','$inversoDocumento','$provinciaCliente','$ciudadCliente','$calleCliente','$numeroDireccionCliente','$esComerciante','$tipoFacturacion','$CUIT','$correoCliente','$usuarioCliente','$passwordCliente','$sesionActiva',NOW(),NULL,NULL)"; 

    
        //Insertar los datos del comercio en la base de datos
        $sqlC = "INSERT INTO comercio
        (CUIT_Responsable, nombreComercio, tipoComercio, rubloComercio, provinciaComercio, ciudadComercio,
        calleComercio, numeroDireccionComercio, fechaInicioActividades, fechaAltaComercioSistema, FechaUltimaModifiacionComercio, FechaBajaComercio) 
        VALUES ('$CUIT','$nombreComercio','$tipoComercio','$rubloComercio','$provinciaComercio',
        '$ciudadComercio','$calleComercio','$numeroDireccionComercio', '$fechaInicioActividades',NOW(),NULL,NULL)"; 

        //Verifico que los datos furon insertados.
        if (mysqli_query($conn, $sql) AND mysqli_query($conn, $sqlC)) 
        {
            echo 'Los datos se han insertado correctamente en la base de datos <a href="index.php"><button>VOLVER</button></a>';
        } 
        else 
        {
            echo "Error al insertar los datos: " . mysqli_error($conn);
        }
    }
    else 
    {
        $esComerciante = FALSE;
        //Insertar los datos del usuario en la base de datos
        $sql = "INSERT INTO usuario
        (nombreCliente,apellidoCliente,sexoPersona,tipoDocumento,numDocumento,telFijo,telCelular,CUIL,
        fechaNacimiento,frenteDocumento,inversoDocumento,provinciaCliente,ciudadCliente,calleCliente,
        numeroDireccionCliente,esComerciante,tipoFacturacion,CUIT,correoCliente,usuarioCliente,passwordCliente,
        sesionActiva,FechaAltaUsuario,FechaUltimaModifiacionUsuario,FechaBajaUsuario) 
        VALUES ('$nombreCliente','$apellidoCliente','$sexoPersona','$tipoDocumento','$numDocumento',
        '$telFijo','$telCelular','$CUIL','$fechaNacimiento','$frenteDocumento','$inversoDocumento','$provinciaCliente','$ciudadCliente','$calleCliente','$numeroDireccionCliente','$esComerciante','$tipoFacturacion','$CUIT','$correoCliente','$usuarioCliente','$passwordCliente','$sesionActiva',NOW(),NULL,NULL)"; 


        //Verifico que los datos furon insertados.
        if (mysqli_query($conn, $sql)) 
        {
            echo 'Los datos se han insertado correctamente en la base de datos <a href="index.php"><button>VOLVER</button></a>';
        } 
        else 
        {
            echo "Error al insertar los datos: " . mysqli_error($conn);
        }
    }
}

//cerrar la conexion
mysqli_close($conn);
?>


    