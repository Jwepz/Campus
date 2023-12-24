<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);
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

        public function limpiar_cadena($sql){
            $sql=trim($sql);
            $sql=stripslashes($sql);
            $sql=str_ireplace("<script>", "", $sql);
            $sql=str_ireplace("</script>", "", $sql);
            $sql=str_ireplace("<script src", "", $sql);
            $sql=str_ireplace("<script type=", "", $sql);
            $sql=str_ireplace("SELECT * FROM", "", $sql);
            $sql=str_ireplace("DELETE FROM", "", $sql);
            $sql=str_ireplace("INSERT INTO", "", $sql);
            $sql=str_ireplace("DROP TABLE", "", $sql);
            $sql=str_ireplace("DROP DATABASE", "", $sql);
            $sql=str_ireplace("TRUNCATE TABLE", "", $sql);
            $sql=str_ireplace("SHOW TABLES;", "", $sql);
            $sql=str_ireplace("SHOW DATABASES;", "", $sql);
            $sql=str_ireplace("<?php", "", $sql);
            $sql=str_ireplace("?>", "", $sql);
            $sql=str_ireplace("--", "", $sql);
            $sql=str_ireplace("^", "", $sql);
            $sql=str_ireplace("<", "", $sql);
            $sql=str_ireplace("[", "", $sql);
            $sql=str_ireplace("]", "", $sql);
            $sql=str_ireplace("==", "", $sql);
            $sql=str_ireplace(";", "", $sql);
            $sql=str_ireplace("::", "", $sql);
            $sql=trim($sql);
            $sql=stripslashes($sql);
            return $sql;
        }
    }

    function renombrar_fotos($nombre){
		$nombre=str_ireplace(" ", "_", $nombre);
		$nombre=str_ireplace("/", "_", $nombre);
		$nombre=str_ireplace("#", "_", $nombre);
		$nombre=str_ireplace("-", "_", $nombre);
		$nombre=str_ireplace("$", "_", $nombre);
		$nombre=str_ireplace(".", "_", $nombre);
		$nombre=str_ireplace(",", "_", $nombre);
		$nombre=$nombre."_".rand(0,100);
		return $nombre;
	}

?>
