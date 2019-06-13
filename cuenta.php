<!doctype html>
<html>
<?php
//prueba
			require('class/DAO.php');
			session_start();
			if(isset($_SESSION['USUARIO']) and isset($_SESSION['LICENCIA'])){
				$u = $_SESSION['USUARIO'];
				$dao = new DAO();
				$transacciones = $dao->listarTransacciones($u->getEmail());
				
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
<title>Mi cuenta</title>
<link href="css/navbar.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="./css/style2.css">
<link type="text/css" rel="stylesheet" href="css/estilos.css"/>
<link rel="stylesheet" href="css/sheetslider.min.css"/>



<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">

<link rel="stylesheet" type="text/css" href="css/main.css">
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
			if(isset($_SESSION['USUARIO'])){
				$u = $_SESSION['USUARIO'];
				$nombre = $u->getEmpresa();
				$nombre = strtoupper($nombre);
				echo $nombre;
			}
			?></a>
                <ul>
                    <li class="luxbar-item"><a href="cuenta.php">Mi cuenta</a></li>
                </ul>
            </li>
			<li class="luxbar-item sv"><a href="salir.php">SALIR</a></li>
        </ul>
    </div>
</div>
<br><br><br>
<div id="signup-form">
        <div id="signup-inner">
       	<div class="clearfix" id="header">
        		<img id="signup-icon" src="./images/signup.png" alt="" />
                <h1   style="padding-left:10%;padding-right:10%;">Mi cuenta</h1>
            </div>			
            <form id="send" action=""style="text-align:center">
			<h3>Información personal:</h3><br>
                <table>
				<tr>
				<td>
				<p style="padding-left:30%">
                <label for="name">Nombre del administrador:</label>
                <input type="text" name="name" value="<?php
			if(isset($_SESSION['USUARIO'])){
				$u = $_SESSION['USUARIO'];
				$nombre = $u->getNombre()." ".$u->getApellido();
				$nombre = strtoupper($nombre);
				echo $nombre;
			}
			?>" />
                </p>
				<p style="padding-left:30%">
                <label for="rut">Rut:</label>
                <input id="rut" type="text" name="rut" value="<?php
			if(isset($_SESSION['USUARIO'])){
				$u = $_SESSION['USUARIO'];
				$nombre = $u->getRut();
				$nombre = strtoupper($nombre);
				echo $nombre;
			}
			?>" />
                </p>
				</td>
				<td>
				<p style="padding-left:20%">
                <label for="email">Nombre de la empresa:</label>
                <input id="email" type="text" name="empresa" value="<?php
			if(isset($_SESSION['USUARIO'])){
				$u = $_SESSION['USUARIO'];
				$nombre = $u->getEmpresa();
				$nombre = strtoupper($nombre);
				echo $nombre;
			}
			?>"/>
			<p style="padding-left:20%">
                <label for="email">Nombre de la empresa:</label>
                <input id="email" type="text" name="empresa" value="<?php
			if(isset($_SESSION['USUARIO'])){
				$u = $_SESSION['USUARIO'];
				$nombre = $u->getEmpresa();
				$nombre = strtoupper($nombre);
				echo $nombre;
			}
			?>"/>
				
				
				</td>
				</tr>
				</table>
				
				
                
                
                <p>
                <h3>Historial de transacciones:</h3>
                <br>
					<table>
						<thead>
							<tr class="table100-head">
								<th  style='text-align:center;' class="column1">ID</th>
								<th style='text-align:center;' class="column2">Descripción</th>
								<th style='text-align:center;' class="column3">Fecha de compra</th>
								<th style='text-align:center;' class="column4">Vigencia (días)</th>
								<th style='text-align:center;' class="column5">Monto</th>
							</tr>
						</thead>
						<tbody>
						<?php
			for($i=0; $i<count($transacciones); $i++){
			$t = $transacciones[$i];
			echo "<tr>";
			echo "<td style='text-align:center;'>" . $t->getId(). "</td>";
			echo "<td style='text-align:center;'>" . $t->getDescripcion() . "</td>";
			echo "<td style='text-align:center;'>" . $t->getFecha() . "</td>";
			echo "<td style='text-align:center;'>" . $t->getVigencia(). "</td>";
			echo "<td style='text-align:center;'>" . $t->getMonto(). "</td>";
			echo "</td>";																		
			echo "</tr>";
		}
						?>		
						</tbody>
					</table>
				
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
                </p>
                
                <p>

                <button id="submit" type="submit">Actualizar cambios</button>
                </p>
                
            </form>
        </div>
    </div>


<table>
</body>
</html>