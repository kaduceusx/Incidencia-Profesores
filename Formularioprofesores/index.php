<?php

require_once("controlador/plantilla.controlador.php");

require_once("controlador/profesores.controlador.php");
require_once("controlador/clases.controlador.php");
require_once("controlador/incidencias.controlador.php");
require_once("controlador/partes.controlador.php");




require_once("modelo/profesores.modelo.php");
require_once("modelo/clases.modelo.php");
require_once("modelo/incidencias.modelo.php");
require_once("modelo/partes.modelo.php");



$plantilla = new ControladorPlantilla();
$plantilla -> ctr_plantilla();