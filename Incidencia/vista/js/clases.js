



/* -------------------------------------------------------------------------- */
/*                        EDITAR CLASE                                      */
/* -------------------------------------------------------------------------- */

$(document).on("click" , ".btn_editarClase", function (){

    var idClase = $(this).attr("idClase");

    var datos = new FormData();

    datos.append("idClase", idClase);

    $.ajax({

        url : "ajax/clases.ajax.php",
        method : "POST",
        data : datos,
        cache : false,
        contentType : false,
        processData : false,
        dataType : "json",
        success: function (respuesta){

            console.log("respuesta" , respuesta);

            
            $("#editarId").val(respuesta["id_clase"]);
            
            $("#editarClase").val(respuesta["clase"]);
           
            
        
           

        }

    });

})




/* -------------------------------------------------------------------------- */
/*                  REVISAR SI EL CLASE YA ESTA REGISTRADO                  */
/* -------------------------------------------------------------------------- */
$("#nuevoClase").change(function (){

    $(".alert").remove();

    var clase = $(this).val();

    var datos = new FormData();

    datos.append("validarClase", clase);

    $.ajax({

        url : "ajax/clases.ajax.php",
        method : "POST",
        data : datos,
        cache : false,
        contentType : false,
        processData : false,
        dataType : "json",
        success: function (respuesta){

            if(respuesta){

                $("#nuevoClase").parent().after('<div class="alert alert-warning">Este clase ya existe en la base de datos.</div>');

                $("#nuevoClase").val("");

            }

        }
    })



});





/* -------------------------------------------------------------------------- */
/*                              ELIMINAR CLASE                              */
/* -------------------------------------------------------------------------- */

$(document).on("click" , ".btn_eliminarClase", function (){

    var idClase = $(this).attr("idClase");

    var nombreClase = $(this).attr("nombreClase");


    swal({
                                
        type: "warning",
        title: "Estas seguro de borrar el clase?",
        text: "Si no lo estas puedes cancelar la opción.",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, borrar clase."

    }).then ((result)=>{

        if(result.value){

            window.location = "index.php?ruta=clases&idClase="+idClase+"&nombreClase="+nombreClase;

        }

    })

});
