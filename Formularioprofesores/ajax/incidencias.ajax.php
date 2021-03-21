<?php

    require_once("../controlador/incidencias.controlador.php");
    require_once("../modelo/incidencias.modelo.php");
   

    class AjaxIncidencias{

    /* -------------------------------------------------------------------------- */
    /*                               EDITAR INCIDENCIA                               */
    /* -------------------------------------------------------------------------- */

    public $idIncidencia;

    public function ajax_editarIncidencia(){

        $item = "id_incidencia";

        $valor = $this -> idIncidencia;


        $respuesta = ControladorIncidencias::ctr_mostrarIncidencias($item, $valor);

        echo json_encode($respuesta);

    }


    /* -------------------------------------------------------------------------- */
    /*                               ACTIVAR INCIDENCIA                              */
    /* -------------------------------------------------------------------------- */

    public $activarIncidencia;
    public $activarId;

    public function ajax_activarIncidencia(){

        $tabla = "incidencias";

        $item1 = "estado";

        $valor1 = $this -> activarIncidencia;

        $item2 = "id_incidencia";

        $valor2 = $this -> activarId;

        $respuesta = ModeloIncidencias::mdl_actualizarIncidencia($tabla, $item1, $valor1, $item2, $valor2);

    }


    /* -------------------------------------------------------------------------- */
    /*                         VALIDAR NO REPETIR INCIDENCIA                         */
    /* -------------------------------------------------------------------------- */

    public $validarIncidencia;

    public function ajax_validarIncidencia(){

        $item = "incidencia";

        $valor = $this -> validarIncidencia;

        $respuesta = ControladorIncidencias::ctr_mostrarIncidencias($item, $valor);

        echo json_encode($respuesta);

    }



}


/* -------------------------------------------------------------------------- */
/*                               EDITAR INCIDENCIA                               */
/* -------------------------------------------------------------------------- */

    if(isset($_POST["idIncidencia"])){

        $editar = new AjaxIncidencias();

        $editar -> idIncidencia = $_POST["idIncidencia"];
    
        $editar -> ajax_editarIncidencia();

    }



/* -------------------------------------------------------------------------- */
/*                               ACTIVAR INCIDENCIA                               */
/* -------------------------------------------------------------------------- */

if(isset($_POST["activarIncidencia"])){

    $activarIncidencia = new AjaxIncidencias();

    $activarIncidencia -> activarIncidencia = $_POST["activarIncidencia"];

    $activarIncidencia -> activarId = $_POST["activarId"];

    $activarIncidencia -> ajax_activarIncidencia();

    
}



/* -------------------------------------------------------------------------- */
/*                         VALIDAR NO REPETIR INCIDENCIA                         */
/* -------------------------------------------------------------------------- */

if(isset($_POST["validarIncidencia"])){

    $valIncidencia = new AjaxIncidencias();

    $valIncidencia -> validarIncidencia = $_POST["validarIncidencia"];

    $valIncidencia -> ajax_validarIncidencia();

}

