        <?php 
            include("conexion.php");
            include("cabecera.php");

            $objConexion = new Conexion();
            $usuario = $_SESSION['correo'];
                

            if($_GET['id']){

                $perfilU = $_GET['id'];

                $consulta = "SELECT correo, tipo, nombre, apellido, telefono, imagen, dni FROM usuario WHERE dni = '".$perfilU."'";
                $resultado = $objConexion->consultar($consulta);

                $correo = $resultado[0]['correo'];
                $nombre = $resultado[0]['nombre'];
                $tipo = $resultado[0]['tipo'];
                $apellido = $resultado[0]['apellido'];
                $telefono = $resultado[0]['telefono'];
                $imagen = $resultado[0]['imagen'];
                $dni = $resultado[0]['dni'];

            }else{
            //Pregunta por todos los datos del ususario

            $consulta = "SELECT correo, tipo, nombre, apellido, telefono, imagen, dni FROM usuario WHERE correo = '".$usuario."'";
            $resultado = $objConexion->consultar($consulta);


            $correo = $resultado[0]['correo'];
            $nombre = $resultado[0]['nombre'];
            $tipo = $resultado[0]['tipo'];
            $apellido = $resultado[0]['apellido'];
            $telefono = $resultado[0]['telefono'];
            $imagen = $resultado[0]['imagen'];
            $dni = $resultado[0]['dni'];
            

            //Pide la imagen del formulario y la envia a la base de datos
           
            if ($_POST) {

                    $imagen = $_FILES['imgPerfil']['name'];
                    echo $imagen;
                    $fecha = new DateTime();
                    
                    $imagen_temporal = uniqid()."_".$_FILES['imgPerfil']['tmp_name'];
                    move_uploaded_file($_FILES['imgPerfil']['tmp_name'], "imagenes/".$imagen);
                
                    //Actualiza la imagen de la base (se tiene que actualizar por que ya tiene un dato cargado como NULL)

                    $objConexion = new Conexion();

                    $sql = "UPDATE `usuario` SET imagen = '$imagen' WHERE dni = '$dni'";
                    $objConexion->ejecutar($sql); 

                    header("location:perfil.php");

                    
            }

            
        }
   

    // Obtener los valores de las columnas del resultado
            
        ?>



        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Apock web design</title>
            <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
            <link rel="stylesheet" href="css/perfil.css">

        </head>
        <body>
        
            <section class="seccion-perfil-usuario">
                
            <form class="perfil-usuario-header" action="perfil.php" method="POST" enctype="multipart/form-data">

            <div class="perfil-usuario-portada">

                <!-- Imagen de la portada ------------------------------------------------------------------------------------------->

                <img src="<?php ?>" alt="">

                <div class="perfil-usuario-avatar">


                    <!-- Imagen de perfil ------------------------------------------------------------------------------------------->

                    <img src="<?php echo $imagen ?>" alt="img-FotoPerfil">
                    
                    <!-- Boton de la imagen del perfil ------------------------------------------------------------------------------>

                    <button type="button" class="boton-avatar">

                        <input type="file" name="imgPerfil"> 

                        <i class="far fa-image"></i>
                    </button>

                </div>

                <!-- Boton de imagen de portada ------------------------------------------------------------------------------------>

                <input class="boton-portada" type="file" name="imgPortada">
                <input class="btn btn-success" type="submit" value="Cambiar fondo" >
            </div>
        </form>
                <div class="perfil-usuario-body">
                    <div class="perfil-usuario-bio">
                    <?php if (isset($nombre)): ?>
                        <h3 class="titulo" name="nombre"><?php echo $nombre. ' '. $apellido; ?></h3>
                        <?php else: ?>
                        <h3 class="titulo" name="nombre">Nombre no disponible</h3>
                        <?php endif; ?>
                        <p class="texto">gogogo</p>
                    </div>
                    <div class="perfil-usuario-footer">
                        <ul class="lista-datos">
                            <li><i class="icono fas fa-map-signs"></i> Direccion de usuario:</li>
                            <li><i class="icono fas fa-phone-alt"></i> <?php echo $telefono ?></li>
                            <a href="mailto:<?php  echo urlencode($correo)?>"><i class="icono fas fa-briefcase"></i> <?php echo "Contacto: ".$correo ?>. <?php $correo?></a>
                            <li><i class="icono fas fa-building"></i> Cargo</li>
                        </ul>
                        <ul class="lista-datos">
                            <li><i class="icono fas fa-map-marker-alt"></i> Ubicacion.</li>
                            <li><i class="icono fas fa-calendar-alt"></i> Fecha nacimiento.</li>
                            <li><i class="icono fas fa-user-check"></i> Registro.</li>
                    </div>
                </div>
            </section>
        <style>
        .mensaje a {
            color: inherit;
            margin-right: .5rem;
            display: inline-block;
        }
        .mensaje a:hover {
            color: #309B76;
            transform: scale(1.4)
        }
        </style>
        </div>
        </body>

        </html>