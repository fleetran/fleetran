<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>Contacto</title>
<link href="css/navbar.css" type="text/css" rel="stylesheet" />
<link href="css/style.css" type="text/css" rel="stylesheet" />

<?php 
			require('class/DAO.php');
			session_start();
			if(isset($_SESSION['USUARIO'])){
				header("location:portal.php");	
			}
			?>
<link type="text/css" rel="stylesheet" href="css/estilos.css"/>
<link type="text/css" rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css"/>
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
			<li class="luxbar-item sv"><a href="login.php">Acceso Clientes</a></li>
        </ul>
    </div>
</div>

<div id="signup-form">
        <div id="signup-inner">
       	<div class="clearfix" id="header">
        		<img id="signup-icon" src="./img/message.png" alt="" />
                <h1>Contáctanos</h1>            
            </div>
            <form id="send" action="enviar-contacto.php">
                <p>

                <label for="name">Nombres y apellidos:</label>
                <input type="text" name="name" required="required"/>
                </p>
                
                <label for="email">Nombre de la empresa:</label>
                <input id="email" type="text" name="empresa"/>
                <p>
                <label for="profile">Comentanos: *</label>
                <textarea name="profile" id="profile" cols="30" rows="5"></textarea>

                </p>
                
                <p>

                <button id="submit" type="submit">Enviar comentario</button>
                </p>
                
            </form>
        </div>
    </div>
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