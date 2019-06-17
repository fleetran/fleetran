<?php
	session_start();
	require('DAO.php');
	$d = new DAO();
	if(isset($_REQUEST['btn_ing'])){
			$email = $_REQUEST['txt_email'];
			$pass = md5($_REQUEST['txt_pass']);
			$u = $d->comprobarUsuario($email,$pass);
			if($u!=null){
				$_SESSION["USUARIO"] = $u;											
				$licencia = $d->comprobarLicencia($u->getRut());
				$p = $d->detallePlan($u->getPlan());
				$_SESSION["planusuario"] = $p;
				if($licencia==1){
					$_SESSION["LICENCIA"] = 1;
					header("location:../portal2.php");
				}else{
					header("location:../compra-plan2.php");	
				}		
			}else{
				header('Location:../login2.php?res=0');		
		}		
	}
	
	if(isset($_REQUEST['btn_reg1'])){
		$act = $_REQUEST['txt_actividad'];
		$flota = $_REQUEST['txt_flota'];
		
		if(($act=='1')&&($flota=='1')){
			$plan = 1;} if(($act=='1')&&($flota=='2')){ $plan = 2;} if(($act=='1')&&($flota=='3')){ $plan = 3; } if(($act=='2')&&($flota=='1')){ $plan = 4; } if(($act=='2')&&($flota=='2')){ $plan = 5; } if(($act=='2')&&($flota=='3')){ $plan = 6; } if(($act=='3')&&($flota=='1')){ $plan = 7; } if(($act=='3')&&($flota=='2')){ $plan = 8; } if(($act=='3')&&($flota=='3')){$plan = 9; }if(($act=='4')&&($flota=='1')){$plan = 10;}if(($act=='4')&&($flota=='2')){$plan = 11;}if(($act=='4')&&($flota=='3')){$plan = 12;}if(($act=='5')&&($flota=='1')){ $plan = 13; } if(($act=='5')&&($flota=='2')){ $plan = 14; } if(($act=='5')&&($flota=='3')){ $plan = 15; } if(($act=='6')&&($flota=='1')){ $plan = 16; } if(($act=='6')&&($flota=='2')){ $plan = 17; } if(($act=='6')&&($flota=='3')){ $plan = 18; } if(($act=='7')&&($flota=='1')){ $plan = 19; } if(($act=='7')&&($flota=='2')){ $plan = 20; } if(($act=='7')&&($flota=='3')){ $plan = 21; }
		$_SESSION['plan'] = $plan;
		header('Location:../registro2.php');
	}
	
	if(isset($_REQUEST['btn_reg2'])){
		$plan = $_SESSION['plan'];
		$rut = $_REQUEST['txt_rut'];
		$ema = $_REQUEST['txt_email'];	
		$nom = $_REQUEST['txt_nombre'];
		$pass1 = md5($_REQUEST['txt_pass1']);	
		$pass2 = md5($_REQUEST['txt_pass2']);
		if($d->existeEmail($ema)==1){
			header('Location:../login2.php?res=12');					
		}else{
			$u = new Usuario($rut,$nom,$ema,$plan,$pass1);
			if($d->registrarUsuario($u)==1){
				header('Location:../login2.php?res=15');					
			}else{
				header('Location:../login2.php?res=14');					
			}	
		}
	}
		
	if(isset($_REQUEST['btn_new_conductor'])){
		$rut = $_REQUEST['txt_rut'];
		$nom1 = $_REQUEST['txt_nom1'];	
		$nom2 = $_REQUEST['txt_nom2'];
		$ape1 = $_REQUEST['txt_ape1'];	
		$ape2 = $_REQUEST['txt_ape2'];
		$dir = $_REQUEST['txt_dir'];	
		$num = $_REQUEST['txt_num'];
		if($d->existeConductor($rut)==1){
			header('Location:../portal/registrar-conductor.php?res=0');					
		}else{
			$c = new Conductor($rut,$nom1,$nom2,$ape1,$ape2,$dir,$num);
			if($d->registrarConductor($c)==1){
				header('Location:../portal/registrar-conductor.php?res=1');					
			}else{
				header('Location:../portal/registrar-conductor.php?res=22');					
			}	
		}
	}
		
	
	
	
?>