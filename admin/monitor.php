﻿
<!doctype html>
<html lang="es ">
<head>
<meta charset="utf-8">
<meta http-equiv="refresh" content="5">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />
<title>Dashboard</title>
<!-- Bootstrap core CSS     -->
<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
<!-- Animation library for notifications   -->
<link href="../assets/css/animate.min.css" rel="stylesheet"/>
<!--  Light Bootstrap Table core CSS    -->
<link href="../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
<!--     Fonts and icons     -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
<!-- Favicon -->
<link rel="apple-touch-icon" sizes="57x57" href="../img/icon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../img/icon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../img/icon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../img/icon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../img/icon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../img/icon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../img/icon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../img/icon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../img/icon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="../img/icon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../img/icon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../img/icon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../img/icon/favicon-16x16.png">
<link rel="manifest" href="../img/icon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../img/icon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

</head>
<body>

<div class="wrapper">
<div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-5.jpg">

<div class="sidebar-wrapper">
<div class="logo">
<a href="dashboard.php" class="simple-text">
Fleetran Software
</a>
</div>
<ul class="nav">
<?php
	
	session_start();
	if(!isset($_SESSION['ADMIN'])){
		header("location:../index.php");	
	}
	$Page = basename($_SERVER['PHP_SELF']);
	$Tittle = "";
	
	require('../class/dao.php');
	$d = new DAO();
	$cons_menu = $d->menu_dinamico_adm();
	$estado = "";
	for($i=0; $i<count($cons_menu); $i++){
		$get = $cons_menu[$i];
		
		if($Page==$get->getUrl()){$estado="class='active'";$Tittle=$get->getNom();}else{$estado="";}
		echo "<li ".$estado."><a href='".$get->getUrl()."'><i class='".$get->getIco()."'></i><p>".$get->getNom()."</p></a>";

	}
	
?>
</ul>
</div>
</div>
<div class="main-panel">
<nav class="navbar navbar-default navbar-fixed">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<?php echo "<a class='navbar-brand' href='".$Page."'>".strtoupper($Tittle)."</a>";?>
</div>
<div class="collapse navbar-collapse">
<ul class="nav navbar-nav navbar-left">
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-globe"></i>
<b class="caret hidden-lg hidden-md"></b>
<p class="hidden-lg hidden-md">
5 Notifications
<b class="caret"></b>
</p>
</a>
<ul class="dropdown-menu">
<li><a href="#">Notification 1</a></li>
<li><a href="#">Notification 2</a></li>
<li><a href="#">Notification 3</a></li>
<li><a href="#">Notification 4</a></li>
<li><a href="#">Another notification</a></li>
</ul>
</li>
</ul>

<ul class="nav navbar-nav navbar-right">
<li>
<a href="">
<p>Account</p>
</a>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<p>
Dropdown
<b class="caret"></b>
</p>

</a>
<ul class="dropdown-menu">
<li><a href="#">Action</a></li>
<li><a href="#">Another action</a></li>
<li><a href="#">Something</a></li>
<li><a href="#">Another action</a></li>
<li><a href="#">Something</a></li>
<li class="divider"></li>
<li><a href="#">Separated link</a></li>
</ul>
</li>
<li>
<a href="../class/salir.php">
<p>SALIR</p>
</a>
</li>
<li class="separator hidden-lg"></li>
</ul>
</div>
</div>
</nav>
<!-- CONTENIDO -->

<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            
                                <div class="card-header ">
                                    <h4 class="card-title">Últimos ingresos al sistema</h4>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Email</th>
											<th>Empresa</th>
                                            <th>IP</th>
											<th>Ciudad</th>
											<th>Hora</th>
                                            <th>Fecha</th>
											<th>Estado</th>
                                        </thead>
                                        <tbody>
                                            	<?php
												
	require('../class/dao-adm.php');
	$l = new DAO2();
	$ing = $l->listarIngresos();

													for($i=0; $i<count($ing); $i++){
														$e = $ing[$i];
														echo '<tr>';
														echo '</tr>';
														echo '<td>'.$e->getId().'</td>';
														echo '<td>'.$e->getEmpresa().'</td>';
														echo '<td>'.$e->getEmail().'</td>';
														echo '<td>'.$e->getIp().'</td>';
														echo '<td>'.$e->getCiudad().'</td>';
														echo '<td>'.$e->getHora().'</td>';
														echo '<td>'.$e->getFecha().'</td>';
														echo '<td>'.$e->getEstado().'</td>';
													}
													?>
											
											
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card card-plain table-plain-bg">
                                <div class="card-header ">
                                    <h4 class="card-title">Usuarios en línea: 2</h4>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover">
                                        <thead>
											<th>Email</th>
                                            <th>Ip</th>
                                            <th>Ciudad</th>
                                            <th>Hora ingreso</th>
                                        </thead>
                                        <tbody>
                                            <?php
													for($i=0; $i<count($ing); $i++){
														$e = $ing[$i];
														echo '<tr>';
														echo '</tr>';
														echo '<td>'.$e->getId().'</td>';
														echo '<td>'.$e->getEmail().'</td>';
														echo '<td>'.$e->getIp().'</td>';
														echo '<td>'.$e->getEstado().'</td>';
														
													}
													?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- -->
</div>
</div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

</html>