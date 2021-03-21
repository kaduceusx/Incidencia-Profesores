<?php

class ControladorPartes{


    /* -------------------------------------------------------------------------- */
    /*                                CREAR PARTES                               */
    /* -------------------------------------------------------------------------- */

    public function ctr_crearParte(){

        if(isset($_POST["guardar_parte"])){  
            
            
    
            $fecha = $_POST["nuevoFecha"];
            $hora = $_POST["nuevoHora"];
            
            $nombre_profesor = $_POST["nuevoProfesor"];
            $nombre_clase = $_POST["nuevoClase"];
            $nombre_incidencia = $_POST["nuevoIncidencia"];
            $partes = $_POST["nuevoObservacion"];
 
           

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ,.-]+$/', $partes ) ){

               

                $tabla = "partes";

                $datos =[

                    "fecha" => $fecha . " " . $hora,
                    "partes" => $partes,
                    "nombre_profesor" => $nombre_profesor,
                    "nombre_clase" => $nombre_clase,
                    "nombre_incidencia" => $nombre_incidencia
                    

                ];


                $respuesta = ModeloPartes::mdl_ingresarParte($tabla, $datos);

                if($respuesta == "ok"){

                    echo '<script>

                        swal({
                            
                            type: "success",
                            title: "!El parte ha sido guardado correctamente.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                        }).then((result)=>{

                            if(result.value){

                                window.location = "http://fesergry.ddns.net/Formularioprofesores/";
                            }

                        });

                    </script>';

                }else if ($respuesta == "error"){

                    echo '<script>

                        swal({
                            
                            type: "error",
                            title: "Error de tipo sql",
                            text: "Hay un problema en la consulta, de tipo sql.",
                            confirmButtonText: "Cerrar",

                        }).then((result)=>{

                            if(result.value){

                                window.location = "partes";
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

                                window.location = "partes";
                            }

                        });

                    </script>';

            }

        }

    }


    /* -------------------------------------------------------------------------- */
    /*                              MOSTRAR PARTES                              */
    /* -------------------------------------------------------------------------- */

    static public function ctr_mostrarPartes($item, $valor){

        $tabla = "partes";


        $respuesta = ModeloPartes::mdl_mostrarPartes($tabla, $item, $valor);

        return $respuesta;


    }


        /* -------------------------------------------------------------------------- */
    /*                               EDITAR PARTES                              */
    /* -------------------------------------------------------------------------- */
    
    public function ctr_editarParte(){

        if(isset($_POST["modificar_parte"])){


            $id = $_POST["editarId"];
            $fecha = $_POST["editarFecha"];
            $profesor = $_POST["editarProfesor"];
            $clase = $_POST["editarClase"];
            $incidencia = $_POST["editarIncidencia"];
            $observaciones = $_POST["editarObservacion"];
            $resolucion = $_POST["editarResolucion"];
          
 

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ,.-]+$/', $observaciones ) ){


                $tabla = "partes";

               

                $datos =[

               
                    "id" => $id,
                    "fecha" => $fecha,
                    "profesor" => $profesor,
                    "clase" => $clase,
                    "incidencia" => $incidencia,
                    "parte" => $observaciones,
                    "resolucion" => $resolucion

                ];


                $respuesta = ModeloPartes::mdl_editarParte($tabla, $datos);


                if($respuesta == "ok"){

                    echo '<script>

                        swal({
                            
                            type: "success",
                            title: "!El parte ha sido editado correctamente.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                        }).then((result)=>{

                            if(result.value){

                                window.location = "partes";
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

                                window.location = "partes";
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

                        window.location = "partes";
                    }

                });

            </script>';

            }



        }

    }



    /* -------------------------------------------------------------------------- */
    /*                               BORRAR PARTES                               */
    /* -------------------------------------------------------------------------- */

    public function ctr_borrarParte(){

        if(isset($_GET["idParte"])){

            $tabla = "partes";

            $datos = $_GET["idParte"];


            $respuesta = ModeloPartes::mdl_borrarParte($tabla, $datos);

            if($respuesta == "ok"){

                echo '<script>

                    swal({
                        
                        type: "success",
                        title: "!El parte ha sido borrada correctamente.",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false

                    }).then((result)=>{

                        if(result.value){

                            window.location = "partes";
                        }

                    });

                </script>';


            }

        }


    }










}



