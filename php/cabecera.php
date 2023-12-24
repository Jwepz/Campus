
<?php 
   session_name("LOGIN");
   session_start();
   if (!isset($_SESSION['correo']) && $_SESSION['correo'] === true) {
      
	exit;
   }
   else if (isset($_SESSION['correo']) && $_SESSION['correo'] === false) {
      session_destroy();
      header("location:inicio.php");
      exit;
   }


   header("Cache-Control: no-cache, must-revalidate"); // HTTP 1.1
   header("Pragma: no-cache"); // HTTP 1.0

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<title></title>
</head>
<body>


</body>
</html>