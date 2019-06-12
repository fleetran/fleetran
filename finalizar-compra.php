<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Selecciona tu plan</title>
<link href="css/navbar.css" type="text/css" rel="stylesheet" />
<link href="css/eplanes.css" type="text/css" rel="stylesheet" />
<link href="css/navbar.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="css/demo.css">
<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
<link type="text/css" rel="stylesheet" href="css/estilos.css"/>
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
            <li class="luxbar-item"><a href="portal.php">
			<?php
			require('class/Usuario.php');
			session_start();
			if(isset($_SESSION['USUARIO']) and !isset($_SESSION['LICENCIA'])){
				$u = $_SESSION['USUARIO'];
				$nombre = $u->getEmpresa();
				$nombre = strtoupper($nombre);
				echo $nombre;
			}else{
				header("location:login.php");	
			}
			echo "</a></li><li class='luxbar-item sv'><a href='salir.php'>SALIR</a></li>";
			?>
        </ul>
    </div>
</div>	
  <div class="col" style="margin-left:33%">
    <ul class="price-box best">
      <li class="header">¡Pago realizado exitosamente!</li>
      <li class="emph"><strong>¡GRACIAS POR TU COMPRA!</strong></li>
	  <li><strong>N° DE ORDEN:</strong> 0084756</li>
	  <li><strong>PRODUCTO:</strong> Plan PRO</li>
	  <li><strong>FECHA DE COMPRA: </strong>02-06-2019 22:30</li>
	  <li><a href="class/procesar.php?3" name="btn_compra" class="button">CONTINUAR</a></li>
    </ul>
  </div>
  
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <br><br><br>
  <footer class="footer-distributed">

			<div class="footer-left">

				<a href="portal.php"><img src="img/logomin.png" /></a><h3>Fleetran</h3>

				<p class="footer-links">
					<a href="#">Inicio</a>					·
					<a href="#">¿Cómo funciona?</a>					·
					<a href="#">Planes</a>					·
					<a href="#">¿Quienes somos?</a>					·
					<a href="#">Contacto</a>
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
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-youtube"></i></a>
				</div>
			</div>
		</footer>
</body>
</html>
