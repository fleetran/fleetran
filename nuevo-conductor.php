<!doctype html>
<html lang="es ">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />
<title>Dashboard</title>
<!-- Bootstrap core CSS     -->

<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
<!-- Animation library for notifications   -->
<link href="assets/css/animate.min.css" rel="stylesheet"/>
<!--  Light Bootstrap Table core CSS    -->
<link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
<!--     Fonts and icons     -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<link href='css/step.css' rel='stylesheet' type='text/css'>
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
	session_start();
	$d = new DAO();
	if(!isset($_SESSION['CREDENCIAL'])){
		header("location:index.php");	
	}else{
		$u = $_SESSION['CREDENCIAL'];
		$color = $u->getCol();
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
<!-- CONTENIDO -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<div class="container">
	<div class="row">
		<section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Paso 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Paso 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-home"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Paso 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form role="form" action="class/procesar.php" method="post">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        
						
                                    <form >
                                        <div class="row">
                                            <div class="col-md-12 pr-1">
                                                <div class="form-group">
                                                    <label>RUT</label>
                                                    <input name="txt_rut" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Nombres</label>
                                                    <input name="txt_nom" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Apellidos</label>
                                                    <input name="txt_ape" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Fecha de nacimiento</label>
                                                    <input name="fec_nac" type="date" class="form-control" placeholder="Home Address" max="<?php date_default_timezone_set('America/Santiago'); echo date("Y-m-d",strtotime(date("Y")."- 18 year")); ?>" min="<?php echo date("Y-m-d",strtotime(date("Y")."- 70 year")); ?>">
                                                </div>
                                            </div>
                                        </div>
                                                                           
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step">Siguiente</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Región</label>
                                                    <select name="cbo_region" class="form-control">
													<option value="1">Seleccione region</option>
													</select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select name="cbo_comuna" class="form-control">
													<option value="2">Seleccione comuna</option>
													</select>
                                                </div>
                                            </div>
                                        </div>
										<div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Direccion</label>
                                                    <input name="txt_dir" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Numero</label>
                                                    <input name="txt_num" type="text" value="+569" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Anterior</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Siguiente</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <h3>Importar fotografías</h3>
                        <br>
						<p>Carnet de Identidad</p>
						 <div class="dropzone" style="width:10%;"></div><br>
						<p>Licencia de conducir</p>
						<div class="dropzone2" style="width:10%;"></div><br>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Anterior</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Siguiente</button></li>
                        </ul>
						
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <h3>Registro Completo</h3>
                        <p>You have successfully completed every steps.</p>
						
                        <ul class="list-inline pull-right">
                            <li><input type="submit" name="btn_new_car" class="btn btn-primary btn-info-full next-step" value="enviar"></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
   </div>
</div>
<!-- -->
</div>
</div>
</body>
<!--   Core JS Files   -->
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="./js/imgur.js"></script>
<script type="text/javascript" src="./js/upload.js"></script>
<script type="text/javascript" src="./js/imgur2.js"></script>
<script type="text/javascript" src="./js/upload2.js"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
<script src="js/step.js"></script>
</html>