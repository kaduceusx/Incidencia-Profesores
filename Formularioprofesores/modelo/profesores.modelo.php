<?php

//require("conexion_profesores.php");

class ModeloProfesores{


    /* -------------------------------------------------------------------------- */
    /*                              MOSTRAR PROFESORS                              */
    /* -------------------------------------------------------------------------- */
    static public function mdl_mostrarProfesores($tabla, $item, $valor){

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
    /*                              CREAR PROFESORS                                */
    /* -------------------------------------------------------------------------- */
    static public function mdl_ingresarProfesor($tabla, $datos){

        require ("conexion.php");

        $sql = "INSERT INTO $tabla (apellidos, profesor, email)  VALUES ( :Apellidos, :Profesor, :Email)";

        $stmt = $conexion -> prepare($sql);
        $stmt -> bindParam(":Apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt -> bindParam(":Profesor", $datos["profesor"], PDO::PARAM_STR);
        $stmt -> bindParam(":Email", $datos["email"], PDO::PARAM_STR);
     
      

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";
        }


        $stmt -> close(); 

        $stmt = null;

       


    }


    /* -------------------------------------------------------------------------- */
    /*                               EDITAR PROFESORS                              */
    /* -------------------------------------------------------------------------- */

    static public function mdl_editarProfesor($tabla, $datos){

        require ("conexion.php");

        $stmt = $conexion->prepare("UPDATE $tabla SET  profesor=:profesor, apellidos = :apellidos, email = :email  WHERE id_profesor = :id");

        $stmt -> bindParam(":profesor", $datos["profesor"], PDO::PARAM_STR);
        $stmt -> bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);


        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";
        }


        $stmt -> close(); 

        $stmt = null;

    }



    /* -------------------------------------------------------------------------- */
    /*                             ACTUALIZAR PROFESOR                             */
    /* -------------------------------------------------------------------------- */

    static public function mdl_actualizarProfesor($tabla, $item1, $valor1, $item2, $valor2){

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
    /*                               BORRAR PROFESORS                              */
    /* -------------------------------------------------------------------------- */

    static public function mdl_borrarProfesor($tabla, $datos){

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



   
    


    static function mdl_existeProfesor($login_profesor){

        require ("conexion.php");

        $sql = "SELECT profesor from profesores where profesor = :profesor";
        
        $stmt = $conexion -> prepare($sql);

        $stmt -> bindParam(":profesor", $login_profesor, PDO::PARAM_STR);

        if ($stmt -> execute()){

            $fila = $stmt -> fetch();

            return $fila["profesor"];

        }else {
            return "error";
        }


        $stmt -> close(); 

        $stmt = null;
		 
		
 	
    }
    



}