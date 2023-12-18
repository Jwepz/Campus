<?php
    // ini_set('display_errors',1);
    // error_reporting(E_ALL);
       /*conexion a la base de datos */
    class Conexion{

        private $servidor= "localhost";
        private $usuario= "root";
        private $conexion;

 
        public function __construct(){

            try {
                $this->conexion = new PDO("mysql:host=$this->servidor;dbname=campus", $this->usuario);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo "Fallo la conexión: " . $e->getMessage();
            }
        }

        public function ejecutar($sql){ //Insertar/Borrar/Actualizar

            $this->conexion->exec($sql);
            return $this->conexion->lastInsertId();
        }
        /*Me devuelve todos los datos de la base */
        public function consultar($sql){
            $sentencia=$this->conexion->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll();

        }
    }

?>
