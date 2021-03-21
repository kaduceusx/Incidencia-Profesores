



/* -------------------------------------------------------------------------- */
/*                        EDITAR PARTE                                      */
/* -------------------------------------------------------------------------- */

$(document).on("click" , ".btn_editarParte", function (){

    var idParte = $(this).attr("idParte");

    var datos = new FormData();

    datos.append("idParte", idParte);

    $.ajax({

        url : "ajax/partes.ajax.php",
        method : "POST",
        data : datos,
        cache : false,
        contentType : false,
        processData : false,
        dataType : "json",
        success: function (respuesta){

            console.log("respuesta" , respuesta);
            var soloFecha = respuesta["fecha"]; 

            var extracion_ano =soloFecha.substring(0,4); 

            var extracion_mes =soloFecha.substring(4,8); 
            
            var extracion_dia =soloFecha.substring(8,10); 

            soloFecha = extracion_ano + extracion_mes + extracion_dia;



            var soloHora = respuesta["fecha"];

            var extracion_hora = soloHora.substring(11);

            soloHora = extracion_hora;

            

            
            $("#editarId").val(respuesta["id"]);
            $("#editarFecha").val(soloFecha);
            $("#editarHora").val(soloHora);
            $("#editarClase").html(respuesta["id_clase"]);
            $("#editarClase").val(respuesta["id_clase"]);
            $("#editarProfesor").html(respuesta["id_profesor"]);
            $("#editarProfesor").val(respuesta["id_profesor"]);
            $("#editarIncidencia").html(respuesta["id_incidencia"]);
            $("#editarIncidencia").val(respuesta["id_incidencia"]);
            $("#editarObservacion").val(respuesta["partes"]);
           
            
        
           

        }

    });

})



/* -------------------------------------------------------------------------- */
/*                               ACTIVAR PARTE                              */
/* -------------------------------------------------------------------------- */
//$(".btnActivar").click(function (){ si se deja la parte asi, se dibuja antes del dom por eso hay que hacerlo al cargar el documento. 
$(document).on("click" , ".btnActivar", function (){


    var idParte = $(this).attr("idParte");
    var estadoParte = $(this).attr("estadoParte");

    var datos = new FormData();

    datos.append("activarId", idParte);
    datos.append("activarParte", estadoParte);

    $.ajax({

        url : "ajax/partes.ajax.php",
        method : "POST",
        data : datos,
        cache : false,
        contentType : false,
        processData : false,
        success: function(respuesta){

            if(
            window.matchMedia("(max-width:1165px)").matches)  {

                swal({

                    title: "El parte ha sido actualizado",
                    type: "success",
                    confirmButtonText: "Cerrar"

                }).then(function (result){

                    if(result.value){

                        window.location = "partes";
                    }
                });

            }else{

                window.location = "partes";

            }
            

        }

    })

    if(estadoParte ==0){

        $(this).removeClass("btn-success");
        $(this).addClass("btn-danger ");
        $(this).html("Cerrada");
        $(this).attr("estadoParte", 1);

    }else{

        $(this).addClass("btn-success");
        $(this).removeClass("btn-danger ");
        $(this).html("Abierta");
        $(this).attr("estadoParte", 0);

    }

})



/* -------------------------------------------------------------------------- */
/*                  REVISAR SI EL PARTE YA ESTA REGISTRADO                  */
/* -------------------------------------------------------------------------- */
$("#nuevoParte").change(function (){

    $(".alert").remove();

    var parte = $(this).val();

    var datos = new FormData();

    datos.append("validarParte", parte);

    $.ajax({

        url : "ajax/partes.ajax.php",
        method : "POST",
        data : datos,
        cache : false,
        contentType : false,
        processData : false,
        dataType : "json",
        success: function (respuesta){

            if(respuesta){

                $("#nuevoParte").parent().after('<div class="alert alert-warning">Este parte ya existe en la base de datos.</div>');

                $("#nuevoParte").val("");

            }

        }
    })



});





/* -------------------------------------------------------------------------- */
/*                              ELIMINAR PARTE                              */
/* -------------------------------------------------------------------------- */

$(document).on("click" , ".btn_eliminarParte", function (){

    var idParte = $(this).attr("idParte");

    var nombreParte = $(this).attr("nombreParte");


    swal({
                                
        type: "warning",
        title: "Estas seguro de borrar el parte?",
        text: "Si no lo estas puedes cancelar la opción.",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, borrar parte."

    }).then ((result)=>{

        if(result.value){

            window.location = "index.php?ruta=partes&idParte="+idParte+"&nombreParte="+nombreParte;

        }

    })

});
