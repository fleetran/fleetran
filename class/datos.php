<?php 
$conexion=mysqli_connect('localhost','root','','fleet_adm');
$continente=$_POST['continente'];

	$sql="select * from communes where region_id='$continente' order by name asc;";

	$result=mysqli_query($conexion,$sql);

	$cadena="<select id='lista2' class='form-control' name='lista2'><option selected>Seleccione comuna:</option>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
	}

	echo  $cadena."</select>";
	

?>