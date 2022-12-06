<?php
//$var = $_GET['id'];
	require 'conexion.php';
	
	//Consulta
    $sql = "SELECT * from ordensuministro where fechacontrato = '2022' and pzasEntrego != 0 and vigente = 0" ;

$salida = "";
$salida .= "<table style='color: black; font-size: 14px;' border=1>";
$buscarAlumnos=mysqli_query($conexion2,$sql);


      
       
        $salida.= 
        
        '<th>Numero de orden</th><th>Clave HRAEI</th><th>CNIS</th><th>CUCOP</th><th>Descripcion</th><th>Cantidad</th><th>Precio Unitario</th><th>Importe</th><th>Fecha 1</th><th>Pzas 1</th><th>Fecha 2</th><th>Pzas 2</th><th>Fecha 3</th><th>Pzas 3</th><th>Fecha 4</th><th>Pzas 4</th><th>Fecha 5</th><th>Pzas 5</th><th>Fecha de orden</th><th>Nombre proveedor</th><th>Numero de contrato</th>';
      
     
      
        
while($rs = $buscarAlumnos->fetch_assoc()){
      
      $entrega1 = $rs['pzasEntrego'];
      $entrega2 = $rs['pzasEntrego2'];
      $entrega3 = $rs['pzasEntrego3'];
      $entrega4 = $rs['pzasEntrego4'];
      $entrega5 = $rs['pzasEntrego5'];
      $cantidad = $rs['cantidad'];
      $monto1 = $rs['monto']; 
      $monto2 = $rs['monto2'];
      $monto3 = $rs['monto3'];
      $monto4 = $rs['monto4'];
      $monto5 = $rs['monto5'];
      
      $totalMonto = $monto1 + $monto2 + $monto3 + $monto4 + $monto5;
     /* 
      if($totalpiezas < $cantidad){
       $sql_r = $conexion2->query("SELECT * from ordensuministro where cantidad < $totalpiezas");
       $result = mysqli_fetch_assoc($sql_r);
        
       $totalfinal = $cantidad - $totalpiezas;
      */ 
       
    $salida .= "<tr>
    <td>".utf8_decode($rs['claveUnicaOrden'])."</td>
    <td>".utf8_decode($rs['claveHraei'])."</td>
    <td>".utf8_decode($rs['cuadroBasico'])."</td>
    <td>".utf8_decode($rs['cucop'])."</td>
    <td>".utf8_decode($rs['descripcionDelBien'])."</td>
    <td>".utf8_decode($rs['cantidad'])."</td>
    <td>".utf8_decode($rs['precioUnitario'])."</td>
    <td>".utf8_decode($rs['importe'])."</td>
    <td>".utf8_decode($rs['fechaParcial'])."</td>
    <td>".utf8_decode($rs['pzasEntrego'])."</td>
    <td>".utf8_decode($rs['fechaParcial2'])."</td>
    <td>".utf8_decode($rs['pzasEntrego2'])."</td>
    <td>".utf8_decode($rs['fechaEntrego3'])."</td>
    <td>".utf8_decode($rs['pzasEntrego3'])."</td>
    <td>".utf8_decode($rs['fechaEntrego4'])."</td>
    <td>".utf8_decode($rs['pzasEntrego4'])."</td>
    <td>".utf8_decode($rs['fechaEntrego5'])."</td>
    <td>".utf8_decode($rs['pzasEntrego5'])."</td>
    <td>".utf8_decode($rs['fechaorden'])."</td>
    <td>".utf8_decode($rs['nombreproveedor'])."</td>
    <td>".utf8_decode($rs['numerodecontrato'])."</td>
    </tr>";
    /*  }else{
          
      }  
      */
    }
    
$salida .= "</table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=reporteEntregadoOs_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;
?>