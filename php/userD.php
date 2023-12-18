

<?php
include("conexion.php");
include("cabecera.php");

session_start();


/* mantiene la sesion inciada por mas que cierre el navegador */
$objConexion = new Conexion();
$usuario = $_SESSION['correo'];

    $consulta = "SELECT * FROM usuario WHERE correo = '".$usuario."'";
    $resultado = $objConexion->consultar($consulta);

    $tipo = $resultado[0]['tipo'];

    if($tipo === "d"){


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
    <link href="css/tabla.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                    <p><i class="fa fa-envelope mr-2"></i>virtualiateamwork@gmail.com</p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+54 9 11 3119-2288</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
            
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
                <a href="inicio.php" class="navbar-brand">
                    <h1 class="m-0 text-primary"><span class="text-dark">VIRTUAL</span>IA</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                        <a href="crearComunicados.php" class="nav-item nav-link">Comunicados</a>
                        <a href="tareasD.php" class="nav-item nav-link">Tareas</a>
                        <a href="blogD.php" class="nav-item nav-link">Blog</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Mas</a>
                            <div class="dropdown-menu border-0 rounded-0 m-0">
                                <a href="cerrar.php" class="dropdown-item">Cerrar Sesión</a>
                                <a href="Excel.php" class="dropdown-item">Excel</a>
                                <a href="UserD.php" class="dropdown-item">Usuarios</a>
                                
                                
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
                <h3 class="display-4 text-white text-uppercase">Usuarios</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase">Inicio</p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Usuarios </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Booking Start -->

    <?php 
    $objConexion = new Conexion();
    $cursoA = $objConexion->consultar("SELECT DISTINCT id_curso FROM usuario WHERE tipo = 'a' ORDER BY id_curso ASC");
            ?>
    <br>
    <div class="col-12">
<main class="st_viewport">

<?php


 foreach ($cursoA as $curso) {
    
    $c = $curso['id_curso'];
    
    $c1 = $c % 10;
    $c2 = round($c / 10);
    ?>
 
  <div class="st_wrap_table" data-table_id="0">
    <header class="st_table_header">
      <h2><?php echo $c2. "° ". $c1 . "°"?></h2>
      <div class="st_row">
      <div class="st_column _rank">dni</div>
        <div class="st_column _name">Nombre</div>
        <div class="st_column _surname">Apellido</div>
        <div class="st_column _year">Year</div>
        <div class="st_column _section">Section</div>
      </div>
    </header>
    <?php 

    $objConexion = new Conexion();
    $userA = $objConexion->consultar("SELECT * FROM usuario WHERE id_curso = $c AND tipo = 'a'");

    foreach ($userA as $user) {?>

    <div class="st_table">
      <div class="st_row">
        <div class="st_column _rank"><?php echo $user['dni'] ?></div>
     
        <div class="st_column _name"><?php echo $user['nombre'] ?></div>
        <div class="st_column _surname"> <?php echo $user['apellido'] ?></div>
        <div class="st_column _year"><?php echo $user['id_curso']?></div>
        <div class="st_column _section"></div>
      </div>

      <?php }}?>


    <?php 
    $objConexion = new Conexion();
    $userP = $objConexion->consultar("SELECT * FROM usuario WHERE tipo = 'p'");
            ?>

  <div class="st_wrap_table" data-table_id="1">
    <header class="st_table_header">
      <h2>Profesores</h2>
      <div class="st_row">
      <div class="st_column _rank">dni</div>
        <div class="st_column _name">Name</div>
        <div class="st_column _surname">Surname</div>
        <div class="st_column _year">Year</div>
        <div class="st_column _section">Section</div>
      </div>
    </header>
    <?php foreach ($userP as $user) {?>
    <div class="st_table">
      <div class="st_row">
      <div class="st_column _rank"><?php echo $user['dni'] ?></div>
        <div class="st_column _name"><?php echo $user['nombre'] ?></div>
        <div class="st_column _surname"> <?php echo $user['apellido'] ?></div>
        <div class="st_column _year"><?php echo $user['id_curso']?></div>
        <div class="st_column _section"></div>
      </div>

    
        
         <?php
    }
            $objConexion = new Conexion();
            $userD = $objConexion->consultar("SELECT * FROM usuario WHERE tipo = 'd'");
            ?>
      
  <div class="st_wrap_table" data-table_id="3">
    <header class="st_table_header">
      <h2>Directivos</h2>
      <div class="st_row">
        <div class="st_column _rank">Rank</div>
        <div class="st_column _name">Name</div>
        <div class="st_column _surname">Surname</div>
        <div class="st_column _year">Year</div>
        <div class="st_column _section">Section</div>
      </div>
    </header>

    <?php foreach ($userD as $user) {?>
    <div class="st_table">
      <div class="st_row">
      <div class="st_column _rank"><?php echo $user['dni'] ?></div>
        <div class="st_column _name"><?php echo $user['nombre'] ?></div>
        <div class="st_column _surname"> <?php echo $user['apellido'] ?></div>
        <div class="st_column _year"><?php echo $user['id_curso']?></div>
        <div class="st_column _section"></div>
      </div>

        <?php } ?>
    

    </header>
    
</main>
</div>
    <!-- Booking End -->


    <!-- Blog Start -->
  
 
                            
                    </div>
                        
                  
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

  
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
                    <a class="btn btn-outline-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
         
           
            <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Contactanos</h5>
                <p><i class="fa fa-phone-alt mr-2"></i>+54 9 11 3119-2288</p>
                <p><i class="fa fa-envelope mr-2"></i>virtualiateamwork@gmail.com</p>
                    
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

<?php }else echo "No tienes permisos para ingresar";?>