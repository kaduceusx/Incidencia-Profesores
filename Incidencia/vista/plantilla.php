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

  <!-- <link rel="icon" href="vista/img/plantilla/icono-negro.png"> -->

<!-- -------------------------------------------------------------------------- */
/*                                 PLUGINS CSS                                */
/* -------------------------------------------------------------------------- */-->
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vista/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vista/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="vista/dist/css/AdminLTE.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="vista/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

   <!-- DataTables -->
   <link rel="stylesheet" href="vista/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

   <link rel="stylesheet" href="vista/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">


<!-- -------------------------------------------------------------------------- */
/*                                 PLUGINS JS                                 */
/* -------------------------------------------------------------------------- */-->
  <!-- jQuery 3 -->
  <script src="vista/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- Bootstrap 3.3.7 -->
  <script src="vista/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


  <!-- AdminLTE App -->
  <script src="vista/dist/js/adminlte.min.js"></script>

  <!-- DataTables -->
  <script src="vista/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

  <script src="vista/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <script src="vista/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  
  <script src="vista/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>


  <!-- Sweetalert 2 -->
  <script src="vista/plugins/sweetalert2/sweetalert2.all.js"></script>

</head>


<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">

<?php








  if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){ 


    
    if($_SESSION["perfil"] == "Administrador"){

      echo '<div class="wrapper">';

      /* -------------------------------------------------------------------------- */
      /*                                  CABEZOTE                                  */
      /* -------------------------------------------------------------------------- */
      include("modulos/cabezote.php");


      /* -------------------------------------------------------------------------- */
      /*                                MENU LATERAL                                */
      /* -------------------------------------------------------------------------- */
      include("modulos/menu_lateral.php");


      /* -------------------------------------------------------------------------- */
      /*                                  CONTENIDO                                 */
      /* -------------------------------------------------------------------------- */


      if(isset($_GET["ruta"])){

        $ruta = $_GET["ruta"];

        if($ruta == "inicio" //inicio
          || $ruta == "usuarios" //usuarios
          || $ruta == "profesores"
          || $ruta == "clases"
          || $ruta == "incidencias"
          || $ruta == "partes"
          || $ruta == "salir"){ //salir
          
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

    }
  }else{

    
    include("modulos/login.php");
  
  }


?>


<!-- Estas son los js personalizados propios -->
<script src="vista/js/plantilla.js"></script>

<script src="vista/js/usuarios.js"></script>

<script src="vista/js/profesores.js"></script>

<script src="vista/js/clases.js"></script>

<script src="vista/js/incidencias.js"></script>

<script src="vista/js/partes.js"></script>



</body>
</html>
