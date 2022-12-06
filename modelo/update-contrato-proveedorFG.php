<?php 
  if (isset ($_POST['editar'])){
    error_reporting(0);
  require 'conexion.php';
  $id_proveedor = base64_decode($_POST['id_proveedor']);
  $nombre_proveedor = base64_decode($_POST['nombre_proveedor']);
  $nombre_proveedor2 = base64_encode($nombre_proveedor);
  $id_proveedor2 = base64_encode($id_proveedor);
  $numeroContrato = base64_encode($_POST['numeroContrato']);
  $rfc= $_POST['rfc'];
  $direccion_proveedor = $_POST['direccion_internet'];
  $suf_presupuestaria = $_POST['suficiencia_presupuestaria'];
  $requisicion = $_POST['requisicion'];
  $partida_presupuestaria = $_POST['partida_presupuestaria'];
  $fecha_firma = $_POST['fecha_firma'];
  $fecha_inicio= $_POST['vigencia_pedido_incio'];
  $fecha_termino = $_POST['vigencia_pedido_termino'];
  $submin = $_POST['sub_min'];
  $submax = $_POST['sub_max'];
  $ivamin = $_POST['iva_min'];
  $ivamax = $_POST['iva_max'];
  $totalmin = $_POST['total_min'];
  $totalmax = $_POST['total_max'];
  $numeroContrato2 = $_POST['numeroContrato'];
  $tipofarmacia = $_POST['tipofarmacia'];

  
  $querY = "UPDATE proveedores set rfc_proveedor= '$rfc', 
  direccion_internet= '$direccion_proveedor', 
  numero_pedido = '$numeroContrato2',
  suficiencia_presupuestaria= '$suf_presupuestaria', 
  requisicion= '$requisicion',
  partida_presupuestaria= '$partida_presupuestaria',
  fecha_firma= '$fecha_firma',
  vigencia_pedido_inicio= '$fecha_inicio',
  vigencia_pedido_final= '$fecha_termino',
  total_maximo= '$totalmax',
  total_minimo= '$totalmin',
  iva_maximo= '$ivamax',
  iva_minimo= '$ivamin',
  sub_maximo= '$submax',
  sub_minimo= '$submin',
  tipoFarmacia = '$tipofarmacia'
   where id_proveedor = $id_proveedor limit 1";
 $edita= mysqli_query($conexion2, $querY);  
  
  if( $edita != false){
    header("location: redirect-objetoContratacion?var=$nombre_proveedor2&&var2=$id_proveedor2&&contPed=$numeroContrato");
   
  }else{
     echo "<script>
              alert('Hubo un error inesperado, favor de volver a rellenar el fromulario.');
              window.history.back();</script>";
  }
}else{
  header('location: login.php');
}
$conexion2->close();
?>