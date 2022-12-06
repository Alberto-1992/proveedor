<?php
$dateFrom = base64_decode($_GET['dateFrom']);
$dateTo = base64_decode($_GET['dateTo']);
	require 'conexion.php';
	
	//Consulta
	 
    $sql=$conexion2->query("SELECT *
      from covid where fecha BETWEEN '$dateFrom' and '$dateTo' ");

$salida = "";
$salida .= "<table style='color: black; font-size: 14px;' border=1>";

   if(!empty($sql) AND mysqli_num_rows($sql)>0)
    {
      
       
        $salida.= 
        
        '<th>Clave HRAEI</th><th>Descripcion</th><th>Cantidad</th><th>Fecha</th><th>Nombre</th>';
while($r = $sql->fetch_assoc()){
   
       
    $salida .= "<tr>
    <td>".$r['clavehraei']."</td>
    <td>".$r['descripcion']."</td>
    <td>".$r['cantidad']."</td>
    <td>".$r['fecha']."</td>
    <td>".$r['destino']."</td>
    </tr>";
        
    }
    
}else{
    
}

$salida .= "</table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=covid_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;
?>