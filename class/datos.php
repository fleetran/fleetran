<?php 
$conexion=mysqli_connect('localhost','root','','fleet_adm');
$continente=$_POST['continente'];

	$sql="select * from communes where region_id='$continente'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<select id='lista2' name='lista2'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[2].'>'.utf8_encode($ver[1]).'</option>';	
	}
	echo  $cadena."</select>";
	

?>