//Funcion para mostrar la informacion segun si el usuario seleccina si tiene comercio o no (registro.PHP)
$(document).ready(function(){
    $(".comerciante").click(function(evento){
      
        var valor = $(this).val();
      
        if(valor == 'no'){
            $("#div1").css("display", "block");
            $("#div2").css("display", "none");
        }else{
            $("#div1").css("display", "none");
            $("#div2").css("display", "block");
        }
});
});

//Funcion para mostrar la cantidad del stock (listaProductosBD.PHP)
function mostrar() {
    //document.getElementById("resultado").innerHTML=valor;
    let n = parseInt(document.getElementById(".cantPedida").value, 100);
    return n;
}


