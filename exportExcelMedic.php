<?php
$clave = base64_decode($_GET['clave']);

	require 'conexion.php';
	
	//Consulta
    $sql = $conexion2->query("SELECT *, proveedores.rfc_proveedor from listamedicamento inner join proveedores on listamedicamento.numeroContrato = '$clave' and proveedores.numero_pedido = '$clave'" );

$salida = "";
$salida .= "<table style='color: black; font-size: 14px;' border=1>";
$salida .= "<thead><th>Proveedor</th><th>RFC Proveedor</th><th>Numero contrato</th><th>Clave HRAEI</th><th>Descripcion</th><th>Cuadro basico</th><th>CUCOP</th><th>UDM</th><th>Precio unitario</th><th>Consumo min</th><th>Consumo max</th><th>Cantidad consumida</th><th>Minimo precio</th><th>Maximo precio</th></thead>";
while($r = $sql->fetch_array()){
   
    $salida .= "<tr>
    <td>".$r['PROVEEDOR']."</td>
    <td>".$r['rfc_proveedor']."</td>
    <td>".$r['numeroContrato']."</td>
    <td>".$r['CLAVEHRAEI']."</td>
    <td>".$r['DESCRIPCION']."</td>
    <td>".$r['CLAVEDECUADROBASICO']."</td>
    <td>".$r['CUCOP']."</td>
    <td>".$r['UNIDADDEMEDIDA']."</td>
    <td>".$r['PRECIOUNITARIO']."</td>
    <td>".$r['MINIMOCONSUMO']."</td>
    <td>".$r['MAXIMOCONSUMO']."</td>
    <td>".$r['cantidad']."</td>
    <td>".$r['MINIMOPRECIO']."</td>
    <td>".$r['MAXIMOPRECIO']."</td>
    
    </tr>";
    
}

$salida .= "</table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=salidas_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;
?>