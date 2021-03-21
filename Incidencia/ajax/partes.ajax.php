<?php

    require_once("../controlador/partes.controlador.php");
    require_once("../modelo/partes.modelo.php");
   

    class AjaxPartes{

    /* -------------------------------------------------------------------------- */
    /*                               EDITAR PARTE                             */
    /* -------------------------------------------------------------------------- */

    public $idParte;
   

    public function ajax_editarParte(){

        $item = "id";
        

        $valor = $this -> idParte;


        $respuesta = ControladorPartes::ctr_mostrarPartes($item, $valor);

        echo json_encode($respuesta);

    }


    /* -------------------------------------------------------------------------- */
    /*                               ACTIVAR PARTE                            */
    /* -------------------------------------------------------------------------- */

    public $activarParte;
    public $activarId;

    public function ajax_activarParte(){

        $tabla = "partes";

        $item1 = "estado";

        $valor1 = $this -> activarParte;

        $item2 = "id";

        $valor2 = $this -> activarId;

        $respuesta_partes = ModeloPartes::mdl_actualizarParte($tabla, $item1, $valor1, $item2, $valor2);

    }


    /* -------------------------------------------------------------------------- */
    /*                         VALIDAR NO REPETIR PARTE                       */
    /* -------------------------------------------------------------------------- */

    public $validarParte;

    public function ajax_validarParte(){

        $item = "PARTE";

        $valor = $this -> validarParte;

        $respuesta = ControladorPartes::ctr_mostrarPartes($item, $valor);

        echo json_encode($respuesta);

    }



}


/* -------------------------------------------------------------------------- */
/*                               EDITAR PARTE                             */
/* -------------------------------------------------------------------------- */

if(isset($_POST["idParte"])){

    $editar = new AjaxPartes();

    $editar -> idParte = $_POST["idParte"];

    $editar -> ajax_editarParte();

}



/* -------------------------------------------------------------------------- */
/*                               ACTIVAR PARTE                               */
/* -------------------------------------------------------------------------- */

if(isset($_POST["activarParte"])){

    $activarParte = new AjaxPartes();

    $activarParte -> activarParte = $_POST["activarParte"];

    $activarParte -> activarId = $_POST["activarId"];

    $activarParte -> ajax_activarParte();

    
}



/* -------------------------------------------------------------------------- */
/*                         VALIDAR NO REPETIR PARTE                         */
/* -------------------------------------------------------------------------- */

if(isset($_POST["validarParte"])){

    $valParte = new AjaxPartes();

    $valParte -> validarParte = $_POST["validarParte"];

    $valParte -> ajax_validarParte();

}

