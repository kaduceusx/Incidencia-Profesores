<?php

class ControladorClases{


    /* -------------------------------------------------------------------------- */
    /*                                CREAR CLASE                              */
    /* -------------------------------------------------------------------------- */

    public function ctr_crearClase(){

        if(isset($_POST["guardar_clase"])){   

            $clase = $_POST["nuevoClase"];
          
           
            if(preg_match('/^[a-zA-Z0-9ñÑ -.]+$/', $clase)){


                $tabla = "clases";

                $datos =[

                    
                    "clase" => $clase,
                    
                ];


                $respuesta = ModeloClases::mdl_ingresarClase($tabla, $datos);

                if($respuesta == "ok"){

                    echo '<script>

                        swal({
                            
                            type: "success",
                            title: "!El clase ha sido guardado correctamente.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                        }).then((result)=>{

                            if(result.value){

                                window.location = "clases";
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

                                window.location = "clases";
                            }

                        });

                    </script>';
                }


            }else {

                echo '<script>

                        swal({
                            
                            type: "error",
                            title: "!La clase no puede ir vacía o llevar carácteres que no sean (. -)",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                        }).then((result)=>{

                            if(result.value){

                                window.location = "clases";
                            }

                        });

                    </script>';

            }

        }

    }


    /* -------------------------------------------------------------------------- */
    /*                              MOSTRAR CLASE                             */
    /* -------------------------------------------------------------------------- */

    static public function ctr_mostrarClases($item, $valor){

        $tabla = "clases";


        $respuesta = ModeloClases::mdl_mostrarClases($tabla, $item, $valor);

        return $respuesta;


    }

   


    /* -------------------------------------------------------------------------- */
    /*                               EDITAR CLASE                             */
    /* -------------------------------------------------------------------------- */
    
    public function ctr_editarClase(){

        if(isset($_POST["modificar_clase"])){

            $id = $_POST["editarId"];
            $clase = $_POST["editarClase"];
         


            if(preg_match('/^[a-zA-Z0-9ñÑ -.]+$/', $clase)){

         
                $tabla = "clases";

                $datos =[

                    "id" => $id,
                    "clase" => $clase

                ];


                $respuesta = ModeloCLases::mdl_editarClase($tabla, $datos);


                if($respuesta == "ok"){

                    echo '<script>

                        swal({
                            
                            type: "success",
                            title: "!El clase ha sido editado correctamente.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                        }).then((result)=>{

                            if(result.value){

                                window.location = "clases";
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

                                window.location = "clases";
                            }

                        });

                    </script>';
                }

            }else{
                
                echo '<script>

                swal({
                    
                    type: "error",
                    title: "!La clase no puede ir vacía o llevar carácteres que no sean (. -)",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false

                }).then((result)=>{

                    if(result.value){

                        window.location = "clases";
                    }

                });

            </script>';

            }



        }

    }



    /* -------------------------------------------------------------------------- */
    /*                               BORRAR CLASE                              */
    /* -------------------------------------------------------------------------- */

    public function ctr_borrarClase(){

        if(isset($_GET["idClase"])){

            $tabla = "clases";

            $datos = $_GET["idClase"];

        
            $respuesta = ModeloClases::mdl_borrarClase($tabla, $datos);

            if($respuesta == "ok"){

                echo '<script>

                    swal({
                        
                        type: "success",
                        title: "!El clase ha sido borrada correctamente.",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false

                    }).then((result)=>{

                        if(result.value){

                            window.location = "clases";
                        }

                    });

                </script>';


            }

        }


    }








}



