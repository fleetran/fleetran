<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php 
	require('class/dao-adm.php');
	$d = new DAO2();
	$reg = $d->listarRegiones();
	$com = $d->listarComunas();
	?>  
<!DOCTYPE html>
<html lang="en">
    <head> 
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

		<!-- Website CSS style -->
		<link rel="stylesheet" type="text/css" href="css/registro.css">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

		<title>Fleetran Software</title>
	</head>
	<body>
		<div class="container">
			<div class="row main">
				
				<div class="main-login main-center">
				<a href="index.php"><img style="padding-left:40%;" src="img/logo.png"/></a>
				<br><br>
					<form class="form-horizontal" method="post" action="crear-usuario.php">
						
						<div class="form-group">
						
							<label for="name" class="cols-sm-2 control-label">Empresa</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-suitcase" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="empresa" maxlength="15" id="empresa" required  placeholder="Nombre de la empresa"/>
								</div>
							</div>
						</div>
						<div class="form-group">
						
							<label for="name" class="cols-sm-2 control-label">Rut</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" maxlength="10" oninput="checkRut(this)" name="txt_rut" id="txt_rut" required  placeholder="Rut del administrador"/>
								</div>
							</div>
						</div>
						<div class="form-group">
						
							<label for="name" class="cols-sm-2 control-label">Nombres</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="empresa" maxlength="20" id="empresa" required  placeholder="Nombres del administrador"/>
								</div>
							</div>
						</div>
						<div class="form-group">
						
							<label for="name" class="cols-sm-2 control-label">Apellidos</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="empresa" maxlength="20" id="empresa" required  placeholder="Apellidos del administrador"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Correo electrónico</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" required name="email" id="email"  placeholder="Correo electrónico del administrador"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="mobile" class="cols-sm-2 control-label required">Número celular</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-mobile aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="mobile" id="mobile" required value="+569"  placeholder="Número celular"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="nationality" class="cols-sm-2 control-label">Región</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-globe fa-lg" aria-hidden="true"></i></span>
									<select class="form-control" name="region" id="region" required>
									<option disabled>Seleccione su región:</option>
                                    <?php
									for($i=0; $i<count($reg); $i++){
										$e = $reg[$i];
										echo '<option value="'.$e->getId().'">'.$e->getNom().'</option>';
									}
													?>
													
									</select>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="country" class="cols-sm-2 control-label">Comuna</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i></span>
									<div id="comuna"></div>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<button type="submit" class="btn btn-primary btn-lg btn-block login-button">Continuar</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	</body>
</html>
<script src="js/rut.js"></script>
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
