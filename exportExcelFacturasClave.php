<?php
$factura = $_GET['factura'];
	require 'conexion.php';
	
	//Consulta
    $sql = $conexion2->query("SELECT * from facturas where clavehraei = '$factura'" );

$salida = "";
$salida .= "<table style='color: black; font-size: 14px;' border=1>";
$salida .= "<thead><th>Numero factura</th><th>Fecha</th><th>Nombre proveedor</th><th>Clave HRAEI</th><th>Descripcion</th><th>Cantidad</th><th>Costo unitario</th><th>Total</th></thead>";
while($r = $sql->fetch_array()){
   
    $salida .= "<tr>
    <td>".$r['num_factura']."</td> 
    <td>".$r['fecha_factura']."</td>
    <td>".$r['nombre_laboratorio']."</td>
    <td>".$r['clavehraei']."</td>
    <td>".$r['descripcion']."</td>
    <td>".$r['cantidad']."</td>
    <td>".$r['costounitario']."</td>
    <td>".$r['total']."</td>
    </tr>";
    
}

$salida .= "</table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=facturas_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;

?>