<?php 
$conexion=mysqli_connect('localhost','root','','fleet_adm');
$region=$_POST['region'];

	$sql="select * from communes where region_id='$region'";;

	$result=mysqli_query($conexion,$sql);

	$cadena="<label>SELECT 2 (paises)</label> 
			<select id='lista2' name='lista2'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
	}

	echo  $cadena."</select>";
	

?>