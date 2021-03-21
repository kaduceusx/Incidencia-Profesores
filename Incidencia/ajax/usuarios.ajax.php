<?php

    require_once("../controlador/usuarios.controlador.php");
    require_once("../modelo/usuarios.modelo.php");
   

    class AjaxUsuarios{

/* -------------------------------------------------------------------------- */
/*                               EDITAR USUARIO                               */
/* -------------------------------------------------------------------------- */

    public $idUsuario;

    public function ajax_editarUsuario(){

        $item = "id_usuario";

        $valor = $this -> idUsuario;

        $respuesta = ControladorUsuarios::ctr_mostrarUsuarios($item, $valor);

        echo json_encode($respuesta);

    }


    /* -------------------------------------------------------------------------- */
    /*                               ACTIVAR USUARIO                              */
    /* -------------------------------------------------------------------------- */

    public $activarUsuario;
    public $activarIdUsuario;

    public function ajax_activarUsuario(){

        $tabla = "usuarios";

        $item1 = "estado";

        $valor1 = $this -> activarUsuario;

        $item2 = "id_usuario";

        $valor2 = $this -> activarIdUsuario;

        $respuesta_usuarios = ModeloUsuarios::mdl_actualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

    }


    /* -------------------------------------------------------------------------- */
    /*                         VALIDAR NO REPETIR USUARIO                         */
    /* -------------------------------------------------------------------------- */

    public $validarUsuario;

    public function ajax_validarUsuario(){

        $item = "usuario";

        $valor = $this -> validarUsuario;

        $respuesta = ControladorUsuarios::ctr_mostrarUsuarios($item, $valor);

        echo json_encode($respuesta);

    }

}


/* -------------------------------------------------------------------------- */
/*                               EDITAR USUARIO                               */
/* -------------------------------------------------------------------------- */

    if(isset($_POST["idUsuario"])){

        $editar = new AjaxUsuarios();

        $editar -> idUsuario = $_POST["idUsuario"];
    
        $editar -> ajax_editarUsuario();

    }



/* -------------------------------------------------------------------------- */
/*                               ACTIVAR USUARIO                               */
/* -------------------------------------------------------------------------- */

if(isset($_POST["activarUsuario"])){

    $activarUsuario = new AjaxUsuarios();

    $activarUsuario -> activarUsuario = $_POST["activarUsuario"];

    $activarUsuario -> activarIdUsuario = $_POST["activarIdUsuario"];

    $activarUsuario -> ajax_activarUsuario();

    
}



/* -------------------------------------------------------------------------- */
/*                         VALIDAR NO REPETIR USUARIO                         */
/* -------------------------------------------------------------------------- */

if(isset($_POST["validarUsuario"])){

    $valUsuario = new AjaxUsuarios();

    $valUsuario -> validarUsuario = $_POST["validarUsuario"];

    $valUsuario -> ajax_validarUsuario();

}

