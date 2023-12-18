<?php
/* mantiene la sesion inciada por mas que cierre el navegador */

include("cabecera.php");
include("conexion.php");



    $objConexion = new Conexion();
    $usuario = $_SESSION['correo'];

    if ($usuario = $_SESSION['correo']){

    $consulta = "SELECT * FROM usuario WHERE correo = '".$usuario."'";
    $resultado = $objConexion->consultar($consulta);

   $tipo = $resultado[0]['tipo'];
    
    if($tipo === "p"){

        if($_POST){

$objConexion = new Conexion();

$correo = $_GET['correo'];
$contrasena = $_GET['contrasena'];



$resultadoCorreo = $objConexion->consultar("SELECT * FROM `usuario` WHERE `correo` = '$correo' AND `contrasena` = '$contrasena'");


if ($resultadoCorreo) {
    // Verificar si el correo y la contraseña tienen la misma ID
    if ($resultadoCorreo[0]['dni'] === $resultadoCorreo[0]['dni']) {
        // Sesión iniciada correctamente
        
        
        // Verifico si se inicio correctamente

        $_SESSION['loggedin'] = true;
        if($_SESSION['loggedin'] = true){
         
            // Pide los datos del usuario ingresado 

                $dni = $resultadoCorreo[0]['dni'];
                $permisos = $objConexion->consultar("SELECT * FROM `usuario` WHERE dni = '$dni'");
                
                $tipo = $permisos[0]['tipo'];
                $nombre = $permisos[0]['nombre'];
                $apellido = $permisos[0]['apellido'];
                $dni = $permisos[0]['dni'];

                
            // Dependiendo el tipo los va a mover a la tabla profesores, directivos o si son usuarios corrientes los deja en la tabla alumnos
            
                if ($tipo == "d"){

                    $t_directivos = $objConexion->consultar("SELECT id_directivo FROM directivos");
                    $id_directivo = $t_profesores['id_directivo'];

                    if ($dni != $id_directivo) {
                        $existeProfesor = $objConexion->consultar("SELECT * FROM directivos WHERE id_directivo = '$dni'");
                        
                        if (!$existeProfesor) {
                            $pasaje = $objConexion->ejecutar("INSERT INTO directivos (nombre, apellido, id_directivo) VALUES ('$nombre', '$apellido', '$dni')");
                        }
                
                        $_SESSION['permiso'] = 1;
                        header("location: inicioD.php");
                        exit;
                        
                    } else {
                        $_SESSION['permiso'] = 1;
                        header("location: inicioD.php");
                        exit;
                    }
                }

                if ($tipo == "p") {

                    $t_profesores = $objConexion->consultar("SELECT id_profesor FROM profesores");
                    $id_profesor = $t_profesores['id_profesor'];

                    if ($dni != $id_profesor) {
                        $existeProfesor = $objConexion->consultar("SELECT * FROM profesores WHERE id_profesor = '$dni'");
                        
                        if (!$existeProfesor) {
                            $pasaje = $objConexion->ejecutar("INSERT INTO profesores (nombre, apellido, id_profesor) VALUES ('$nombre', '$apellido', '$dni')");
                        }
                
                        $_SESSION['permiso'] = 2;
                        header("location: inicioP.php");
                        exit;
                        
                    } else {
                        $_SESSION['permiso'] = 2;
                        header("location: inicioP.php");
                        exit;
                    }
                }
                
                if ($tipo == "a"){
                    $_SESSION['permiso'] = 3;
                    header("location: inicio.php");
                }
        }
        
} else {
    echo "<script> alert('Usuario o contraseña incorrecto'); </script>";
}}
        }




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Virtualia</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+54 11 30545737</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>                        
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="inicioP" class="navbar-brand">
                    <h1 class="m-0 text-primary"><span class="text-dark">VIRTUAL</span>IA</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                        <a href="blogP.php" class="nav-item nav-link">Blog</a>
                        <a href="tareasP.php" class="nav-item nav-link">Tareas</a>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Más</a>
                            <div class="dropdown-menu border-0 rounded-0 m-0">
                                <a href="userP.php" class="dropdown-item">Usuarios</a>
                                <a href="cerrar.php" class="dropdown-item">Cerrar Sesión</a>
                            </div>
                        </div>
                </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid page-header"  style="background-color: green" >
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">VIRTUALIA</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase">Aprende</p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Mejor </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Booking Start -->
    
    <!-- Booking End -->


    <!-- Blog Start -->
    <?php  
    $objConexion = new Conexion();
    $Blog = "SELECT * FROM blog ORDER BY codigo DESC LIMIT 1";
    $blog = $objConexion->consultar($Blog);

    
    $imagenRuta = 'imagenes/';
    $imagen = $imagenRuta . $blog[0]['imagen'];

    $titulo = $blog[0]['titulo'];
    $comunicado = $blog[0]['comunicado'];
    $fecha = $blog[0]['fecha'];
    ?>
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row pb-3">
                        <div class="col-md-8 mb-4 pb-2">
                            <div class="blog-item">
                                <div class="position-relative">
                                    <img class="img-fluid w-100" src="<?php echo $imagen;?>" alt="">
                                    <div class="blog-date">

                                        <small class="text-uppercase"><?php echo $fecha?></small>
                                    </div>
                                </div>
                                <div class="bg-white p-4">
                                    <div class="d-flex mb-2">
                                        <a class="text-primary text-uppercase text-decoration-none" href=""><?php echo $titulo?></a>
                                    </div>
                                    <a class="h5 m-0 text-decoration-none" href=""><?php echo $comunicado;?></a>
                                </div>
                            </div>
                            
                            </div>

                            <?php 
                            $p = $blog[0]['id_res'];
                            $res = $objConexion->consultar("SELECT * FROM usuario WHERE dni = $p");
                                
                            $nombre = $res[0]['nombre'];
                            $apellido = $res[0]['apellido'];
    
                            ?>
                            <div class="col-lg-4 mt-5 mt-lg-0">
                    <!-- Author Bio -->
                    <div class="d-flex flex-column text-center bg-white mb-5 py-5 px-4">
                        <h3 class="text-primary mb-3"><a href="perfil.php?id=<?php 
                        //urlencode($p)
                        echo urlencode($p); ?>"> <?php echo $nombre ." ". $apellido; ?> </a></h3>
                        <p>Equipo Directivo</p>
                        
                    </div>
                        </div>
                    </div>
                        
                  
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

    <div class="container-fluid bg-registration py-5" style="margin: 90px 0;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="mb-4">
                        <h1 class="text-white"><span class="text-primary">VIRTUALIA</span> </h1>
                    </div>
                    <p class="text-white">Enterate de todas la noveades de tu estableciemto educativo ¡En un solo lugar!</p>
                    <ul class="list-inline text-white m-0">
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Cuaderno de comunicados</li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Tareas</li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Blog</li>
                    </ul>
                </div>


                <!-- Inicio de Sesion ---------------------------------------------------------------------------------------------->
                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="card-header bg-primary text-center p-4">
                            <h1 class="text-white m-0">Inicia Sesión</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-white p-5">
                            <form action="Inicio.php" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control p-4" name="correo" placeholder="Correo electronico" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control p-4" name="contrasena" placeholder="Contraseña" required="required" />
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-block py-3" type="submit">Iniciar sesión</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-primary"><span class="text-white">VIRTUAL</span>IA</h1>
                </a>
                <p>Tu lugar para aprender</p>
                <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Seguinos</h6>
                <div class="d-flex justify-content-start">

                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>

                    <a class="btn btn-outline-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
         
           
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Contactanos</h5>
                <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Footer End -->


    <!-- Back to Top -->



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->

</body>

</html>
<?php }}else echo "No tienes los permisos para ingresar aqui";?>