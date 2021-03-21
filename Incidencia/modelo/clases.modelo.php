<?php

//require("conexion_clase.php");

class ModeloClases{


    /* -------------------------------------------------------------------------- */
    /*                              MOSTRAR CLASES                              */
    /* -------------------------------------------------------------------------- */
    static public function mdl_mostrarClases($tabla, $item, $valor){

        require ("conexion.php");

        if($item != null){


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
    /*                              CREAR CLASES                                */
    /* -------------------------------------------------------------------------- */
    static public function mdl_ingresarClase($tabla, $datos){

        require ("conexion.php");

        $sql = "INSERT INTO $tabla (clase)  VALUES (:clase)";

        $stmt = $conexion -> prepare($sql);

        $stmt -> bindParam(":clase", $datos["clase"], PDO::PARAM_STR);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";
        }


        $stmt -> close(); 

        $stmt = null;

       


    }


    /* -------------------------------------------------------------------------- */
    /*                               EDITAR CLASES                              */
    /* -------------------------------------------------------------------------- */

    static public function mdl_editarClase($tabla, $datos){

        require ("conexion.php");

        $stmt = $conexion->prepare("UPDATE $tabla SET clase = :clase  WHERE id_clase = :id");

        $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);
		$stmt -> bindParam(":clase", $datos["clase"], PDO::PARAM_STR);


        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";
        }


        $stmt -> close(); 

        $stmt = null;

    }



    /* -------------------------------------------------------------------------- */
    /*                             ACTUALIZAR CLASE                              */
    /* -------------------------------------------------------------------------- */

    static public function mdl_actualizarClase($tabla, $item1, $valor1, $item2, $valor2){

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
    /*                               BORRAR CLASE                              */
    /* -------------------------------------------------------------------------- */

    static public function mdl_borrarClase($tabla, $datos){

        require ("conexion.php");

        $sql = "DELETE FROM $tabla where id_clase= :id";

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