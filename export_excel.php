<?php

	require 'conexion.php';
	
	//Consulta
    $sql = $conexion2->query("SELECT seguimiento.cantidad, seguimiento.movimiento, seguimiento.clavehraei, controlmedicamentoinventario.descripcion, controlmedicamentoinventario.cucop, controlmedicamentoinventario.cuadrobasico, controlmedicamentoinventario.clavehraei from seguimiento inner join controlmedicamentoinventario on seguimiento.clavehraei = controlmedicamentoinventario.clavehraei");

$salida = "";
$salida .= "<table style='color: black; font-size: 14px;' border=1>";
$salida .= "<thead> <th>Descripcion</th> <th>Clave HRAEI</th><th>CNIS</th><th>CUCOP</th><th>Piezas</th><th>Movimiento</th></thead>";
while($r = $sql->fetch_array()){
  
    $salida .= "<tr>
    <td>".$r['descripcion']."</td> 
    <td>".$r['clavehraei']."</td>
    <td>".$r['cuadrobasico']."</td>
    <td>".$r['cucop']."</td>
    <td>".$r['cantidad']."</td>
    <td>".$r['movimiento']."</td></tr>";
    
}

$salida .= "</table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=usuarios_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;
?>