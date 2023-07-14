

/* Carga inicial*/

$(document).ready(function () {
    objTbDatos = document.getElementById("tbDatos");
    objCodArtAlta = document.getElementById("formArticulosEntCodArtAlta");
    objFamiliaAlta = document.getElementById("formArticulosEntFamiliaAlta");
    objDescripcionAlta = document.getElementById("formArticulosEntDescripcionAlta");
    objCodArtModi = document.getElementById("formArticulosEntCodArtModi");
    objFamiliaModi = document.getElementById("formArticulosEntFamiliaModi");
    objDescripcionModi = document.getElementById("formArticulosEntDescripcionModi");
    $("#orden").val("codArt"); //Orden inicial
    $("#contenedorTablaArticulos").attr("className", "contenedorActivo");
    $("#ventanaModalFormularioAlta").css("visibility", "hidden");
    $("#ventanaModalFormularioModi").css("visibility", "hidden");
    $("#ventanaModalRespuesta").css("visibility", "hidden");
    $("#btEnvioFormModi").attr("disabled", true);
    $("#btEnvioFormAlta").attr("disabled", true);
    llenaFamilias();
});


/*Eventos de ventanas modales*/

$(document).ready(function () {
    $("#btCruzFormularioAlta").click(function () {

        $("#contenedorTablaArticulos").attr("className", "contenedorTabla");
        $("#contenedorTablaArticulos").attr("className", "contenedorActivo");
        $("#ventanaModalFormularioAlta").css("visibility", "hidden");
    });
});


$(document).ready(function () {
    $("#btCruzFormularioModi").click(function () {

        $("#contenedorTablaArticulos").attr("class", "contenedorTabla");
        $("#contenedorTablaArticulos").attr("className", "contenedorActivo");
        $("#ventanaModalFormularioModi").css("visibility", "hidden");

    });
});



$(document).ready(function () {
    $("#btCruzRespuesta").click(function () {

        $("#contenedorTablaArticulos").attr("class", "contenedorTabla");
        $("#contenedorTablaArticulos").attr("className", "contenedorActivo");
        $("#ventanaModalRespuesta").css("visibility", "hidden");
        $("#contenidoModalRespuesta").empty();
        $("#ventanaModalFormularioModi").css("visibility", "hidden");
        $("#ventanaModalFormularioAlta").css("visibility", "hidden");

    });
});





/*Tablas*/


$(document).ready(function () {
    $("#btAccionCarga").click(function () {
        cargaTabla();
    });
});



$(document).ready(function () {
    $("#btAccionVacia").click(function () {
        $("#tbDatos").empty();
    });
});

$(document).ready(function () {
    $("#btLimpiaFiltros").click(function () {
        limpiaFiltros();
    });
});




$(document).ready(function () {
    $("#btAlta").click(function () {
        $("#contenedorTablaArticulos").attr("className", "contenedorPasivo");
        $("#ventanaModalFormularioAlta").css("visibility", "visible");
        vaciaFormulario(); 
        llenaFamiliasAlta(); 
    });
});


$(document).ready(function () {
    $("#th_articulos_codArt").click(function () {
        $("#orden").val("codArt"); //Por defecto se ordenara por codArd
        cargaTabla();
    });	
}); 


$(document).ready(function () {
    $("#th_articulos_familia").click(function () {
        $("#orden").val("familia"); 
        cargaTabla();
    });	
}); 


$(document).ready(function () {
    $("#th_articulos_descripcion").click(function () {
        $("#orden").val("descripcion");
        cargaTabla();
    });
}); 

$(document).ready(function () {
    $("#th_articulos_um").click(function () {
        $("#orden").val("um");
        cargaTabla();
    });
}); 

$(document).ready(function () {
    $("#th_articulos_fechaAlta").click(function () {
        $("#orden").val("fechaAlta");
        cargaTabla();
    });
}); 

$(document).ready(function () {
    $("#th_articulos_saldoStock").click(function () {
        $("#orden").val("saldoStock");
        cargaTabla();
    });
}); 


/* Formularios */

$(document).ready(function () {
    $("#btEnvioFormModi").click(function () {
        modi();
    });
});

$(document).ready(function () {
    $("#btEnvioFormAlta").click(function () {
        alta();
    });
});






/*Valida formulario de alta*/

$(document).ready(function () {
    $("#formArticulosEntCodArtAlta").keyup(function () {
        todoListoParaAlta();
    });
}); 

$(document).ready(function () {
    $("#formArticulosEntDescripcionAlta").keyup(function () {
        todoListoParaAlta();
    });
}); 

$(document).ready(function () {
    $("#formArticulosEntUmAlta").keyup(function () {
        todoListoParaAlta();
    });
}); 


$(document).ready(function () {
    $("#formArticulosEntSaldoStockAlta").keyup(function () {
        todoListoParaAlta();
    });
}); 

// $("#formArticulosEntFechaAltaAlta").change
$(document).ready(function () {
    $("#formArticulosEntFechaAltaAlta").change(function () {
        todoListoParaAlta();
    });
}); 


/*Valida formulario de modificacion*/

$(document).ready(function () {
    $("#formArticulosEntCodArtModi").keyup(function () {
        todoListoParaModi();
    });
}); 



$(document).ready(function () {
    $("#formArticulosEntDescripcionModi").keyup(function () {
        todoListoParaModi();
    });
}); 

$(document).ready(function () {
    $("#formArticulosEntFamiliaModi").change(function () {
        todoListoParaModi();
    });
}); 

$(document).ready(function () {
    $("#formArticulosEntDescricionModi").change(function () {
        todoListoParaModi();
    });
}); 

$(document).ready(function () {
    $("#formArticulosEntUmModi").change(function () {
        todoListoParaModi();
    });
}); 

$(document).ready(function () {
    $("#formArticulosEntFechaAltaModi").change(function () {
        todoListoParaModi();
    });
}); 

$(document).ready(function () {
    $("#formArticulosEntSaldoStockModi").keyup(function () {
        todoListoParaModi();
    });
}); 


$(document).ready(function () {
    $("#btCierraSesion").click(function () {
        location.href = "../destruirsesion.php";
    });
});




/*Funciones*/

function todoListoParaAlta() { // boton de alta Habilita o deshabilita
    if (document.getElementById("formArticulosAlta").checkValidity()) {
        $("#btEnvioFormAlta").attr("disabled", false);
    }
    else {
        $("#btEnvioFormAlta").attr("disabled", true);
    }
}

function todoListoParaModi() { // boton de modificar Habilita o deshabilita
    if (document.getElementById("formArticulosModi").checkValidity()) {
        $("#btEnvioFormModi").attr("disabled", false);
    }
    else {
        $("#btEnvioFormModi").attr("disabled", true);
    }
}




function cargaTabla() {

    $("#tbDatos").empty();
    $("#tbDatos").html("<p>Eserando respuesta ..</p>");
    var objAjax = $.ajax({
        type: "get",
        url: "salidaJsonArticulosConPrepare.php",
        timeout: 8000,
        data: {
            orden: $("#orden").val(),
            f_articulos_codArt: $("#f_articulos_codArt").val(),
            f_articulos_familia: $("#f_articulos_familia").val(),
            f_articulos_descripcion: $("#f_articulos_descripcion").val(),
            f_articulos_um: $("#f_articulos_um").val(),
            f_articulos_fechaAlta: $("#f_articulos_fechaAlta").val()
        },
        success: function (respuestaDelServer, estado) { 
            $("#tbDatos").empty();
            //alert(respuestaDelServer); // esto despues tengo que descomentarlo

            objJson = JSON.parse(respuestaDelServer);
            objJson.articulos.forEach(function (argValor, argIndice) {
                var objTr = document.createElement("tr");
                var objTd = document.createElement("td");
                //objTd.setAttribute("classname","")
                objTd.setAttribute("campo-dato", "articulos_codArt");
                objTd.innerHTML = argValor.codArt;
                objTr.appendChild(objTd);

                var objTd = document.createElement("td");
                objTd.setAttribute("campo-dato", "articulos_familia");
                objTd.innerHTML = argValor.familia;
                objTr.appendChild(objTd);

                var objTd = document.createElement("td");
                objTd.setAttribute("campo-dato", "articulos_um");
                objTd.innerHTML = argValor.um;
                objTr.appendChild(objTd);

                /*
                var objTd=document.createElement("td");
                objTd.setAttribute("campo-dato","articulos_descripcion");
                objTd.innerHTML=argValor.descripcion;
                objTr.appendChild(objTd);
                */

                var objTd = document.createElement("td");
                objTd.setAttribute("campo-dato", "articulos_fechaAlta");
                objTd.innerHTML = argValor.fechaAlta;
                objTr.appendChild(objTd);

                /*			
                var objTd=document.createElement("td");
                objTd.setAttribute("campo-dato","articulos_saldoStock");
                objTd.innerHTML=argValor.saldoStock;
                objTr.appendChild(objTd);
                */

                // PDF
                var objTd = document.createElement("td");
                objTd.setAttribute("campo-dato", "articulos_pdf");
                objTd.innerHTML = "<button class='btCelda'>PDF</button>";

                objTd.onclick = function () {
                    $("#contenedorTablaArticulos").attr("className", "contenedorPasivo");
                    $("#ventanaModalRespuesta").css("visibility", "visible");
                    traeDoc(argValor.codArt);
                }
                objTr.appendChild(objTd);

                


                var objTd = document.createElement("td");
                objTd.setAttribute("campo-dato", "articulos_btModi");
                objTd.innerHTML = "<button class='btCelda'>Modii</button>";

                objTd.onclick = function () {
                    $("#contenedorTablaArticulos").attr("className", "contenedorPasivo");
                    $("#ventanaModalFormularioModi").css("visibility", "visible");
                    llenaFamiliasModi();
                    CompletaFichaArticulo(argValor.codArt);
                };

                objTr.appendChild(objTd);


                var objTd = document.createElement("td");
                objTd.setAttribute("campo-dato", "articulos_btBaja");
                objTd.innerHTML = "<button class='btCelda'>Borrar</button>";

                objTd.onclick = function () {
                    baja(argValor.codArt);
                }

                objTr.appendChild(objTd);

                objTbDatos.appendChild(objTr);

            });
            $("#totalRegistros").html("Nro de registros: " + objJson.articulos.length);

        }
    }); 

}



function CompletaFichaArticulo(argArticulo) {
    $("#formArticulosEntCodArtModi").val(argArticulo);
    var objAjax = $.ajax({
        type: "get",
        url: "./salidaJsonArticulo.php",
        data: { codArt: argArticulo },
        success: function (respuestaDelServer, estado) {  //La funcion de callback que se ejecutara cuando el req. sea completado.

            objetoDato = JSON.parse(respuestaDelServer);
            console.log(objetoDato.codArt);
            $("#formArticulosEntCodArtModi").val(objetoDato.codArt);
            $("#formArticulosEntFamiliaModi").val(objetoDato.familia);
            //$("#formArticulosEntDescripcionModi").val(objetoDato.descripcion);

            $("#formArticulosEntUmModi").val(objetoDato.um);
            $("#formArticulosEntfechaAltaModi").val(objetoDato.fechaAlta);
            //$("#formArticulosEntSaldoStockModi").val(objetoDato.saldoStock);
            todoListoParaModi(); //habilita el boton de enviar 
        } 
    });
}



function vaciaFormulario() {
    $("#formArticulosEntCodArtAlta").val("");
    $("#formArticulosEntFamiliaAlta").val("");
    $("#formArticulosEntDescripcionAlta").val("");
    $("#formArticulosEntUmAlta").val("");
    $("#formArticulosEntfechaAltaAlta").val("");
    $("#formArticulosEntSaldoStockAlta").val("");
}




function llenaFamilias() { 
    $("#f_articulos_familia").empty();
    var objAjax = $.ajax({
        type: "get",
        url: "./salidaJsonFamilias.php",

        success: function (respuestaDelServer, estado) {
            //alert(respuestaDelServer); //esto despues tengo que descomentarlo
            listaDeObjetos = JSON.parse(respuestaDelServer);
            var objOption = document.createElement("option");
            objOption.setAttribute("value", "");
            objOption.innerHTML = "";
            document.getElementById("f_articulos_familia").appendChild(objOption);

            listaDeObjetos.familias.forEach(function (argValor, argIndice) {
                var objOption = document.createElement("option");
                objOption.setAttribute("value", argValor.codFamilia);
                objOption.innerHTML = argValor.descripcionFamilia;
                document.getElementById("f_articulos_familia").appendChild(objOption);
            });
            return true;
        }
    });
}





function llenaFamiliasAlta() { 
    $("#formArticulosEntFamiliaAlta").empty();
    var objAjax = $.ajax({
        type: "get",
        url: "./salidaJsonFamilias.php",

        success: function (respuestaDelServer, estado) {
            //alert(respuestaDelServer);
            listaDeObjetos = JSON.parse(respuestaDelServer);
            listaDeObjetos.familias.forEach(function (argValor, argIndice) {

                var objOption = document.createElement("option");
                objOption.setAttribute("class", "elementoOptionSelect");
                objOption.setAttribute("value", argValor.codFamilia);

                objOption.innerHTML = argValor.codFamilia + argValor.descripcionFamilia;

                document.getElementById("formArticulosEntFamiliaAlta").appendChild(objOption);

            });
            return true;
        } 
    }); 
}



function llenaFamiliasModi() {
    //alert($("#formArticulosEntFamiliaModi").val());
    $("#formArticulosEntFamiliaModi").empty(); // para no duplicar elementos
    //alert($("#formArticulosEntFamiliaModi").val());		

    var objAjax = $.ajax({
        type: "get",
        url: "./salidaJsonFamilias.php",

        success: function (respuestaDelServer, estado) {

            listaDeObjetos = JSON.parse(respuestaDelServer);
            listaDeObjetos.familias.forEach(function (argValor, argIndice) {


                var objOption = document.createElement("option");
                objOption.setAttribute("class", "elementoOptionSelect");
                objOption.setAttribute("value", argValor.codFamilia);

                objOption.innerHTML = argValor.codFamilia + argValor.descripcionFamilia;
                if (objOption.value == $("#formArticulosEntFamiliaModi").val()) {
                    objOption.setAttribute("selected", "selected");
                }

                document.getElementById("formArticulosEntFamiliaModi").appendChild(objOption);

            });
            return true;
        } 
    }); 
}


function limpiaFiltros() {
    $("#f_articulos_codArt").val("");
    $("#f_articulos_familia").val("");
    $("#f_articulos_um").val("");
    $("#f_articulos_descripcion").val("");
    $("#f_articulos_fechaAlta").val("");
}

function consultaDatos(codArt) {
    //primera 
    var promesaIsBloqueado = $.ajax({
        dataType: "text",
        type: "get",
        url: "./isBloqueado.php",
        data: { codArt: codArt }
    }); 

    // segunda 
    var promesaPrecio = $.ajax({
        dataType: "text",
        type: "get",
        url: "./precio.php",
        data: { codArt: codArt }
    }); 


    $.when(promesaIsBloqueado, promesaPrecio).done(function (respuestaDelServerIsBloqueado, respuestaDelServerPrecio) {
        $("#ventanaModalRespuesta").css("visibility", "visible");
        $("#encabezadoModalRespuesta").append("Respuestas del server");
        $("#contenidoModalRespuesta").empty();
        $("#contenidoModalRespuesta").append("<h2>Está bloqueado? " + respuestaDelServerIsBloqueado[0] + "<h2>");

        $("#contenidoModalRespuesta").append("<h2>Precio unitario: " + respuestaDelServerPrecio[0] + "</h2>");


    });


}




function modi() {
    if (confirm("¿Está seguro de modificar registro? " + $("#formArticulosEntCodArtModi").val())) {

        var data = new FormData($("#formArticulosModi")[0]);
        var objAjax = $.ajax({
            type: 'post',
            method: 'post',
            enctype: 'multipart/form-data',
            url: "./modi.php",
            processData: false,  // IMP
            contentType: false,
            cache: false,
            data: data,

            success: function (respuestaDelServer) {
                $("#ventanaModalRespuesta").css("visibility", "visible");
                $("#contenidoModalRespuesta").empty();
                $("#encabezadoModalRespuesta").append("Respuesta del server: ");
                $("#contenidoModalRespuesta").append(respuestaDelServer);

                $("#ventanaModalFormulario").css("visibility", "hidden");

            } 

        }); 
       
    } 
    
}




function alta() {
    if (confirm("¿Está seguro de insertar registro? ")) {

        var data = new FormData($("#formArticulosAlta")[0]);// objeto data que es el form completo
        var objAjax = $.ajax({
            type: 'post',
            method: 'post',
            enctype: 'multipart/form-data',
            url: "./alta.php",
            processData: false,  // IMP
            contentType: false,
            cache: false,
            data: data,

            success: function (respuestaDelServer) {
                $("#ventanaModalRespuesta").css("visibility", "visible");
                $("#contenidoModalRespuesta").empty();
                $("#encabezadoModalRespuesta").append("Respuesta del server: ");
                $("#contenidoModalRespuesta").append(respuestaDelServer);

                $("#ventanaModalFormulario").css("visibility", "hidden");

            } 

        }); 
       
    } 
   

}



function baja(argArticulo) {
    if (confirm("¿Está seguro de borrar este registro? ")) {

        var objAjax = $.ajax({
            type: "post",
            url: "./baja.php",
            data: {
                codArt: argArticulo
            },
            success: function (respuestaDelServer) { //datA es lo que catura ajax
                $("#ventanaModalRespuesta").css("visibility", "visible");
                $("#contenidoModalRespuesta").empty();
                $("#contenidoModalRespuesta").append(respuestaDelServer);
                $("#ventanaModalFormulario").css("visibility", "hidden");

            } 
        }); 
    } 
}


function traeDoc(argArticulo) {
    if (confirm("¿Está seguro de traer este dato? ")) {

        var objAjax = $.ajax({
            type: "get",
            url: "./traeDoc.php",
            data: {
                codArt: argArticulo
            },
            success: function (respuestaDelServer) { 
                //alert("Respuesta del SERVER desde adentro del success:"+ respuestaDelServer);
                objetoDato = JSON.parse(respuestaDelServer);
                $("#ventanaModalRespuesta").css("visibility", "visible");
                $("#contenidoModalRespuesta").empty();
                $("#contenidoModalRespuesta").html("<iframe width='100%' height='600px' src='data:application/pdf;base64," + objetoDato.documentoPdf + "'></iframe>");

            } 
        }); 
    } 

    cargaTabla();

} 
