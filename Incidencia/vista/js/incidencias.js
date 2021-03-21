



/* -------------------------------------------------------------------------- */
/*                        EDITAR INCIDENCIA                                      */
/* -------------------------------------------------------------------------- */

$(document).on("click" , ".btn_editarIncidencia", function (){

    var idIncidencia = $(this).attr("idIncidencia");

    var datos = new FormData();

    datos.append("idIncidencia", idIncidencia);

    $.ajax({

        url : "ajax/incidencias.ajax.php",
        method : "POST",
        data : datos,
        cache : false,
        contentType : false,
        processData : false,
        dataType : "json",
        success: function (respuesta){

            console.log("respuesta" , respuesta);

            $("#editarId").val(respuesta["id_incidencia"]);
           
            $("#editarIncidencia").val(respuesta["incidencia"]);
           

        }

    });

})



/* -------------------------------------------------------------------------- */
/*                               ACTIVAR INCIDENCIA                              */
/* -------------------------------------------------------------------------- */
//$(".btnActivar").click(function (){ si se deja la incidencia asi, se dibuja antes del dom por eso hay que hacerlo al cargar el documento. 
$(document).on("click" , ".btnActivarIncidencia", function (){


    var idIncidencia = $(this).attr("idIncidencia");
    var estadoIncidencia = $(this).attr("estadoIncidencia");

    var datos = new FormData();

    datos.append("activarIdIncidencia", idIncidencia);
    datos.append("activarIncidencia", estadoIncidencia);

    $.ajax({

        url : "ajax/incidencias.ajax.php",
        method : "POST",
        data : datos,
        cache : false,
        contentType : false,
        processData : false,
        success: function(respuesta_incidencias){

            if(window.matchMedia("(max-width:1165px)").matches)  {

                swal({

                    title: "El incidencia ha sido actualizado",
                    type: "success",
                    confirmButtonText: "Cerrar"

                }).then(function (result){

                    if(result.value){

                        window.location = "incidencias";
                    }
                });

            }else{

                window.location = "incidencias";
                
            }

            

            

            
            

        }

    })

    if(estadoIncidencia ==0){

        $(this).removeClass("btn-success");
        $(this).addClass("btn-danger ");
        $(this).html("Cerrada");
        $(this).attr("estadoIncidencia", 1);

    }else{

        $(this).addClass("btn-success");
        $(this).removeClass("btn-danger ");
        $(this).html("Abierta");
        $(this).attr("estadoIncidencia", 0);

    }

})



/* -------------------------------------------------------------------------- */
/*                  REVISAR SI EL INCIDENCIA YA ESTA REGISTRADO                  */
/* -------------------------------------------------------------------------- */
$("#nuevoIncidencia").change(function (){

    $(".alert").remove();

    var incidencia = $(this).val();

    var datos = new FormData();

    datos.append("validarIncidencia", incidencia);

    $.ajax({

        url : "ajax/incidencias.ajax.php",
        method : "POST",
        data : datos,
        cache : false,
        contentType : false,
        processData : false,
        dataType : "json",
        success: function (respuesta){

            if(respuesta){

                $("#nuevoIncidencia").parent().after('<div class="alert alert-warning">Este incidencia ya existe en la base de datos.</div>');

                $("#nuevoIncidencia").val("");

            }

        }
    })



});





/* -------------------------------------------------------------------------- */
/*                              ELIMINAR INCIDENCIA                              */
/* -------------------------------------------------------------------------- */

$(document).on("click" , ".btn_eliminarIncidencia", function (){

    var idIncidencia = $(this).attr("idIncidencia");

    var nombreIncidencia = $(this).attr("nombreIncidencia");


    swal({
                                
        type: "warning",
        title: "Estas seguro de borrar el incidencia?",
        text: "Si no lo estas puedes cancelar la opción.",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, borrar incidencia."

    }).then ((result)=>{

        if(result.value){

            window.location = "index.php?ruta=incidencias&idIncidencia="+idIncidencia+"&nombreIncidencia="+nombreIncidencia;

        }

    })

});
