<?php
$var = $_GET['id'];
	require 'conexion.php';
	
	//Consulta
    $sql = "SELECT * from ordensuministro where fechacontrato = '2022' and vigente = 0" ;

$salida = "";
$salida .= "<table style='color: black; font-size: 14px;' border=1>";
$buscarAlumnos=mysqli_query($conexion2,$sql);


      
       
        $salida.= 
        
        '<th>Numero de orden</th><th>Clave HRAEI</th><th>CNIS</th><th>CUCOP</th><th>Descripcion</th><th>Cantidad</th><th>Precio Unitario</th><th>Importe</th><th>Entrega 1</th><th>fecha de entrega 1</th><th>monto</th><th>Entrega 2</th><th>fecha de entrega 2</th><th>monto 2</th><th>Entrega 3</th><th>fecha de entrega 3</th><th>monto3</th><th>Entrega 4</th><th>fecha de entrega 4</th><th>monto 4</th><th>Entrega 5</th><th>fecha de entrega 5</th><th>monto 5</th><th>Faltante de entrega</th><th>Fecha de orden</th><th>Nombre proveedor</th>';
      
     
      
        
while($rs = $buscarAlumnos->fetch_assoc()){
      
      $entrega1 = $rs['pzasEntrego'];
      $entrega2 = $rs['pzasEntrego2'];
      $entrega3 = $rs['pzasEntrego3'];
      $entrega4 = $rs['pzasEntrego4'];
      $entrega5 = $rs['pzasEntrego5'];
      $cantidad = $rs['cantidad'];
      
      $totalpiezas = $entrega1 + $entrega2 + $entrega3 + $entrega4 + $entrega5;
      
      if($totalpiezas <= $cantidad or $totalpiezas >= $cantidad){
       $sql_r = $conexion2->query("SELECT * from ordensuministro where cantidad <= $totalpiezas");
       $result = mysqli_fetch_assoc($sql_r);
        
       $totalfinal = $cantidad - $totalpiezas;
       
       
    $salida .= "<tr>
    <td>".utf8_decode($rs['claveUnicaOrden'])."</td>
    <td>".utf8_decode($rs['claveHraei'])."</td>
    <td>".utf8_decode($rs['cuadroBasico'])."</td>
    <td>".utf8_decode($rs['cucop'])."</td>
    <td>".utf8_decode($rs['descripcionDelBien'])."</td>
    <td>".utf8_decode($rs['cantidad'])."</td>
    <td>".utf8_decode($rs['precioUnitario'])."</td>
    <td>".utf8_decode($rs['importe'])."</td>
    <td>".utf8_decode($rs['pzasEntrego'])."</td>
    <td>".utf8_decode($rs['fechaParcial'])."</td>
    <td>".utf8_decode($rs['monto'])."</td>
    <td>".utf8_decode($rs['pzasEntrego2'])."</td>
    <td>".utf8_decode($rs['fechaParcial2'])."</td>
    <td>".utf8_decode($rs['monto2'])."</td>
    <td>".utf8_decode($rs['pzasEntrego3'])."</td>
    <td>".utf8_decode($rs['fechaEntrego3'])."</td>
    <td>".utf8_decode($rs['monto3'])."</td>
    <td>".utf8_decode($rs['pzasEntrego4'])."</td>
    <td>".utf8_decode($rs['fechaEntrego4'])."</td>
    <td>".utf8_decode($rs['monto4'])."</td>
    <td>".utf8_decode($rs['pzasEntrego5'])."</td>
    <td>".utf8_decode($rs['fechaEntrego5'])."</td>
    <td>".utf8_decode($rs['monto5'])."</td>
    <td>".utf8_decode($totalfinal)."</td>
    <td>".utf8_decode($rs['fechaorden'])."</td>
    <td>".utf8_decode($rs['nombreproveedor'])."</td>
    </tr>";
      }else{
          
      }  
    }
    
$salida .= "</table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=reporteEntregadoOs_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;
?>