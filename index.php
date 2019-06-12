<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>Fleetran</title>
<link href="css/navbar.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="css/demo.css">
<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="css/estilos.css"/>
<link rel="stylesheet" href="css/sheetslider.min.css"/>
<?php 
			require('class/DAO.php');
			session_start();
			if(isset($_SESSION['USUARIO'])){
				header("location:class/procesar.php");	
			}
			?>

</head>
<body ondragstart="return false">
<div class="luxbar luxbar-static">
    <input type="checkbox" id="luxbar-checkbox" class="luxbar-checkbox">
    <div class="luxbar-menu luxbar-menu-right luxbar-menu-dark">
        <ul class="luxbar-navigation">
            <li class="luxbar-header">
                <a class="luxbar-brand" href="index.php"><img src="img/logomin.png" /> FLEETRAN</a>
                <label class="luxbar-hamburger luxbar-hamburger-doublespin"
                        for="luxbar-checkbox"> <span></span> </label>
            </li>
			<li class="luxbar-item"><a href="como-funciona.php">¿Cómo funciona?</a></li>
			<li class="luxbar-item"><a href="planes.php">Planes</a></li>
			<li class="luxbar-item"><a href="quienes-somos.php">¿Quienes somos?</a></li>
			<li class="luxbar-item"><a href="contacto.php">Contacto</a></li>
			<li class="luxbar-item sv"><a href="login2.php">Acceso Clientes</a></li>
        </ul>
    </div>
</div>

<div class="main box">
<div class="sheetSlider sh-default sh-auto">
   <input id="s1" type="radio" name="slide1" checked=""> 
   <input id="s2" type="radio" name="slide1"> 
   <input id="s3" type="radio" name="slide1"> 
   <div class="sh__content">

      <div class="sh__item">
         <img src="img/slide-img01.jpg" alt="imgText">
         <div class="sh__meta">
            <h4>TRANSPORTES DE CARGA</h4>
            <span>ADMINISTRA TUS VEHÍCULOS DESDE NUESTRO SISTEMA</span>
         </div>
      </div>

      <div class="sh__item">
         <img src="img/slide-img02.jpg" alt="imgText">
         <div class="sh__meta">
            <h4>ACCESO A TU INFORMACIÓN</h4>
            <span>LLEVA EL CONTROL DE TU FLOTA DESDE CUALQUIER LUGAR, <a href="planes.html">MIRA NUESTROS PLANES</a></span>
         </div>
      </div>

      <div class="sh__item">
         <img src="img/slide-img03.jpg" alt="imgText">
         <div class="sh__meta">
            <h4>FINANZAS</h4>
            <span>VISUALIZA EL DINERO GENERADO POR TUS VEHÍCULOS</span>
         </div>
      </div>
  
   </div>
   <div class="sh__btns">
      <label for="s1"></label>
      <label for="s2"></label>
      <label for="s3"></label>
   </div>
   <div class="sh__arrows">
      <label for="s1"></label>
      <label for="s2"></label>
      <label for="s3"></label>
   </div>
<button class="sh-control"></button>  
</div>
<script src="js/sheetslider.min.js"></script>

		<footer class="footer-distributed">

			<div class="footer-left">

				<a href="portal.php"><img src="img/logomin.png" /></a><h3>Fleetran</h3>

				<p class="footer-links">
					<a href="index.php">Inicio</a>					·
					<a href="como-funciona.php">¿Cómo funciona?</a>					·
					<a href="planes.php">Planes</a>					·
					<a href="quienes-somos.php">¿Quienes somos?</a>					·
					<a href="contacto.php">Contacto</a>					·
					<a href="login2.php">Acceder</a>
				</p>

				<p class="footer-company-name">Fleetran &copy; <?php echo date("Y");?></p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>Nelson Pereira #345</span>Rancagua, Chile.</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>+56 9 7652 0000</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:soporte@fleetran.cl">soporte@fleetran.cl</a></p>
			</div>
			</div>
			<div class="footer-right">
				<p class="footer-company-about">
					<span>Nuestra empresa</span>
					El equipo de Fleetran está enfocado en el desarrollo de una solución informática, para administradores de flotas de vehículos. El objetivo es facilitar la gestión, tener un mejor control de los activos y obtener información en cualquier lugar cuando se necesite.
				</p>
				<div class="footer-icons">
					<a href="https://www.facebook.com/FleetranCL"><i class="fa fa-facebook"></i></a>
					<a href="https://www.twitter.com/FleetranCL"><i class="fa fa-twitter"></i></a>
					<a href="https://www.youtube.com/channel/FleetranCL"><i class="fa fa-youtube"></i></a>
					<a href="https://www.instagram.com/FleetranCL"><i class="fa fa-instagram"></i></a>
				</div>
			</div>
		</footer>
</body>
</html>