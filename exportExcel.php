<?php
$dateFrom = $_GET['dateFrom'];
$dateTo = $_GET['dateTo'];
	require 'conexion.php';
	
	//Consulta
   $sql = $conexion2->query("SELECT covid.clavehraei, covid.descripcion, covid.cantidad, covid.fecha, listamedicamento.CLAVEDECUADROBASICO from covid JOIN listamedicamento on covid.clavehraei = listamedicamento.CLAVEHRAEI where covid.fecha between '$dateFrom' and '$dateTo'") ;
  

$salida = "";
$salida .= "<table style='color: black; font-size: 14px;' border=1>";
     
     
        $salida.= 
        
        '<th>Clave HRAEI</th><th>Descripcion</th><th>Cantidad</th><th>Fecha</th><th>CNIS</th>';
        
 while($r= $sql->fetch_assoc())
 {

    $salida .= "<tr>
    <td>".$r['CLAVEDECUADROBASICO']."</td>
    <td>".$r['clavehraei']."</td>
    <td>".$r['descripcion']."</td>
    <td>".$r['cantidad']."</td>
    <td>".$r['fecha']."</td>
    
   
    
  
    </tr>";
        
 }
     
$salida .= "</table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=salidascisfa_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;
?>