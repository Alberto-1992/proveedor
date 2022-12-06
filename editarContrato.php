<?php session_start();

        if(isset($_SESSION['usuario'])) {
            
            error_reporting(0);

        $clave = base64_decode($_GET['Xy']);

        require 'conexion.php';
        $sql = "SELECT id_proveedor,
        nombre_proveedor,
        domicilio_proveedor,
        rfc_proveedor,
        telefono_proveedor, 
        direccion_internet, 
        email_proveedor,
        numero_pedido, 
        suficiencia_presupuestaria,
        requisicion, 
        partida_presupuestaria,
        fecha_firma,
        vigencia_pedido_inicio, 
        vigencia_pedido_final,
        sub_minimo,
        sub_maximo,
        iva_minimo,
        iva_maximo,
        total_minimo,
        total_maximo, tipoadjudicacion from proveedores where id_proveedor = $clave";
        $result=mysqli_query($conexion2, $sql);
        $row=mysqli_fetch_assoc($result);
if($row['id_proveedor'] != false){
            require 'frontend/editarContrato.php';
            
        }else{
            echo "<script>
            alert('Error insesperado intente nuevamente');
            window.history.back();</script>";
         
        }
        
    }elseif(isset($_SESSION['modifica_externo'])){
     

    $clave = base64_decode($_GET['clave']);

    require 'conexion.php';
    $sql = "SELECT id_proveedor,
    nombre_proveedor,
    domicilio_proveedor,
    rfc_proveedor,
    telefono_proveedor, 
    direccion_internet, 
    email_proveedor,
    numero_pedido, 
    suficiencia_presupuestaria,
    requisicion, 
    partida_presupuestaria,
    fecha_firma,
    vigencia_pedido_inicio, 
    vigencia_pedido_final,
    sub_minimo,
    sub_maximo,
    iva_minimo,
    iva_maximo,
    total_minimo,
    total_maximo from proveedores where id_proveedor = $clave";
    $result=mysqli_query($conexion2, $sql);
    $row=mysqli_fetch_assoc($result);
    
   if($row['id_proveedor'] != false){
            require 'frontend/editarContrato.php';
            
        }else{
            echo "<script>
            alert('Error insesperado intente nuevamente');
            window.history.back();</script>";
         
        }
    
    
}elseif(isset($_SESSION['usuarioAdmin'])){
     

    $clave = base64_decode($_GET['Xy']);

    require 'conexion.php';
    $sql = "SELECT id_proveedor,
    nombre_proveedor,
    domicilio_proveedor,
    rfc_proveedor,
    telefono_proveedor, 
    direccion_internet, 
    email_proveedor,
    numero_pedido, 
    suficiencia_presupuestaria,
    requisicion, 
    partida_presupuestaria,
    fecha_firma,
    vigencia_pedido_inicio, 
    vigencia_pedido_final,
    sub_minimo,
    sub_maximo,
    iva_minimo,
    iva_maximo,
    total_minimo,
    total_maximo from proveedores where id_proveedor = $clave";
    $result=mysqli_query($conexion2, $sql);
    $row=mysqli_fetch_assoc($result);
if($row['id_proveedor'] != false){
            require 'frontend/editarContrato.php';
            
        }else{
            echo "<script>
            alert('Error insesperado intente nuevamente');
            window.history.back();</script>";
         
        }
        
}
?>