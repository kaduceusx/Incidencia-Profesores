<?php

class ControladorProfesores{


    /* -------------------------------------------------------------------------- */
    /*                                CREAR PROFESOR                               */
    /* -------------------------------------------------------------------------- */

    public function ctr_crearProfesor(){

        if(isset($_POST["guardar_profesor"])){   

            $apellidos = $_POST["nuevoApellidos"];
            $profesor = $_POST["nuevoProfesor"];
      
          
            $email = $_POST["nuevoEmail"];
            

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $profesor ) 
            && preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $apellidos)){

                    


                $tabla = "profesores";

                $datos =[

                   
                    "apellidos" => $apellidos,
                    "profesor" => $profesor,
                    "email" => $email
                
                ];


                $respuesta = ModeloProfesores::mdl_ingresarProfesor($tabla, $datos);

                if($respuesta == "ok"){

                    echo '<script>

                        swal({
                            
                            type: "success",
                            title: "!El profesor ha sido guardado correctamente.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                        }).then((result)=>{

                            if(result.value){

                                window.location = "profesores";
                            }

                        });

                    </script>';

                }else if ($respuesta == "error"){

                    echo '<script>

                        swal({
                            
                            type: "error",
                            title: "Error de tipo sql",
                            text: "Revisa la funcion del modelo",
                            confirmButtonText: "Cerrar",

                        }).then((result)=>{

                            if(result.value){

                                window.location = "profesores";
                            }

                        });

                    </script>';
                }


            }else {

                echo '<script>

                        swal({
                            
                            type: "error",
                            title: "!El profesor no puede ir vacío o llevar carácteres especiales",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                        }).then((result)=>{

                            if(result.value){

                                window.location = "profesores";
                            }

                        });

                    </script>';

            }

        }

    }


    /* -------------------------------------------------------------------------- */
    /*                              MOSTRAR PROFESORS                              */
    /* -------------------------------------------------------------------------- */

    static public function ctr_mostrarProfesores($item, $valor){

        $tabla = "profesores";


        $respuesta = ModeloProfesores::mdl_mostrarProfesores($tabla, $item, $valor);

        return $respuesta;


    }

   


    /* -------------------------------------------------------------------------- */
    /*                               EDITAR PROFESOR                              */
    /* -------------------------------------------------------------------------- */
    
    public function ctr_editarProfesor(){

        if(isset($_POST["modificar_profesor"])){

            $id = $_POST["editarId"];
            $profesor = $_POST["editarProfesor"];
            $apellidos = $_POST["editarApellidos"];
            $email = $_POST["editarEmail"];
           


            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $profesor ) 
            && preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $apellidos)){ 

                if(preg_match('/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/', $email)){

                    $tabla = "profesores";

                    $datos =[

                    "id" => $id,
                    "profesor" => $profesor,
                    "apellidos" => $apellidos,
                    "email" => $email

                    ];


                    $respuesta = ModeloProfesores::mdl_editarProfesor($tabla, $datos);


                    if($respuesta == "ok"){

                        echo '<script>

                            swal({
                                
                                type: "success",
                                title: "!El profesor ha sido editado correctamente.",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false

                            }).then((result)=>{

                                if(result.value){

                                    window.location = "profesores";
                                }

                            });

                        </script>';

                    }else if ($respuesta == "error"){

                        echo '<script>

                            swal({
                                
                                type: "error",
                                title: "Error de tipo sql",
                                text: "Revisa la funcion del modelo",
                                confirmButtonText: "Cerrar",

                            }).then((result)=>{

                                if(result.value){

                                    window.location = "profesores";
                                }

                            });

                        </script>';
                    }

                }else{

                    echo '<script>

                            swal({
                                
                                type: "error",
                                title: "No ha ingresado correctamente la dirección de correo.",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false

                            }).then((result)=>{

                                if(result.value){

                                    window.location = "profesores";
                                }

                            });

                    </script>';
                }

               
                
            }else{
                
                echo '<script>

                swal({
                    
                    type: "error",
                    title: "!El nombre o el apellido no puede ir vacío o llevar carácteres especiales",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false

                }).then((result)=>{

                    if(result.value){

                        window.location = "profesores";
                    }

                });

            </script>';

            }



        }

    }



    /* -------------------------------------------------------------------------- */
    /*                               BORRAR PROFESOR                               */
    /* -------------------------------------------------------------------------- */

    public function ctr_borrarProfesor(){

        if(isset($_GET["idProfesor"])){

            $tabla = "profesores";

            $datos = $_GET["idProfesor"];

           

            $respuesta = ModeloProfesores::mdl_borrarProfesor($tabla, $datos);

            if($respuesta == "ok"){

                echo '<script>

                    swal({
                        
                        type: "success",
                        title: "!El profesor ha sido editado correctamente.",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false

                    }).then((result)=>{

                        if(result.value){

                            window.location = "profesores";
                        }

                    });

                </script>';


            }

        }


    }








}



