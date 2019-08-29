<?php 
	$conexion=mysqli_connect('localhost','root','','fleet_adm');
	$region=$_POST['region'];
	$sql="select * from communes where region_id='$region' order by name asc;";
	$result=mysqli_query($conexion,$sql);

	$cadena="<select id='lista2' class='form-control' name='lista2'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
	}

	echo  $cadena."</select>";
	

?>