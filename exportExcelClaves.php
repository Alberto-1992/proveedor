<?php
$lab = $_GET['clave'];


	require 'conexion.php';
	
	//Consulta
    $sql = $conexion2->query("SELECT * from listamedicamento where numeroContrato = '$lab'" );

$salida = "";
$salida .= "<table style='color: black; font-size: 14px;' border=1>";
$salida .= "<thead><th>Proveedor</th><th>Descripcion</th><th>Clave HRAEI</th><th>CNIS</th><th>CUCOP</th><th>Precio Unitario</th><th>Unidad de medida</th><th>Minimo consumo</th><th>Maximo consumo</th><th>Minimo precio</th><th>Maximo precio</th><th>Consumo real</th><th>Total</th><th>Num. Contrato</th></thead>";
while($r = $sql->fetch_array()){
    $precio = $r['PRECIOUNITARIO'];
    $cantidad = $r['cantidad'];
    $total = $precio * $cantidad;
    
    $salida .= "<tr>
    <td>".$r['PROVEEDOR']."</td> 
    <td>".$r['DESCRIPCION']."</td>
    <td>".$r['CLAVEHRAEI']."</td>
    <td>".$r['CLAVEDECUADROBASICO']."</td>
    <td>".$r['CUCOP']."</td>
    <td>".$r['PRECIOUNITARIO']."</td>
    <td>".$r['UNIDADDEMEDIDA']."</td>
    <td>".$r['MINIMOCONSUMO']."</td>
    <td>".$r['MAXIMOCONSUMO']."</td>
    <td>".$r['MINIMOPRECIO']."</td>
    <td>".$r['MAXIMOPRECIO']."</td>
    <td>".$r['cantidad']."</td>
    <td>".$total."</td>
    <td>".$r['numeroContrato']."</td>
    </tr>";
    
}

$salida .= "</table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=salidas_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;
?>