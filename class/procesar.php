<?php
	require('dao.php');
	require('dao-adm.php');
	session_start();
	$d = new DAO();
	$d2 = new DAO2();
	
	if(isset($_REQUEST['btn_new_car'])){
		$rut = $_REQUEST['txt_rut'];
		$nombre = $_REQUEST['txt_nom'];
		$apellido = $_REQUEST['txt_ape'];
		$fecha = $_REQUEST['fec_nac'];
		$region = $_REQUEST['cbo_region'];
		$comuna = $_REQUEST['cbo_comuna'];
		$split = explode(".", $_REQUEST['carnet-imagen']);
		$carnet = $split[0].'.'.$split[1].'.'.$split[2].'l.'.$split[3];
		$split = explode(".", $_REQUEST['licencia-imagen']);
		$licencia = $split[0].'.'.$split[1].'.'.$split[2].'l.'.$split[3];
		
		
	}
	
	if(isset($_REQUEST['btn_ing'])){
	$EMAIL = $_REQUEST['txt_email'];
	$PWD = md5($_REQUEST['txt_pwd']);
	$ip = $_SERVER['REMOTE_ADDR'];
	$fecha = date('Y-m-d');
	$hora = date('H:i:s');
	$meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
	$ciudad = $meta['geoplugin_city'];
	$U = $d->comprobarUsuario($EMAIL,$PWD);
	if($U!=null){
		$licence = $d->comprobarLicencia($U->getEmp());
		if($licence==1){ //INGRESO CORRECTO CON LICENCIA
			$_SESSION["CREDENCIAL"] = $U;											
			$d2->logIngreso($EMAIL,$U->getEmp(),$ip,$ciudad,$hora,$fecha,1);
			header('Location:../dashboard.php');	
		}
		if($licence==0){//INGRESO CORRECTO SIN LICENCIA
			$d2->logIngreso($EMAIL,$U->getEmp(),$ip,$ciudad,$hora,$fecha,6);
			header('Location:../index.php?res=nolicence');
		}
	}else{
		//PREGUNTAR SI EL USUARIO ES ADMIN
		$user = $d2->comprobarUsuarioAdm($EMAIL,$PWD);
		if($user!=null){
			$_SESSION["ADMIN"] = $user;//INGRESO CORRECTO COMO ADMIN
			header('Location:../admin/admin.php');	
		}else{
			$d2->logIngreso($EMAIL,'',$ip,$ciudad,$hora,$fecha,2);
			header('Location:../index.php?res=wrongpass');//DATOS INCORRECTOS
		}
	}

}
?>