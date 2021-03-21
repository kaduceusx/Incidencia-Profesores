<?php


/*class Conexion{

 
    static public function conectar(){

        

        //localhost
        $hostna = "localhost";
        $dns = "mysql:host=localhost;dbname=amp";
        $usu = "root";
        $pass = "";
        $db = "geriatry";


        $conexion = new PDO($dns, $usu, $pass);

        $conexion->exec("set names utf8");

        return $conexion;
    }
}*/




//localhost
$hostna = "localhost";
$dns = "mysql:host=localhost;dbname=amp";
$usu = "admin_fesergry";
$pass = "admin_Fesergry";



//dondominio
/*$dns = "mysql:host=bbdd.check-point.online;dbname=ddb156619";
$usu = "ddb156619";
$pass = "Alicante2020";*/

try{
    $conexion = new PDO($dns, $usu, $pass);

    $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conexion -> exec("SET CHARACTER SET UTF8");

}catch(Exception $e){

    echo "El error es: " . $e->getMessage();
}

?>