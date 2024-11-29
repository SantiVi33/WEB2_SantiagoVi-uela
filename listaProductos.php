<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Productos</title>
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


            </ul> 

        
    </nav>

    <div class="menuCompra">

            <div class="subMenu">
              <button>Comestibles</button>
                <div class="subMenuCont">
                    <a href="#">Panaderia</a>
                    <a href="#">Fiambreria</a>
                    <a href="#">Rotiseria</a>
                </div>
            </div> 

            <div class="subMenu">
              <button>Bebidas</button>
                <div class="subMenuCont">
                  <a href="#">Gaseosas</a>
                  <a href="#">Aguas Saborizadas</a>
                  <a href="#">Cervezas</a>
                  <a href="#">Vinos</a>
                </div>
            </div> 

            <div class="subMenu">
                <button> Libreria </button>
            </div>

            <div class="subMenu">
                <button>Farmacia</button>
            </div>
                       
            <div class="subMenu">
                <button>Limpieza</button>
            </div>

    </div>

    <div class="conteinerListaProductos">

        <div class="ordenLista">

            <div class="ordenPrecio">
                <p>Ordenar lista</p>
                <div class="orden">

                    <button>Precio Ascendente </button>
                    <button>Precio Descendente </button>
                    <button>Nombre Ascendente  </button>
                    <button>Nombre Descendente </button>
                </div>
            </div>

            <div class="visualizacionProductos">
                <p>Visualizar lista de a</p>
                <button>6</button>
                <button>12</button>
                <button>18</button>
            </div>

        </div>

        <div class="listaProductos">

        
        <?php
            //Include al PHP que mostrara la informacion de todos los prodictos
            include 'listaProductosBD.php';
        ?>

        </div>

        <div class="pagination">
            <p>Encuentra mas productos</p>
            <a href="#">&laquo;</a>
            <a href="#">1</a>
            <a class="active" href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">&raquo;</a>
        </div>
            
    </div>
        
    <footer id="contacto" class="footerConteiner">
        <?php
            include 'footer.php';
        ?>
    </footer>
    </body>
    </html>