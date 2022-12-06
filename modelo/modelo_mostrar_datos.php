<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="jquery-2.1.1.min.js"></script>

</head>
<body>
	

<?php

 $ID_usuario = $_POST['ID_usuario'];

require '../conexion.php';

$sql_u = $conexion2->query("SELECT * FROM datosproveedor WHERE id_datoProveedor ='$ID_usuario'");

$row_u = mysqli_fetch_array($sql_u);
$nombre = $row_u['id_datoProveedor'];
$datos = $row_u['datoPersonalProveedor'];
$domicilio = $row_u['domicilioPersonal'];
$telefono = $row_u['telefono'];
$email = $row_u['correoElectronico'];
$procedimiento = $row_u['numeroDeProcedimiento'];

?>
<strong><h3> Datos del proveedor </h3></strong>
<table class="table table-condensed">

	<tr>
		<td> Numero de proveedor : </td>
		<td> <?php echo $nombre; ?> </td>
	</tr>

	<tr>
		<td> Datos del proveedor : </td>
		<td> <?php echo $datos; ?></td>
	</tr>

	<tr>
		<td> Domicilio : </td>
		<td> <?php echo $domicilio; ?></td>
	</tr>
	<tr>
		<td> Telefono : </td>
		<td> <?php echo $telefono; ?></td>
	</tr><tr>
		<td> Correo electronico : </td>
		<td> <?php echo $email; ?></td>
	</tr><tr>
		<td> N° de procedimiento : </td>
		<td> <?php echo $procedimiento; ?></td>
	</tr>
	
</table>

<a href="redirect-insert-modelo?var=<?php echo $ID_usuario; ?>" class="btn btn-danger">Continuar</a>


<?php


?>

</body>
</html>