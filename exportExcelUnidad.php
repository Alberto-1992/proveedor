<?php
$lab = base64_decode($_GET['lab']);
$dateFrom = base64_decode($_GET['dateFrom2']);
$dateTo = base64_decode($_GET['dateTo2']);

	require 'conexion.php';
	
	//Consulta
    $sql = $conexion2->query("SELECT * from consumoscisfa where central like '$lab%' and fecha between '$dateFrom' and '$dateTo'" );

$salida = "";
$salida .= "<table style='color: black; font-size: 14px;' border=1>";
$salida .= "<thead><th>Clave HRAEI</th><th>Descripcion</th><th>Cantidad</th><th>Fecha</th><th>Central</th></thead>";
while($r = $sql->fetch_array()){
   
    $salida .= "<tr>
    <td>".$r['clavehraei']."</td> 
    <td>".$r['descripcion']."</td>
    <td>".$r['cantidad']."</td>
    <td>".$r['fecha']."</td>
    <td>".$r['central']."</td>
    </tr>";
    
}

$salida .= "</table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=salidas_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;
?>