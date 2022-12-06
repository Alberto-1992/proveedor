<?php session_start();

if(isset($_SESSION['usuario'])) {

  if (isset ($_POST['editar'])){
    error_reporting(0);
  require 'conexion.php';
  $id_proveedor = $_POST['id_proveedor'];
  $proveedor = $_POST['nombre_proveedor'];
  $domicilio_proveedor = $_POST['domicilio_proveedor'];
  $rfc= $_POST['rfc_proveedor'];
  $telefono_proveedor = $_POST['telefono_proveedor'];
  $direccion_proveedor = $_POST['direccion_internet'];
  $email= $_POST['email_proveedor'];
  $numero_pedido = $_POST['numero_pedido'];
  $suf_presupuestaria = $_POST['suficiencia_presupuestaria'];
  $requisicion= $_POST['requisicion'];
  $partida_presupuestaria = $_POST['partida_presupuestaria'];
  $fecha_firma = $_POST['fecha_firma'];
  $fecha_inicio= $_POST['vigencia_pedido_inicio'];
  $fecha_termino = $_POST['vigencia_pedido_final'];
  $submin = $_POST['sub_min'];
  $submax = $_POST['sub_max'];
  $ivamin = $_POST['iva_min'];
  $ivamax = $_POST['iva_max'];
  $totalmin = $_POST['total_min'];
  $totalmax = $_POST['total_max'];
  $tipoadjudicacion = $_POST['tipoadjudicacion'];

  
  $querY = "UPDATE proveedores set nombre_proveedor= '$proveedor', domicilio_proveedor= '$domicilio_proveedor', 
  rfc_proveedor= '$rfc', 
  telefono_proveedor= '$telefono_proveedor', 
  direccion_internet= '$direccion_proveedor', 
  email_proveedor= '$email', 
  numero_pedido= '$numero_pedido', 
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
  tipoadjudicacion = '$tipoadjudicacion'
   where id_proveedor = $id_proveedor limit 1";
 $edita= mysqli_query($conexion2, $querY);  
  
  if( $edita != false){
  
   echo "<script>
              alert('Tus datos hasn sido enviados con exito.');
              history.back()</script>";
              
  }else{
     echo "<script>
              alert('Hubo un error inesperado, favor de volver a rellenar el fromulario.');
              </script>";
  }
}else{
  header('location: login.php');
}
}elseif(isset($_SESSION['usuarioFG'])) {

  if (isset ($_POST['editar'])){
    error_reporting(0);
  require 'conexion.php';
  $id_proveedor = $_POST['id_proveedor'];
  $proveedor = $_POST['nombre_proveedor'];
  $domicilio_proveedor = $_POST['domicilio_proveedor'];
  $rfc= $_POST['rfc_proveedor'];
  $telefono_proveedor = $_POST['telefono_proveedor'];
  $direccion_proveedor = $_POST['direccion_internet'];
  $email= $_POST['email_proveedor'];
  $numero_pedido = $_POST['numero_pedido'];
  $suf_presupuestaria = $_POST['suficiencia_presupuestaria'];
  $requisicion= $_POST['requisicion'];
  $partida_presupuestaria = $_POST['partida_presupuestaria'];
  $fecha_firma = $_POST['fecha_firma'];
  $fecha_inicio= $_POST['vigencia_pedido_inicio'];
  $fecha_termino = $_POST['vigencia_pedido_final'];
  $submin = $_POST['sub_min'];
  $submax = $_POST['sub_max'];
  $ivamin = $_POST['iva_min'];
  $ivamax = $_POST['iva_max'];
  $totalmin = $_POST['total_min'];
  $totalmax = $_POST['total_max'];
  $tipoadjudicacion = $_POST['tipoadjudicacion'];

  
  $querY = "UPDATE proveedores set nombre_proveedor= '$proveedor', domicilio_proveedor= '$domicilio_proveedor', 
  rfc_proveedor= '$rfc', 
  telefono_proveedor= '$telefono_proveedor', 
  direccion_internet= '$direccion_proveedor', 
  email_proveedor= '$email', 
  numero_pedido= '$numero_pedido', 
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
  tipoadjudicacion = '$tipoadjudicacion'
   where id_proveedor = $id_proveedor limit 1";
 $edita= mysqli_query($conexion2, $querY);  
  
  if( $edita != false){
  
   echo "<script>
              alert('Tus datos hasn sido enviados con exito.');
              history.back()</script>";
              
  }else{
     echo "<script>
              alert('Hubo un error inesperado, favor de volver a rellenar el fromulario.');
              </script>";
  }
}else{
  header('location: login.php');
}
}
$conexion2->close();
?>