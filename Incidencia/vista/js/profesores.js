



/* -------------------------------------------------------------------------- */
/*                        EDITAR PROFESOR                                      */
/* -------------------------------------------------------------------------- */

$(document).on("click" , ".btn_editarProfesor", function (){

    var idProfesor = $(this).attr("idProfesor");

    var datos = new FormData();

    datos.append("idProfesor", idProfesor);

    $.ajax({

        url : "ajax/profesores.ajax.php",
        method : "POST",
        data : datos,
        cache : false,
        contentType : false,
        processData : false,
        dataType : "json",
        success: function (respuesta){

            //console.log("respuesta" , respuesta);

            $("#editarId").val(respuesta["id_profesor"]);
            $("#editarApellidos").val(respuesta["apellidos"]);
            $("#editarProfesor").val(respuesta["profesor"]);
           
            $("#editarEmail").val(respuesta["email"]);
        
           

        }

    });

})






/* -------------------------------------------------------------------------- */
/*                  REVISAR SI EL PROFESOR YA ESTA REGISTRADO                  */
/* -------------------------------------------------------------------------- */
$("#nuevoProfesor").change(function (){

    $(".alert").remove();

    var profesor = $(this).val();

    var datos = new FormData();

    datos.append("validarProfesor", profesor);

    $.ajax({

        url : "ajax/profesores.ajax.php",
        method : "POST",
        data : datos,
        cache : false,
        contentType : false,
        processData : false,
        dataType : "json",
        success: function (respuesta){

            if(respuesta){

                $("#nuevoProfesor").parent().after('<div class="alert alert-warning">Este profesor ya existe en la base de datos.</div>');

                $("#nuevoProfesor").val("");

            }

        }
    })



});





/* -------------------------------------------------------------------------- */
/*                              ELIMINAR PROFESOR                              */
/* -------------------------------------------------------------------------- */

$(document).on("click" , ".btn_eliminarProfesor", function (){

    var idProfesor = $(this).attr("idProfesor");

    var nombreProfesor = $(this).attr("nombreProfesor");


    swal({
                                
        type: "warning",
        title: "Estas seguro de borrar el profesor?",
        text: "Si no lo estas puedes cancelar la opción.",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, borrar profesor."

    }).then ((result)=>{

        if(result.value){

            window.location = "index.php?ruta=profesores&idProfesor="+idProfesor+"&nombreProfesor="+nombreProfesor;

        }

    })

});
