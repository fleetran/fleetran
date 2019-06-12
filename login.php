<!doctype html>
<?php
//pruebaa
session_start();
if(isset($_SESSION['USUARIO'])){
	header("location:portal.php");	
}
?>
<html>
<head>
<meta charset="utf-8">
<title>INGRESO DE USUARIOS!</title>
<link href="css/elogin.css" type="text/css" rel="stylesheet" />
<script src="js/jquery-3.4.1.js" type="text/javascript"></script>
<script src="js/login.js" type="text/javascript"></script>
<script src="js/rut.js"></script>
</head>
<body ondragstart="return false">
<div class="login-page">
  <div class="form">
      <form class="register-form" method="post" action="class/procesar.php">
      <center><div class="TLOGO"><a href="index.php"><img src="img/logo.png"></a></div></center><br>
      <input type="email" name="txt_email" maxlength="50" placeholder="EMAIL"/>
      <input type="text" name="txt_nombre" maxlength="30" placeholder="NOMBRE"/>
      <input type="text" name="txt_apellido" maxlength="30" placeholder="APELLIDO"/>       
	  <input type="text" placeholder="RUT" name="txt_rut" id="txt_rut" required oninput="checkRut(this)" maxlength="10"  required="required"/>
      <input type="text" name="txt_empresa" maxlength="30" placeholder="NOMBRE DE LA EMPRESA"/><br>
      <input type="password" name="txt_pass1" maxlength="30" placeholder="CONTRASEÑA"/>
      <input type="password" name="txt_pass2" maxlength="30" placeholder="REPITA SU CONTRASEÑA"/>     
      <button class="c1" name="btn_reg">REGISTRAR</button>
      <p class="message">Estas registrado? <a href="#">Ingresar</a></p>
    </form>
    <form class="login-form">
      <center><div class="TLOGO"><a href="index.php"><img src="img/logo.png"></a></div></center><br>
      <input type="email" name="txt_email" required placeholder="EMAIL"/>
      <input type="password" name="txt_pass" required placeholder="PASSWORD"/>
      <button name="btn_ing" formaction="class/procesar.php">INGRESAR</button><br><br>
	  <?php 
	  	  if(isset($_REQUEST['res'])){
	$respuesta = $_REQUEST['res'];
	if($respuesta==0){
			echo " <p style='font-size:13px;color:red' class='message'>El email o la clave son erróneos, intenta nuevamente.";
	}	
	if($respuesta==3){
			echo "<p style='font-size:13px;color:red' class='message'>No puedes ingresar a este sitio.";
	}
	if($respuesta==10){
			echo "<p style='font-size:13px;color:red' class='message'>Las contraseñas ingresadas no coinciden.";
	}	
	if($respuesta==11){
			echo "<p style='font-size:13px;color:red' class='message'>Las contraseñas deben tener un mínimo de 6 caracteres.";
	}
	if($respuesta==12){
			echo "<p style='font-size:13px;color:red' class='message'>El email ingresado ya está asociado a una cuenta.";
	}
	if($respuesta==13){
			echo "<p style='font-size:13px;color:red' class='message'>El rut ingresado ya está asociado a una cuenta.";
	}
	if($respuesta==14){
			echo "<p style='font-size:13px;color:red' class='message'>Problemas con el registro.";
	}
	if($respuesta==15){
			echo "<p style='font-size:13px;color:green' class='message'>Registro Exitoso.";
	}
}
	  ?>
	  </p>
      <p class="message">No estas registrado? <a href="#">Crea una cuenta</a></p>
    </form>
  </div>
</div>
</body>
</html>
