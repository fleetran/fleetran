<!doctype html>
<html>
<?php
			require('class/Usuario.php');
			session_start();
			if(isset($_SESSION['USUARIO']) and isset($_SESSION['LICENCIA'])){
				$u = $_SESSION['USUARIO'];
			}else{
				if(isset($_SESSION['USUARIO'])){
				header("location:compra-plan.php");	
			}else{
				header("location:login.php");	
			}
			}
			?>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>index</title>
<link href="css/navbar.css" type="text/css" rel="stylesheet" />

<link type="text/css" rel="stylesheet" href="css/estilos.css"/>
<link rel="stylesheet" href="css/sheetslider.min.css"/>
</head>
<body ondragstart="return false">
<div class="luxbar luxbar-static">
    <input type="checkbox" id="luxbar-checkbox" class="luxbar-checkbox">
    <div class="luxbar-menu luxbar-menu-right luxbar-menu-dark">
        <ul class="luxbar-navigation">
            <li class="luxbar-header">
                <a class="luxbar-brand" href="portal.php"><img src="img/logomin.png" /> FLEETRAN</a>
                <label class="luxbar-hamburger luxbar-hamburger-doublespin"
                        for="luxbar-checkbox"> <span></span> </label>
            </li>
			<li class="luxbar-item dropdown"><a href="#"><?php			
				$nombre = $u->getEmpresa();
				$nombre = strtoupper($nombre);
				echo $nombre;
			?></a>
                <ul>
                    <li class="luxbar-item"><a href="cuenta.php">Mi cuenta</a></li>
                </ul>
            </li>
			<li class="luxbar-item sv"><a href="salir.php">SALIR</a></li>
        </ul>
    </div>
</div>
</body>
</html>