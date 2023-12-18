<?php 



include("cabecera.php");
include("conexion.php");

    $objConexion = new Conexion();
    $usuario = $_SESSION['correo'];

    $consulta = "SELECT * FROM usuario WHERE correo = '".$usuario."'";
    $resultado = $objConexion->consultar($consulta);

    

    $correo = $resultado[0]['correo'];



    

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
                    <p><i class="fa fa-envelope mr-2"></i>virtualiateamwork@gmail.com</p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+54 9 11 3119-2288</p>
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
                <a href="inicio.php" class="navbar-brand">
                    <h1 class="m-0 text-primary"><span class="text-dark">VIRTUAL</span>IA</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid page-header" style="background-color: green">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Blog</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="inicio.php">Inicio</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Blog</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Booking Start -->
  
    <!-- Booking End -->


    <!-- Blog Start -->
     
    <div class="container-fluid py-5">
        
        <div class="container py-5">
            
            <div class="row">
                
                <div class="col-lg-8">
                    
                    <div class="row pb-3">
                    
                    <?php 
                            $com = $_GET['id'];
                            $comunicadosC = "SELECT * FROM blog WHERE codigo = $com";

                            $ComunicadoC = $objConexion->consultar($comunicadosC);
                        
                            foreach ($ComunicadoC as $comunicadosC){
                                
                                $imagenRuta = 'imagenes/';
                                $imagen = $imagenRuta . $comunicadosC['imagen'];
                                ?> 
                    
                        <div class="col-md-12 mb-4 pb-2">

                            <form action="" enctype = "multipart/form-data" method="post">
                            <div class="blog-item">
                                
                                <div class="position-relative">
                                    <img class="img-fluid w-65" src="<?php echo $imagen;?>" alt="aa">
                                    <div class="blog-date">
                                        <small class="mb-n3 font-weight-bold"><?php echo $comunicadosC['fecha'] ?></small>
                                    </div>
                                </div>
                                <div class="bg-white p-4">
                                    <div class="d-flex mb-2">
                                        <a class="text-primary text-uppercase text-decoration-none" href=""></a>
                                        <span class="text-primary px-2"></span>
                                        <a class="text-primary text-uppercase text-decoration-none" ><?php echo $comunicadosC['titulo'];?></a>
                                    </div>
                                    <a class="h5 m-0 text-decoration-none"><?php echo $comunicadosC['comunicado'];?></a>

                                    <?php $_GET['id'];?>
                                </div>
                            </div>
                            </form>
                           
                        </div>
                        <?php }?>
                       
                       
                      
                       
                        
                    </div>
                </div>
    

                <?php 

                        $p = $ComunicadoC[0]['id_res'];
                        $res = $objConexion->consultar("SELECT * FROM usuario WHERE dni = $p");
                            
                        $nombre = $res[0]['nombre'];
                        $apellido = $res[0]['apellido'];

                ?>
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <!-- Author Bio -->
                    <div class="d-flex flex-column text-center bg-white mb-5 py-5 px-4">
                        <h3 class="text-primary mb-3"><a href="#"> <?php echo $nombre ." ". $apellido; ?> </a></h3>
                        <p>Equipo Directivo</p>


                        
                    </div>
    
                    <!-- Search Form -->
                    

                    <!-- Category List -->
                   
    
                    <!-- Recent Post -->
                  
    
                    <!-- Tag Cloud -->
                    
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

                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>

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
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


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
    <script src="js/main.js"></script>
</body>

</html>