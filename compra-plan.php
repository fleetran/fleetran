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
	
	<div class="col">
    <ul class="price-box best">
      <li class="header">PLAN BASIC</li>
      <li class="emph"><strong> $10.000</strong> / Mensual</li>
	  <li></li><li></li><li></li>
	  <li><a mp-mode="dftl" href="https://www.mercadopago.com/mlc/checkout/pay?pref_id=127532225-6e047a77-b508-42a4-9c6a-8a3d76caff0f" name="MP-payButton" class='grey-tr-m-rn-clon'>Continuar</a>
<script type="text/javascript">
(function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
</script></li>
	  
    </ul>
  </div>
  <div class="col">
    <ul class="price-box best">
      <li class="header">PLAN MEDIUM</li>
      <li class="emph"><strong> $70.000</strong> / Mensual</li>
	  <li></li><li></li><li></li>
	  <li><a mp-mode="dftl" href="https://www.mercadopago.com/mlc/checkout/pay?pref_id=127532225-a9e83b5d-8dc4-4dbc-aa5f-00a28507fec3" name="MP-payButton" class='grey-tr-m-rn-clon'>Continuar</a>
<script type="text/javascript">
(function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
</script></li>
      
    </ul>
  </div>
  <div class="col">
    <ul class="price-box best">
      <li class="header">PLAN PRO</li>
      <li class="emph"><strong> $100.000</strong> / Mensual</li>
	  <li></li><li></li><li></li>
	  <li><a mp-mode="dftl" href="https://www.mercadopago.com/mlc/checkout/pay?pref_id=127532225-56e5f5c0-4c47-46b3-917b-0737061b2ebe" name="MP-payButton" class='grey-tr-m-rn-clon'>Continuar</a>
<script type="text/javascript">
(function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
</script></li>
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
