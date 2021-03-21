<?php

//require("conexion_incidencias.php");

class ModeloIncidencias{


    /* -------------------------------------------------------------------------- */
    /*                              MOSTRAR INCIDENCIAS                              */
    /* -------------------------------------------------------------------------- */
    static public function mdl_mostrarIncidencias($tabla, $item, $valor){

        require ("conexion.php");

        if($item != null){

            //DATE_FORMAT(F_nacimiento, "%d-%m-%Y") as F_nacimiento

            $sql="SELECT * FROM $tabla where $item= :$item";

            $stmt = $conexion -> prepare($sql);

            $stmt -> bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();

        }else{

            $sql = "SELECT * FROM $tabla";

            $stmt = $conexion -> prepare($sql);

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        

        $stmt -> close(); //deberia bastar con el return...

        $stmt = null;

    }




    /* -------------------------------------------------------------------------- */
    /*                              CREAR INCIDENCIAS                                */
    /* -------------------------------------------------------------------------- */
    static public function mdl_ingresarIncidencia($tabla, $datos){

        require ("conexion.php");

        $sql = "INSERT INTO $tabla (incidencia)  VALUES (:incidencia)";

        $stmt = $conexion -> prepare($sql);

 
        $stmt -> bindParam(":incidencia", $datos["incidencia"], PDO::PARAM_STR);
     
       

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";
        }


        $stmt -> close(); 

        $stmt = null;

       


    }


    /* -------------------------------------------------------------------------- */
    /*                               EDITAR INCIDENCIAS                              */
    /* -------------------------------------------------------------------------- */

    static public function mdl_editarIncidencia($tabla, $datos){

        require ("conexion.php");


        $stmt = $conexion->prepare("UPDATE $tabla SET incidencia = :incidencia WHERE id_incidencia= :id");

        $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);
    
        $stmt -> bindParam(":incidencia", $datos["incidencia"], PDO::PARAM_STR);
    



        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";
        }


        $stmt -> close(); 

        $stmt = null;

    }



    /* -------------------------------------------------------------------------- */
    /*                             ACTUALIZAR INCIDENCIA                             */
    /* -------------------------------------------------------------------------- */

    static public function mdl_actualizarIncidencia($tabla, $item1, $valor1, $item2, $valor2){

        require ("conexion.php");

        $stmt = $conexion->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
        $stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

        
        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";
        }


        $stmt -> close(); 

        $stmt = null;


    }


    /* -------------------------------------------------------------------------- */
    /*                               BORRAR INCIDENCIAS                              */
    /* -------------------------------------------------------------------------- */

    static public function mdl_borrarIncidencia($tabla, $datos){

        require ("conexion.php");

        $sql = "DELETE FROM $tabla where id= :id";

        $stmt = $conexion -> prepare($sql);

        $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";
        }


        $stmt -> close(); 

        $stmt = null;

    }





}