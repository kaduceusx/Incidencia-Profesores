<?php

class ControladorIncidencias{


    /* -------------------------------------------------------------------------- */
    /*                                CREAR INCIDENCIAS                               */
    /* -------------------------------------------------------------------------- */

    public function ctr_crearIncidencia(){

        if(isset($_POST["guardar_incidencia"])){   

            $incidencia = $_POST["nuevoIncidencia"];
 
           

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ,.-]+$/', $incidencia ) ){

               

                $tabla = "incidencias";

                $datos =[

                    "incidencia" => $incidencia
                    

                ];


                $respuesta = ModeloIncidencias::mdl_ingresarIncidencia($tabla, $datos);

                if($respuesta == "ok"){

                    echo '<script>

                        swal({
                            
                            type: "success",
                            title: "!El incidencia ha sido guardado correctamente.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                        }).then((result)=>{

                            if(result.value){

                                window.location = "incidencias";
                            }

                        });

                    </script>';

                }else if ($respuesta == "error"){

                    echo '<script>

                        swal({
                            
                            type: "error",
                            title: "Error de tipo sql",
                            text: "'.$fecha.'",
                            confirmButtonText: "Cerrar",

                        }).then((result)=>{

                            if(result.value){

                                window.location = "incidencias";
                            }

                        });

                    </script>';
                }

                

                    



            }else {

                echo '<script>

                        swal({
                            
                            type: "error",
                            title: "!El camppo observaciones no puede ir vacío o llevar carácteres especiales",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                        }).then((result)=>{

                            if(result.value){

                                window.location = "incidencias";
                            }

                        });

                    </script>';

            }

        }

    }


    /* -------------------------------------------------------------------------- */
    /*                              MOSTRAR INCIDENCIAS                              */
    /* -------------------------------------------------------------------------- */

    static public function ctr_mostrarIncidencias($item, $valor){

        $tabla = "incidencias";


        $respuesta = ModeloIncidencias::mdl_mostrarIncidencias($tabla, $item, $valor);

        return $respuesta;


    }

   


    /* -------------------------------------------------------------------------- */
    /*                               EDITAR INCIDENCIAS                              */
    /* -------------------------------------------------------------------------- */
    
    public function ctr_editarIncidencia(){

        if(isset($_POST["modificar_incidencia"])){


            $id = $_POST["editarId"];
          
            $incidencia = $_POST["editarIncidencia"];
          
 
      


            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ,.-]+$/', $incidencia ) ){


                $tabla = "incidencias";

               

                $datos =[

               
                    "id" => $id,
                    "incidencia" => $incidencia

                ];


                $respuesta = ModeloIncidencias::mdl_editarIncidencia($tabla, $datos);


                if($respuesta == "ok"){

                    echo '<script>

                        swal({
                            
                            type: "success",
                            title: "!El incidencia ha sido editado correctamente.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                        }).then((result)=>{

                            if(result.value){

                                window.location = "incidencias";
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

                                window.location = "incidencias";
                            }

                        });

                    </script>';
                }

                    


            
                
               

            }else{
                
                echo '<script>

                swal({
                    
                    type: "error",
                    title: "!El nombre no puede ir vacío o llevar carácteres especiales",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false

                }).then((result)=>{

                    if(result.value){

                        window.location = "incidencias";
                    }

                });

            </script>';

            }



        }

    }



    /* -------------------------------------------------------------------------- */
    /*                               BORRAR INCIDENCIAS                               */
    /* -------------------------------------------------------------------------- */

    public function ctr_borrarIncidencia(){

        if(isset($_GET["idIncidencia"])){

            $tabla = "incidencias";

            $datos = $_GET["idIncidencia"];


            $respuesta = ModeloIncidencias::mdl_borrarIncidencia($tabla, $datos);

            if($respuesta == "ok"){

                echo '<script>

                    swal({
                        
                        type: "success",
                        title: "!El incidencia ha sido borrada correctamente.",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false

                    }).then((result)=>{

                        if(result.value){

                            window.location = "incidencias";
                        }

                    });

                </script>';


            }

        }


    }








}



