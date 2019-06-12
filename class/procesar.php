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
			$pass = $_REQUEST['txt_pass'];
			$u = $d->comprobarUsuario($email,md5($pass));
			$licencia = $d->comprobarLicencia($email);
			if($u!=null){
				$_SESSION["USUARIO"] = $u;											
				if($licencia==1){
					$_SESSION["LICENCIA"] = 1;
					header("location:../portal.php");	
				}else{
					header("location:../compra-plan.php");	
				}		
			}else{
				header('Location:../login.php?res=0');		
		}		
	}
	
	if(isset($_REQUEST['btn_reg'])){
		$ema = $_POST['txt_email'];	
		$nom = $_POST['txt_nombre'];	
		$ape = $_POST['txt_apellido'];
		$rut = $_POST['txt_rut'];	
		$emp = $_POST['txt_empresa'];
		$pass1 = $_POST['txt_pass1'];	
		$pass2 = $_POST['txt_pass2'];
		$error = 0;
		
		if($pass1!=$pass2){
			$error++;
			header('Location:../login.php?res=10');					
		}
		if(strlen($pass1)<5 or strlen($pass2)<5){
			$error++;
			header('Location:../login.php?res=11');					
		}
		if($d->existeEmail($ema)==1){
			$error++;
			header('Location:../login.php?res=12');					
		}
		if($d->existeRut($rut)==1){
			$error++;
			header('Location:../login.php?res=13');					
		}
		
		if($error==0){
			$u = new Usuario($ema,$nom,$ape,$rut,$emp,md5($pass1));
			if($d->registrarUsuario($u)==1){
				header('Location:../login.php?res=15');					
			}else{
				header('Location:../login.php?res=14');					
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