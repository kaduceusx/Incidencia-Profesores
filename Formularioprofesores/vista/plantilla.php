<?php
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>AMP</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


<!-- -------------------------------------------------------------------------- */
/*                                 PLUGINS CSS                                */
/* -------------------------------------------------------------------------- */-->
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vista/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vista/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="vista/dist/css/AdminLTE.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">




<!-- -------------------------------------------------------------------------- */
/*                                 PLUGINS JS                                 */
/* -------------------------------------------------------------------------- */-->
  <!-- jQuery 3 -->
  <script src="vista/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- Bootstrap 3.3.7 -->
  <script src="vista/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


  <!-- AdminLTE App -->
  <script src="vista/dist/js/adminlte.min.js"></script>


  <!-- Sweetalert 2 -->
  <script src="vista/plugins/sweetalert2/sweetalert2.all.js"></script>

</head>


<body >

<?php

      echo '<div class="wrapper" style=" margin-top:0%">';

      /* -------------------------------------------------------------------------- */
      /*                                  CABEZOTE                                  */
      /* -------------------------------------------------------------------------- */
      include("modulos/cabezote.php");


      /* -------------------------------------------------------------------------- */
      /*                                  CONTENIDO                                 */
      /* -------------------------------------------------------------------------- */


      if(isset($_GET["ruta"])){

        $ruta = $_GET["ruta"];

        if($ruta == "inicio"){
          
          include("modulos/" . $ruta . ".php");

        }else{

            include("modulos/404.php");
        }

      }else{

        include("modulos/inicio.php"); //no se manda ningun $_get por lo tanto es como poner ruta = /

      }
    
  



      /* -------------------------------------------------------------------------- */
      /*                                   FOOTER                                   */
      /* -------------------------------------------------------------------------- */
      include("modulos/pie.php"); 
    
      echo '</div>';

    
  


?>


<!-- Estas son los js personalizados propios -->
<script src="vista/js/plantilla.js"></script>

<script src="vista/js/profesores.js"></script>

<script src="vista/js/clases.js"></script>

<script src="vista/js/incidencias.js"></script>

<script src="vista/js/partes.js"></script>



</body>
</html>
