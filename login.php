<?php

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
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    
    //Obtener los valores del formulario
    extract($_POST);


    //Encuentro si el usuario ya existe
    $sql1 = "SELECT * FROM usuario WHERE usuarioCliente = '$usuarioCliente'";
    $resultado2 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($resultado2) == 0) {
        die('El usuario no existe <a href="index.php"><button>VOLVER</button></a>');
    }

    //Si el usuario existe, obtengo su clave (hash) de la base de datos
    $row = $resultado2->fetch_assoc();
    $pass= $row["passwordCliente"];
    $userID = $row["ID_persona"];
    // $activo = $row["sesionActiva"];


    //Verifico que la clave hash de la base de datos coincida con la ingresada
    if (password_verify($passwordCliente,$pass)) {
        echo 'bienvenido '.$usuarioCliente.' <a href="index.php?id='.$userID.'"><button>VOLVER</button></a>';
        //echo 'bienvenido '.$usuarioCliente.' <a href="index.php"><button>VOLVER</button></a>';
        session_start();
        $_SESSION['usuario'] = $_REQUEST['usuarioCliente'];
        $_SESSION['clave'] = $_REQUEST['passwordCliente'];
        $_SESSION['idUsuario'] =  $userID;
        $activo = 1;
        global $activo;
        // $_SESSION['activo'] = TRUE;
        // session_destroy();

    } else {
        echo 'la clave ingresada es incorrecta <a href="index.php"><button>VOLVER</button></a>';
    }

}

//cerrar la conexion
mysqli_close($conn);
?>
