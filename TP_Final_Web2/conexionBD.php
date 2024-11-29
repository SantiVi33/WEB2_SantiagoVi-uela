<?

function conectarBS() {
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

return $conn;
}

function cerrarDB($conn) {
    mysqli_close($conn);
}

?>

