<?php
	//ELIMINA LA SESIÓN, ENVIA UN MENSAJE DE CERRAR SESION Y REDIRIGE AL INDEX
	require('class/logs.php');
	require('class/Usuario.php');
		function getRealIP() {

        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
           
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
       
        return $_SERVER['REMOTE_ADDR'];
}
	$log = new Logs();
	session_start();
	$u= $_SESSION["USUARIO"];
	$ip = $_SERVER['REMOTE_ADDR'];
	$fecha = date('Y-m-d');
	$hora = date('H:i:s');
	$log->salidaLog($u->getEmail(),$ip,$hora,$fecha);
	session_destroy();
 //	echo "<script language='javascript'>alert('Cerrando sesión');</script>";
?>
<html>
<head>
<title>Saliendo...</title>
</head>
<body>
<script language="javascript">location.href = "index.php";</script>
</body>
</html>