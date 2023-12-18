<?php

    include("cabecera.php");
    include("conexion.php");

  


if ($usuario = $_SESSION['correo']){
    
    
    $objConexion = new Conexion();

    $consulta = "SELECT * FROM usuario WHERE correo = '".$usuario."'";
    $resultado = $objConexion->consultar($consulta);

    
    $curso = $resultado[0]['id_curso'];
    $correo = $resultado[0]['correo'];
    $nombre = $resultado[0]['nombre'];
    $tipo = $resultado[0]['tipo'];
    $apellido = $resultado[0]['apellido'];
    $telefono = $resultado[0]['telefono'];
    $imagen = $resultado[0]['imagen'];
    $dni = $resultado[0]['dni'];
    $modalidad = $resultado[0]['modalidad'];   
   
    

}
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
                <div class="navbar-nav ml-auto py-0">
                        <a href="crearComunicados.php" class="nav-item nav-link">Comunicados</a>
                        <a href="tareasD.php" class="nav-item nav-link">Tareas</a>
                        <a href="blogD.php" class="nav-item nav-link">Blog</a>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Mas</a>
                            <div class="dropdown-menu border-0 rounded-0 m-0">
                                <a href="cerrar.php" class="dropdown-item">Cerrar Sesion</a>
                                <a href="Excel.php" class="dropdown-item">Excel</a>
                                <a href="userD.php" class="dropdown-item">Usuarios</a>
                            </div>
                        </div>
                        <!-- <a href="contacto.php" class="nav-item nav-link">Contacto</a> -->
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid page-header" style="background-color: green">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Tareas</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="inicio.php">Inicio</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Tareas</p>
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
                         $contador = 0;
                         if (!isset($_GET['pag'])) {
                          $pag = 1;
                      } else {
                          $pag = $_GET['pag'];
                      }   
                         $startIndex = ($pag - 1) * 4;
                          $endIndex = $startIndex + 3;

                        $trabajos = "SELECT * FROM trabajos ";
                           $Trabajos = $objConexion->consultar($trabajos);
       
                           foreach ($Trabajos as $trabajos){ 

                            if ($contador < $startIndex) {
                                $contador++;
                                continue;
                            }
                                $imagenRuta = 'imagenes/';
                                $imagen = $imagenRuta . $trabajos['archivo'];
                          
       
                           
                           ?>
                           <div class="col-md-6 mb-4 pb-2">
       
                           <form action="tareasD.php" enctype = "multipart/form-data" method="post">
                           <div class="blog-item">
                               
                               <div class="position-relative">
                                   <img class="img-fluid w-65" src="<?php echo $imagen;?>" alt="">
                                   <div class="blog-date">
                                       <small class="mb-n3 font-weight-bold"><?php echo $trabajos['fecha'] ?></small>
                                   </div>
                               </div>
                               <div class="bg-white p-4">
                                   <div class="d-flex mb-2">
                                       <a class="text-primary text-uppercase text-decoration-none" href=""></a>
                                       <span class="text-primary px-2"></span>
                                       <a class="text-primary text-uppercase text-decoration-none" href="mostrarTarea.php?id=<?php echo urlencode($trabajos['id']);?>"><?php echo $trabajos['proyecto'];?></a>
                                   </div>
                                   <a class="h5 m-0 text-decoration-none" href="mostrarTarea.php?id=<?php echo urlencode ($trabajos['id']);?>"><?php echo $trabajos['descripcion'];?></a>
                                   <a class="btn btn-danger" href="?borrar=<?php echo $trabajos['id'];?>">Eliminar</a>
                               </div>
                           </div>
                           </form>
       
                           </div>
                               <?php  $contador++;
                                if ($contador > $endIndex) {
                                    break; // Stop the loop after 4 items have been displayed
                                }
                    } 
                    $sqlTotalComunicados = "SELECT COUNT(*) AS total FROM trabajos";
                    $resultTotalComunicados = $objConexion->consultar($sqlTotalComunicados);
                    $filaTotalComunicados = $resultTotalComunicados[0];
                    $totalRegistros = $filaTotalComunicados['total'];
                    $totalPaginas = ceil($totalRegistros / 4);?>
                       
                      
                       
                       <div class="col-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination pagination-lg justify-content-center bg-white mb-0" style="padding: 30px;">
                                  <li class="page-item ">
                                    <a class="page-link" href="tareas.php?pag=<?php echo($pag -1)?>" aria-label="Previous">
                                      <span aria-hidden="true">&laquo;</span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                  </li>
                                  <?php
                                  if ($pag > 1) {
                                        echo "<li class='page-item' ><a class='page-link' href='tareas.php?pag=" . ($pag - 1) . "'>" . ($pag - 1) . "</a></li>";
                                    }  
                                    
                                    

                                    echo "<li class='page-item active'><a class='page-link' href='tareas.php?pag=" . ($pag). "'>".$pag."</a></li>";
                                    if ($pag < $totalPaginas) {
                                    echo "<li class='page-item '><a class='page-link' href='tareas.php?pag=" . ($pag + 1). "'>".($pag +1)."</a></li>";
                                    }
                                    if ($pag +1 < $totalPaginas) {
                                        echo "<li class='page-item'><a class='page-link' href='tareas.php?pag=" . ($totalPaginas) . "'>" . ($totalPaginas) . "</a></li>";
                                    }
                                    ?>
                                  <li class="page-item" >
                                    <a class="page-link" href="tareas.php?pag=<?php echo($pag +1)?>" aria-label="Next">
                                      <span aria-hidden="true">&raquo;</span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                  </li>
                                </ul>
                              </nav>
                        </div>
                    </div>
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

<?php }
    if($_GET){
    
        $id = $_GET['borrar'];
        $objConexion = new Conexion();
    
        $imagen = $objConexion->consultar("SELECT archivo FROM `trabajos` WHERE id=".$id);
    
        unlink("imagenes/".$imagen[0]['archivo'] );
        
        $sql = "DELETE FROM `trabajos` WHERE `id` =".$id ;
        $objConexion->ejecutar($sql);  
        /*Refresca la pag*/
        header("location: tareasD.php");
     
    }?>