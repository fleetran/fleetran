<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Agregar un conductor</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	<!-- Favicon -->
<link rel="apple-touch-icon" sizes="57x57" href="img/icon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="img/icon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/icon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="img/icon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/icon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="img/icon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="img/icon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="img/icon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="img/icon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="img/icon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="img/icon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="img/icon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="img/icon/favicon-16x16.png">
<link rel="manifest" href="img/icon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="img/icon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
</head>
<body>
<div class="wrapper">
<?php
	require('class/dao.php');
	require('class/dao-adm.php');
	$d2 = new DAO2();
	$reg = $d2->listarRegiones();
	session_start();
	$d = new DAO();
	$tip = $d->listarTipo();
	if(!isset($_SESSION['CREDENCIAL'])){
		header("location:index.php");	
	}else{
		$u = $_SESSION['CREDENCIAL'];
		$color = $u->getCol();
		$veh = $d->vehiculosnoAsignados($u->getID_emp());
	}
?>
<div class="sidebar" data-color="<?php echo $color;?>" data-image="assets/img/sidebar-5.jpg">

<div class="sidebar-wrapper">
<div class="logo">
<a href="dashboard.php" class="simple-text">
Fleetran Software

</a>

</div>
<ul class="nav">
<?php
	$Page = basename($_SERVER['PHP_SELF']);
	$Tittle = "";
	$cons_menu = $d->menu_dinamico();
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
<?php 
$tit = $d->menu_getTitulo(basename($_SERVER['PHP_SELF']));
$get = $tit[0];
echo "<a class='navbar-brand' href='".$Page."'>".strtoupper(utf8_encode($get->getNom()))."</a>";?>
</div>
<div class="collapse navbar-collapse">
<ul class="nav navbar-nav navbar-left">
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-arrow-down" aria-hidden="true"></i>
<b class="caret hidden-lg hidden-md"></b>
<p class="hidden-lg hidden-md">

<b class="caret"></b>
</p>
</a>
<ul class="dropdown-menu">
<?php
	$Page = basename($_SERVER['PHP_SELF']);
	$Tittle = "";
	$cons_menu = $d->menu_conductores();
	for($i=0; $i<count($cons_menu); $i++){
		$get = $cons_menu[$i];
		echo '<li><a href="'.$get->getUrl().'">'.utf8_encode($get->getNom()).'</a></li>';
	}
	
?>

</ul>
</li>
</ul>

<ul class="nav navbar-nav navbar-right">

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<p>
<?php echo $u->getNom().' '.$u->getApe();?>
<b class="caret"></b>
</p>

</a>
<ul class="dropdown-menu">
<li><a href="profile.php">Mi perfil</a></li>
<li><a href="customize.php">Personalizar</a></li>
<li class="divider"></li>
<li><a href="class/salir.php">Cerrar sesión</a></li>
</ul>
</li>

<li class="separator hidden-lg"></li>
</ul>
                </div>
            </div>
        </nav>
<!-- contenido -->

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Datos del Vehículo</h4>
                            </div>
                            <div class="content">
                                <form method="post" action="class/procesar.php">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Patente</label>
                                                <input type="text" class="form-control" maxlength="6" name="patente" id="patente" required />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Marca</label>
                                                <input type="text" name="marca" maxlength="30" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Modelo</label>
                                                <input type="text" name="modelo" required maxlength="30" class="form-control">
                                            </div>
                                        </div>
										<div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tipo de vehículo</label>
                                                <select class="form-control" name="tipo" id="tipo" required>
									<option disabled>Seleccione el tipo de vehiculo:</option>
                                    <?php
									for($i=0; $i<count($tip); $i++){
										$e = $tip[$i];
										echo '<option value="'.$e->getId().'">'.$e->getNom().'</option>';
									}
													?>
													
									</select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Color</label>
                                                <input name="color" type="text" class="form-control" required maxlength="10" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Kilometraje</label>
												<input name="kilometraje" type="number" max="1000000" class="form-control" required maxlength="10" >
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Año</label>
                                                <input name="ano" type="number" class="form-control" required min="<?php date_default_timezone_set('America/Santiago'); echo date("Y",strtotime(date("Y")."- 8 year")); ?>" max="<?php echo date("Y",strtotime(date("Y"))); ?>" value="<?php echo date("Y",strtotime(date("Y"))); ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Región</label>
                                                <select class="form-control" name="region" id="region" required>
									<option>Seleccione su región:</option>
                                    <?php
									for($i=0; $i<count($reg); $i++){
										$e = $reg[$i];
										echo '<option value="'.$e->getId().'">'.$e->getNom().'</option>';
									}
													?>
													
									</select>
                                            </div>
                                        </div>
										<div class="col-md-5">
                                            <div class="form-group">
                                                <label>Comuna</label>
                                                <div id="comuna"></div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="row">
									<div class="col-md-2">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Transmisión</label>
                                                <div class="form-check form-check-radio">
													<label class="form-check-label">
														<input class="form-check-input" type="radio" name="Transmision" id="Manual" value="Manual" checked>
														<span class="form-check-sign"></span>
														Manual
													</label>
												</div>
												<div class="form-check form-check-radio">
													<label class="form-check-label">
														<input class="form-check-input" type="radio" name="Transmision" id="Automatico" value="Automatico">
														<span class="form-check-sign"></span>
														Automático
													</label>
												</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Combustible</label><br>
												
												<div class="form-check form-check-radio">
													<label class="form-check-label">
														<input class="form-check-input" type="radio" name="Combustible" id="Bencina" value="Bencina" checked>
														<span class="form-check-sign"></span>
														Bencina
													</label>
												</div>
												<div class="form-check form-check-radio">
													<label class="form-check-label">
														<input class="form-check-input" type="radio" name="Combustible" id="Petroleo" value="Petroleo">
														<span class="form-check-sign"></span>
														Petróleo
													</label>
												</div>

												<div class="form-check form-check-radio">
													<label class="form-check-label">
														<input class="form-check-input" type="radio" name="Combustible" id="Gas" value="Gas">
														<span class="form-check-sign"></span>
														Gas
													</label>
												</div>
                                            </div>
                                        </div>
                                        
                                    </div>
									
                                    <button type="submit" name="btn_new_car" class="btn btn-info btn-fill pull-right">Registrar</button>
                                    <div class="clearfix"></div>
									
                                </form>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
		
    </div>
</div>


</body>

    <!--   Core JS Files   -->
	
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#region').val(1);
		recargarLista();

		$('#region').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"class/comunas.php",
			data:"region=" + $('#region').val(),
			success:function(r){
				$('#comuna').html(r);
			}
		});
	}
</script>