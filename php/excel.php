<?php

include 'cabecera.php';
include 'conexion.php';

    
    
$objConexion = new Conexion();
    $usuario = $_SESSION['correo'];

$consulta = "SELECT * FROM usuario WHERE correo = '".$usuario."'";
$resultado = $objConexion->consultar($consulta);



$tipo = $resultado[0]['tipo'];
   
require 'C:\xampp\htdocs\Campus\vendor\autoload.php'; // Requerimos el archivo autoload.php de Composer

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

ini_set('display_errors', 1);
error_reporting(E_ALL);

if($tipo === "d"){

$procesado = isset($_SESSION['procesado']) ? $_SESSION['procesado'] : false;

if(isset($_POST['enviar'])){

  $nombreArchivo = $_FILES['datos']['name'];
  $extArchivo = pathinfo( $nombreArchivo, PATHINFO_EXTENSION);

  $extPermitidas = ['xls', 'csv', 'xlsx'];

  if (in_array($extArchivo, $extPermitidas)) {
    // Cargar el archivo Excel
    $archivo_excel =  $_FILES['datos']['tmp_name'];
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($archivo_excel);
    $data = $spreadsheet->getActiveSheet()->toArray();

    $objConexion = new Conexion();

    // Obtener los datos de profesores existentes en la base de datos y almacenarlos en un array asociativo
    $profesExistente = [];
    $resultados = $objConexion->consultar("SELECT id_profesor, id_materia, id_curso FROM profesores");
    foreach ($resultados as $resultado) {
        $profesExistente[$resultado['id_profesor']][$resultado['id_materia']][$resultado['id_curso']] = true;
    }

    foreach ($data as $row) {
        $nombreP = $row['0'];
        $apellido = $row['1'];
        $id_profesor = $row['2'];
        $id_materia = $row['3'];
        $id_curso = $row['4'];

        // Verificar si el registro ya existe en la base de datos
        if (!isset($profesExistente[$id_profesor][$id_materia][$id_curso])) {
            // Si el registro no existe, procede a insertarlo
            $studentQuery = "INSERT INTO profesores (nombreP ,apellido ,id_profesor, id_materia, id_curso) VALUES ('$nombreP','$apellido','$id_profesor', '$id_materia', '$id_curso')";
            $objConexion->ejecutar($studentQuery);

            // Agregar el registro al array de profesores existentes para evitar futuras inserciones duplicadas
            $profesExistente[$id_profesor][$id_materia][$id_curso] = true;
            unset($_FILES['datos']);
        }
    }
    $procesado = true;
    $_SESSION['procesado'] = true;
    
}

}
if($_GET){

  $id = $_GET['borrar'];
  $objConexion = new Conexion();


  $sql = "DELETE FROM `profesores` WHERE `id` =".$id ;
  $objConexion->ejecutar($sql);  


  header("location:excel.php");

}

if(isset($_POST['eliminar'])){

$objConexion = new Conexion();
$eliminartabla= "TRUNCATE profesores";
$objConexion->ejecutar($eliminartabla);

header("location:excel.php");
}


// Tabla Usuarios---------------------------------------------------------------------------------------------------->

if(isset($_POST['enviarU'])){

  $nombreArchivo = $_FILES['datos']['name'];
  $extArchivo = pathinfo( $nombreArchivo, PATHINFO_EXTENSION);

  $extPermitidas = ['xls', 'csv', 'xlsx'];

  if (in_array($extArchivo, $extPermitidas)) {
    // Cargar el archivo Excel
    $archivo_excel =  $_FILES['datos']['tmp_name'];
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($archivo_excel);
    $data = $spreadsheet->getActiveSheet()->toArray();

    $objConexion = new Conexion();

    // Obtener los datos de profesores existentes en la base de datos y almacenarlos en un array asociativo
    $profesExistente = [];
    $resultados = $objConexion->consultar("SELECT dni FROM usuarios");
    foreach ($resultados as $resultado) {
        $profesExistente[$resultado['dni']] = true;
    }
    
    foreach ($data as $row) {
        $correo = $row['0'];
        $contrasena = $row['1'];
        $tipo = $row['2'];
        $nombre = $row['3'];
        $apellido = $row['4'];
        $telefono = $row['5'];
        $dni = $row['6'];
        $id_curso = $row['7'];
    
        // Verificar si el registro ya existe en la base de datos
        if (!isset($profesExistente[$dni])) {
            // Si el registro no existe, procede a insertarlo
            $studentQuery = "INSERT INTO profesores (correo, contrasena, tipo, nombre, apellido, telefono, dni, id_curso) VALUES ('$correo', '$contrasena', '$tipo', '$nombre', '$apellido', '$telefono', '$dni', '$id_curso')";
            $objConexion->ejecutar($studentQuery);
    
            // Agregar el registro al array de profesores existentes para evitar futuras inserciones duplicadas
            $profesExistente[$dni] = true;
            unset($_FILES['datos']);
        } // Falta cerrar la llave del bloque if aquí
    }
    }
    $procesado = true;
    $_SESSION['procesado'] = true;
    
}

if($_GET){

  $id = $_GET['borrarU'];
  $objConexion = new Conexion();


  $sql = "DELETE FROM `usuario` WHERE `id` =".$id ;
  $objConexion->ejecutar($sql);  


  header("location:excel.php");

}

if(isset($_POST['eliminar'])){

$objConexion = new Conexion();
$eliminartabla= "TRUNCATE usuario";
$objConexion->ejecutar($eliminartabla);

header("location:excel.php");
}


// Tabla materias----------------------------------------------------------------------------------------------------->


if(isset($_POST['enviarM'])){

  $nombreArchivo = $_FILES['datos']['name'];
  $extArchivo = pathinfo( $nombreArchivo, PATHINFO_EXTENSION);

  $extPermitidas = ['xls', 'csv', 'xlsx'];

  if (in_array($extArchivo, $extPermitidas)) {
    // Cargar el archivo Excel
    $archivo_excel =  $_FILES['datos']['tmp_name'];
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($archivo_excel);
    $data = $spreadsheet->getActiveSheet()->toArray();

    $objConexion = new Conexion();

    // Obtener los datos de profesores existentes en la base de datos y almacenarlos en un array asociativo
    $profesExistente = [];
    $resultados = $objConexion->consultar("SELECT id_materia FROM materias");
    foreach ($resultados as $resultado) {
        $profesExistente[$resultado['id_materia']] = true;
    }
    
    foreach ($data as $row) {
        $id_materia = $row['0'];
        $materia = $row['1'];
        $descripcion = $row['2'];

    
        // Verificar si el registro ya existe en la base de datos
        if (!isset($profesExistente[$dni])) {
            // Si el registro no existe, procede a insertarlo
            $studentQuery = "INSERT INTO materias (id_materia, materia, descripcion) VALUES ('$id_materia', '$materia', '$descripcion')";
            $objConexion->ejecutar($studentQuery);
    
            // Agregar el registro al array de profesores existentes para evitar futuras inserciones duplicadas
            $profesExistente[$dni] = true;
            unset($_FILES['datos']);
        } // Falta cerrar la llave del bloque if aquí
    }
    }
    $procesado = true;
    $_SESSION['procesado'] = true;
    
}

if($_GET){

  $id = $_GET['borrarU'];
  $objConexion = new Conexion();


  $sql = "DELETE FROM `usuario` WHERE `id` =".$id ;
  $objConexion->ejecutar($sql);  


  header("location:excel.php");

}

if(isset($_POST['eliminar'])){

$objConexion = new Conexion();
$eliminartabla= "TRUNCATE usuario";
$objConexion->ejecutar($eliminartabla);

header("location:excel.php");
}
        
      

  
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>
	
	<title>Tabla responsiva</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="style.css">

</head>

<body>
<form action="excel.php" method ="post" enctype="multipart/form-data"> 
<div class="col-4 ">
<div class="mb-3">
  <label for="" class="form-label">Tabla Profesores</label>
  <input type="file" class="form-control" name="datos" placeholder="" aria-describedby="fileHelpId">
  <br>
  <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
  <button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>
</div>
</div>

	<div id="page-wrap" class="col-7" style="position: relative; width:100%">
    <table class="table table-dark table-hover center">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">DNI</th>
      <th scope="col">ID Materia</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

  <?php
    $objConexion = new Conexion();
    $profes = $objConexion->consultar("SELECT * FROM profesores");

    foreach ($profes as $index => $p) {
      // Omitir el primer registro si ya se ha procesado el archivo
      if ($procesado && $index === 0) {
        continue;
      }
  ?>

    <tr>
      <th><?php echo $p['nombreP']?></th>
      <td><?php echo $p['apellido']?></td>
      <td><?php echo $p['id_profesor']?></td>
      <td><?php echo $p['id_materia']?></td>
      <td><a class="btn btn-danger" href="?borrar=<?php echo $p['id'];?>">Eliminar</a></td>
    </tr>

    <?php } ?>

  </tbody>
  
</table>
	
	</div>

  


 
<form action="excel.php" method ="post" enctype="multipart/form-data"> 
<div class="col-4">
<div class="mb-3">
  <label for="" class="form-label">Tabla Usuarios</label>
  <input type="file" class="form-control" name="datos" placeholder="" aria-describedby="fileHelpId">
  <br>
  <button type="submit" name="enviarU" class="btn btn-primary">Enviar</button>
  <button type="submit" name="eliminarU" class="btn btn-danger">Eliminar</button>
</div>
</div>

	<div id="page-wrap" class="col-7" style="position: relative; width:100%">

    <table class="table table-dark table-hover">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">DNI</th>
      <th scope="col">Curso</th>
      <th scope="col"></th>
    </tr>
  </thead>



  <tbody>

  <?php
        $objConexion = new Conexion();
        $usuario = $objConexion->consultar("SELECT * FROM usuario");

        foreach ($usuario as $index => $u) {
            // Omitir el primer registro si ya se ha procesado el archivo
            if ($procesado && $index === 0) {
                continue;
            }
        ?>

    <tr>
        <td scope="row"><?php echo $u['nombre'] ?></td>
        <td><?php echo $u['apellido'] ?></td>
        <td><?php echo $u['dni'] ?></td>
        <td><?php echo $u['id_curso'] ?></td>
        <td><a class="btn btn-danger" href="?borrar=<?php echo $u['dni']; ?>">Eliminar</a></td>
    </tr>

      <?php } ?>
  
    </tbody>
</table>
</div>


 
<!-- <form action="excel.php" method ="post" enctype="multipart/form-data"> 
<div class="col-4">
<div class="mb-3">
  <label for="" class="form-label">Tabla Materias</label>
  <input type="file" class="form-control" name="datos" placeholder="" aria-describedby="fileHelpId">
  <br>
  <button type="submit" name="enviarM" class="btn btn-primary">Enviar</button>
  <button type="submit" name="eliminarM" class="btn btn-danger">Eliminar</button>
</div>
</div>

	<div id="page-wrap" class="col-7">

	<table>
		<thead>
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>DNI</th>
			<th></th>
			
		</tr>
		</thead>

    <table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
  </tbody>
</table>
    <tbody>
        <?php
        $objConexion = new Conexion();
        $materia = $objConexion->consultar("SELECT * FROM materias");

        foreach ($materia as $index => $m) {
            // Omitir el primer registro si ya se ha procesado el archivo
            if ($procesado && $index === 0) {
                continue;
            }
        ?>
            <tr>
                <td scope="row"><?php echo $m['id_materia'] ?></td>
                <td><?php echo $m['materia'] ?></td>
                <td><?php echo $m['descripcion'] ?></td>
                <td><a class="btn btn-danger" href="?borrar=<?php echo $m['id']; ?>">Eliminar</a></td>
            </tr>
        <?php }} ?>
    </tbody>
</table> -->



