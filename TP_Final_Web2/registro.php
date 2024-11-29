<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <title>RegistroNuevoCliente</title>
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
                        <a href="nosotros.html">Quienes Somos</a>
                    </li>

                </div>

                <div class="n1">
                    
                    <li>
                        <a href="#contacto">Contacto</a>
                    </li>

                </div>

                <div class="n1">
                    
                    <li>
                        <a href="listaProductos.html">Productos</a>
                    </li>
                    
                </div>



            </ul> 

        
    </nav>

    <div class="formulario">

        <p>Bienvenido al registro, por favor complete todos los campos para registrarse:</p>
        <!-- Formulario de registro -->
        <form action="registroBD.php" method="GET" autocomplete="off">

            <!-- Parte del registro correspondiente a los datos personales de la persona -->
            <div class="formPersonal">

            <input type="text" name="nombreCliente"   id="nombreCliente"   placeholder="*Nombre/s"   maxlength="50" required>
            <input type="text" name="apellidoCliente" id="apellidoCliente" placeholder="*Apellido/s" maxlength="50" required> <br>
                
            <legend>*Sexo</legend>
                <input type="radio" name="sexoPersona" id="m" value="masculino" required>  Masculino 
                <input type="radio" name="sexoPersona" id="f" value="femenino"  required>  Femenino  
                <input type="radio" name="sexoPersona" id="o" value="otro"      required>  Otro

                
                <legend>*Tipo Documento</legend>
                <input type="radio"   name="tipoDocumento"    id="dni" value="documentoNacionalIdentidad" required> DNI 
                <input type="radio"   name="tipoDocumento"    id="lc"  value="libretaCivida" required>  LIBRETA CÍVICA  
                <input type="radio"   name="tipoDocumento"    id="le"  value="liberaEnrolamiento" required>  LIBRETA DE ENROLAMIENTO 
                <input type="radio"   name="tipoDocumento"    id="ex"  value="docExtranjero" required>  Documento extranjero


                <div class="doc">
                <input type="number"  name="numDocumento"  id="documento" min="0000001" max="99999999"  placeholder="*N° Documento (sin puntos)" required> <br>
                </div>
               
    

                <input type="tel"    name="telFijo" id="telFijo" placeholder="Tel. Fijo"> 
                <input type="number" name="telCelular"  id="telCelular"  placeholder="*Tel. Celular" required> 
                <input type="number" name="CUIL"    id="CUIL"    minlength="0000000010" maxlength="00999999990" placeholder="*CUIL" required> <br>
    
                <label>*Fecha Nacimiento</label>
                <input type="date" name="fechaNacimiento" id="fechaNacimiento" required> <br>

                <label>*Por favor, cargue en formato JPG o PNG, el frente de su documento  </label>
                <input type="file" name="frenteDocumento" id="frenteDocumento"  accept="image/jpg, image/png" required> <br>
                <label>*Por favor, cargue en formato JPG o PNG, el inverso de su documento </label>
                <input type="file" name="inversoDocumento" id="inversoDocumento" accept="image/jpg, image/png" required> <br>


                <label>*Provincia</label>
                <select name="provinciaCliente" id="provinciaCliente">
                    <option value="BA">   Buenos Aires                                          </option>
                    <option value="CABA"> Ciudad Autónoma de Buenos Aires                       </option>
                    <option value="CA">   Catamarca                                             </option>
                    <option value="CHA">  Chaco                                                 </option>
                    <option value="CHU">  Chubut                                                </option>
                    <option value="CORD"> Córdoba                                               </option>
                    <option value="CORR"> Corrientes                                            </option>
                    <option value="ER">   Entre Ríos                                            </option>
                    <option value="FO">   Formosa                                               </option>
                    <option value="JU">   Jujuy                                                 </option>
                    <option value="LP">   La Pampa                                              </option>
                    <option value="LR">   La Rioja                                              </option>
                    <option value="ME">   Mendoza                                               </option>
                    <option value="MI">   Misiones                                              </option>
                    <option value="NE">   Neuquén                                               </option>
                    <option value="RN">   Río Negro                                             </option>
                    <option value="SA">   Salta                                                 </option>
                    <option value="SJ">   San Juan                                              </option>
                    <option value="SL">   San Luis                                              </option>
                    <option value="SC">   Santa Cruz                                            </option>
                    <option value="SF">   Santa Fe                                              </option>
                    <option value="SDE">  Santiago del Estero                                   </option>
                    <option value="TF">   Tierra del Fuego, Antártida e Islas del Atlántico Sur </option>
                    <option value="TUC">  Tucumán                                               </option>
                </select>

                <div class="formCiudad">

                <input type="text"   name="ciudadCliente"       id="ciudadCliente"       placeholder="*Ciudad" required>
                <input type="text"   name="calleCliente"        id="calleCliente"        placeholder="*Calle" required>
                <input type="number" name="numeroDireccionCliente" id="numeroDireccionCliente" placeholder="*Numero Direccion" required> <br>
                </div>


            </div>

            <!-- Parte del registro correspondiente a los datos del comercio -->
            <div class="formDatos">

            <!-- Segun la opcion, mostrara la informacion colocada, mostrara la informacion necesaria -->
            <legend>*Es comerciante?</legend>

            <!-- Script para realizar la tarea, no se puede usar en otro lugar -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

            <input type="radio" name="textoComerciante" class="comerciante" id="si" value="si" required> SI
            <input type="radio" name="textoComerciante" class="comerciante" id="no" value="no" checked="checked" required> NO <br>

            <!-- Solo cuando la opcion anterior sea NO -->
            <div id="div1">
                <label> *Seleccione su tipo de Facturacion</label>
                <select name="tipoFacturacion" id="tipoFacturacion" class="SIcomerciante">
                        <option value="CF"> Consumidor Final </option>
                </select> 
            
            </div>

            <!-- Solo cuando la opcion anterior sea SI -->        
            <div id="div2" style="display:none;">
            <label> *Seleccione su tipo de Facturacion</label>
                <select name="tipoFacturacion" id="TF">
                    <option value="RI">  Responsable inscripto     </option>
                    <option value="MA">  Monotributista A          </option>
                    <option value="MAe"> Monotributista A(excento) </option>
                    <option value="MB">  Monotributista B          </option>
                    <option value="MBe"> Monotributista B(excento) </option>
                    <option value="MC">  Monotributista C          </option>
                    <option value="MD">  Monotributista D          </option>
                    <option value="ME">  Monotributista E          </option>
                    <option value="MF">  Monotributista F          </option>
                    <option value="MG">  Monotributista G          </option>
                    <option value="MH">  Monotributista H          </option>
                    <option value="MI">  Monotributista I          </option>
                    <option value="MJ">  Monotributista J          </option>
                    <option value="MK">  Monotributista K          </option>
                </select> 

                <input type="number" name="CUIT"    id="CUIT"    minlength="0000000010" maxlength="00999999990" placeholder="*CUIT"> <br>

                <p>Datos del comercio: </p>
                
                <input type="text" name="nombreComercio"   id="nombreComercio"   placeholder="*Nombre"   maxlength="50"> <br>

                <label>*Tipo de Comercio</label>
                <select name="tipoComercio" id="tipoComercio">
                    <option value="MA">   Mayorista              </option>
                    <option value="MI">   Minorista              </option>
                    <option value="MM">   Minorista/Mayorista    </option>
                    <option value="SE">   Servicio               </option>
            
                </select>

                <label>*Rubro</label>
                <select name="rubloComercio" id="rubloComercio">
                    <option value="BC">   Bares / Cervecerías artesanales.                           </option>
                    <option value="CRC">  Casas de comidas / Rotiserías  / Casas de comida por peso. </option>
                    <option value="CAF">  Cafeterías                                                 </option>
                    <option value="RE">   Restaurantes                                               </option>
                    <option value="HA">   Hamburgueserías                                            </option>
                    <option value="PZ">   Pizzerías                                                  </option>
                    <option value="CE">   Casas de empanadas.                                        </option>
                    <option value="AF">   Almacenes o Fiambrerías.                                   </option>
                    <option value="DN">   Dietéticas o Tiendas naturistas.                           </option>
                    <option value="VF">   Verdulerías y Fruterías.                                   </option>
                    <option value="CAR">  Carnicerías.                                               </option>
                    <option value="GP">   Granjas o Pollerías.                                       </option>
                    <option value="KK">   Kioskos.                                                   </option>
                </select> <br>
                
                <label>*Provincia</label>
                <select name="provinciaComercio" id="provinciaComercio">
                    <option value="BA">   Buenos Aires                                          </option>
                    <option value="CABA"> Ciudad Autónoma de Buenos Aires                       </option>
                    <option value="CA">   Catamarca                                             </option>
                    <option value="CHA">  Chaco                                                 </option>
                    <option value="CHU">  Chubut                                                </option>
                    <option value="CORD"> Córdoba                                               </option>
                    <option value="CORR"> Corrientes                                            </option>
                    <option value="ER">   Entre Ríos                                            </option>
                    <option value="FO">   Formosa                                               </option>
                    <option value="JU">   Jujuy                                                 </option>
                    <option value="LP">   La Pampa                                              </option>
                    <option value="LR">   La Rioja                                              </option>
                    <option value="ME">   Mendoza                                               </option>
                    <option value="MI">   Misiones                                              </option>
                    <option value="NE">   Neuquén                                               </option>
                    <option value="RN">   Río Negro                                             </option>
                    <option value="SA">   Salta                                                 </option>
                    <option value="SJ">   San Juan                                              </option>
                    <option value="SL">   San Luis                                              </option>
                    <option value="SC">   Santa Cruz                                            </option>
                    <option value="SF">   Santa Fe                                              </option>
                    <option value="SDE">  Santiago del Estero                                   </option>
                    <option value="TF">   Tierra del Fuego, Antártida e Islas del Atlántico Sur </option>
                    <option value="TUC">  Tucumán                                               </option>
                </select>

          
    
                <input type="text"   name="ciudadComercio"       id="ciudadComercio"       placeholder="*Ciudad">
                <input type="text"   name="calleComercio"        id="calleComercio"        placeholder="*Calle">
                <input type="number" name="numeroDireccionComercio" id="numeroDireccionComercio" placeholder="*Numero Direccion" > <br>
                <label>*Fecha inicio de activiades</label>
                <input type="date" name="fechaInicioActividades" id="fechaInicioActividades"> <br>

            </div>

            <br>

            <!-- Parte del registro correspondiente a los datos para el nuevo usuario -->

            <p>Datos del nuevo usuario: </p>

            <div class="formUsuario">

                <input type="email"    name="correoCliente" id="correoCliente" maxlength="30" placeholder="*Correo Electronico" required>
                <input type="text"     name="usuarioCliente" id="usuarioCliente" minlength="6" maxlength="6" placeholder="*Usuario (6 caracteres)" required>  <br>
                <input type="password" name="passwordCliente"   id="passwordCliente"  minlength="4" maxlength="4" placeholder="*Clave (4 caracteres)" required>
                <input type="password" minlength="4" maxlength="6" placeholder="*Repita la clave"required> <br>

                <input type="submit" value="Registrarme" class="registrarBT">
                <input type="reset"  value="Rehacer">
                <a href="index.html" >
                    <input type="button" value="Volver">
                </a> 

            </div>
            

        </form>
    </div>

    <footer id="contacto" class="footerConteiner">
        <?php
            include 'footer.php';
        ?>
    </footer>
    
    <script src="funciones.js"></script>
</body>

</html>