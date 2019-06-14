<?php
/*
		ERROR 0 : Email o clave son incorrectos
		ERROR 10 : Las contraseñas ingresadas no coinciden
		ERROR 11 : Las contraseñas deben contener un mínimo de 6 carácteres		
		ERROR 12 : El email ingresado ya está asociado a una cuenta.
		ERROR 13 : El rut ingresado ya está asociado a una cuenta.
*/
	session_start();
	require('DAO.php');
	$d = new DAO();
	if(isset($_REQUEST['btn_ing'])){
			$email = $_REQUEST['txt_email'];
			$pass = md5($_REQUEST['txt_pass']);
			$u = $d->comprobarUsuario($email,$pass);
			if($u!=null){
				$_SESSION["USUARIO"] = $u;											
				header("location:../portal2.php");	
				$licencia = $d->comprobarLicencia($u->getRut());
				if($licencia==1){
					$_SESSION["LICENCIA"] = 1;
					
				}else{
					header("location:../compra-plan2.php");	
				}		
			}else{
				header('Location:../login2.php?res=0');		
		}		
	}
	
	if(isset($_REQUEST['btn_reg1'])){
		$_SESSION['actividad'] = $_REQUEST['txt_actividad'];
		$_SESSION['flota'] = $_REQUEST['txt_flota'];
		header('Location:../registro2.php');
	}
	
	if(isset($_REQUEST['btn_reg2'])){
		$actividad = $_SESSION['actividad'];
		$flota = $_SESSION['flota'];
		$rut = $_REQUEST['txt_rut'];
		$ema = $_REQUEST['txt_email'];	
		$nom = $_REQUEST['txt_nombre'];
		$pass1 = md5($_REQUEST['txt_pass1']);	
		$pass2 = md5($_REQUEST['txt_pass2']);
		if($d->existeEmail($ema)==1){
			header('Location:../login2.php?res=12');					
		}else{
			$u = new Usuario($rut,$nom,$ema,$actividad,$flota,$pass1);
			if($d->registrarUsuario($u)==1){
				header('Location:../login2.php?res=15');					
			}else{
				header('Location:../login2.php?res=14');					
			}	
		}
		
	
		
	}
	
	/*if(isset($_REQUEST['btn_compra'])){
		$res = $d->registrarCompra($u)==1){
		if($error==0){
			$u = new Usuario($ema,$nom,$ape,$rut,$emp,md5($pass1));
			if($d->registrarUsuario($u)==1){
				header('Location:../login.php?res=15');					
			}else{
				header('Location:../login.php?res=14');					
			}	
		}
	}
	
	*/
?>