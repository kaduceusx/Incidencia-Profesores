<?php

    require_once("../controlador/clases.controlador.php");
    require_once("../modelo/clases.modelo.php");
   

    class AjaxClases{

    /* -------------------------------------------------------------------------- */
    /*                               EDITAR CLASE                             */
    /* -------------------------------------------------------------------------- */

    public $idClase;

    public function ajax_editarClase(){

        $item = "id_clase";

        $valor = $this -> idClase;


        $respuesta = ControladorClases::ctr_mostrarClases($item, $valor);

        echo json_encode($respuesta);

    }


    


    /* -------------------------------------------------------------------------- */
    /*                         VALIDAR NO REPETIR CLASE                       */
    /* -------------------------------------------------------------------------- */

    public $validarClase;

    public function ajax_validarClase(){

        $item = "clase";

        $valor = $this -> validarClase;

        $respuesta = ControladorClases::ctr_mostrarClases($item, $valor);

        echo json_encode($respuesta);

    }



}


/* -------------------------------------------------------------------------- */
/*                               EDITAR CLASE                             */
/* -------------------------------------------------------------------------- */

if(isset($_POST["idClase"])){

    $editar = new AjaxClases();

    $editar -> idClase = $_POST["idClase"];

    $editar -> ajax_editarClase();

}






/* -------------------------------------------------------------------------- */
/*                         VALIDAR NO REPETIR CLASE                         */
/* -------------------------------------------------------------------------- */

if(isset($_POST["validarClase"])){

    $valClase = new AjaxClases();

    $valClase -> validarClase = $_POST["validarClase"];

    $valClase -> ajax_validarClase();

}

