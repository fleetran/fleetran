<?php
	//ELIMINA LA SESIÓN, ENVIA UN MENSAJE DE CERRAR SESION Y REDIRIGE AL INDEX
	session_start();
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