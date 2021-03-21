<?php

    require_once("../controlador/profesores.controlador.php");
    require_once("../modelo/profesores.modelo.php");
   

class AjaxProfesores{

    /* -------------------------------------------------------------------------- */
    /*                               EDITAR PROFESOR                               */
    /* -------------------------------------------------------------------------- */

    public $idProfesor;

    public function ajax_editarProfesor(){

        $item = "id_profesor";

        $valor = $this -> idProfesor;


        $respuesta1 = ControladorProfesores::ctr_mostrarProfesores($item, $valor);

        echo json_encode($respuesta1);

    }


    


    /* -------------------------------------------------------------------------- */
    /*                         VALIDAR NO REPETIR PROFESOR                         */
    /* -------------------------------------------------------------------------- */

    public $validarProfesor;

    public function ajax_validarProfesor(){

        $item = "profesor";

        $valor = $this -> validarProfesor;

        $respuesta = ControladorProfesores::ctr_mostrarProfesores($item, $valor);

        echo json_encode($respuesta);

    }



}


/* -------------------------------------------------------------------------- */
/*                               EDITAR PROFESOR                               */
/* -------------------------------------------------------------------------- */

    if(isset($_POST["idProfesor"])){

        $editar = new AjaxProfesores();

        $editar -> idProfesor = $_POST["idProfesor"];
    
        $editar -> ajax_editarProfesor();

    }







/* -------------------------------------------------------------------------- */
/*                         VALIDAR NO REPETIR PROFESOR                         */
/* -------------------------------------------------------------------------- */

if(isset($_POST["validarProfesor"])){

    $valProfesor = new AjaxProfesores();

    $valProfesor -> validarProfesor = $_POST["validarProfesor"];

    $valProfesor -> ajax_validarProfesor();

}

