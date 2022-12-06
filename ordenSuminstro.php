<?php session_start();

    if(isset($_SESSION['usuario'])) {
                          
    $valor= base64_decode($_GET['Xy']);
       $contrato= base64_decode($_GET['tr']);
        require 'conexion.php';
            $sql = "SELECT datosproveedor.datoPersonalProveedor,
            datosproveedor.domicilioPersonal,
            datosproveedor.telefono,
            datosproveedor.correoElectronico,
            datosproveedor.rfc,
            datosproveedor.direccionInternet,
            proveedores.id_proveedor,
            proveedores.numero_pedido,
            proveedores.numero_proveedor,
            proveedores.numero_procedimiento,
            proveedores.suficiencia_presupuestaria,
            proveedores.requisicion, 
            proveedores.partida_presupuestaria,
            proveedores.fecha_firma,
            proveedores.vigencia_pedido_inicio, 
            proveedores.vigencia_pedido_final,
            proveedores.sub_minimo,
            proveedores.sub_maximo,
            proveedores.iva_minimo,
            proveedores.iva_maximo,
            proveedores.total_minimo,
            proveedores.total_maximo
             from proveedores inner join datosproveedor on datosproveedor.id_datoProveedor = proveedores.numero_proveedor and proveedores.id_proveedor = $valor";
            $result=mysqli_query($conexion2, $sql);
            $row=mysqli_fetch_assoc($result);
        
                require 'frontend/datosProveedorOrden.php';
        
    }elseif(isset($_SESSION['usuarioAdmin'])) {
        $valor= base64_decode($_GET['Xy']);
       $contrato= base64_decode($_GET['tr']);
        require 'conexion.php';
            $sql = "SELECT datosproveedor.datoPersonalProveedor,
            datosproveedor.domicilioPersonal,
            datosproveedor.telefono,
            datosproveedor.correoElectronico,
            datosproveedor.rfc,
            datosproveedor.direccionInternet,
            proveedores.id_proveedor,
            proveedores.numero_pedido,
            proveedores.numero_proveedor,
            proveedores.numero_procedimiento,
            proveedores.suficiencia_presupuestaria,
            proveedores.requisicion, 
            proveedores.partida_presupuestaria,
            proveedores.fecha_firma,
            proveedores.vigencia_pedido_inicio, 
            proveedores.vigencia_pedido_final,
            proveedores.sub_minimo,
            proveedores.sub_maximo,
            proveedores.iva_minimo,
            proveedores.iva_maximo,
            proveedores.total_minimo,
            proveedores.total_maximo
             from proveedores inner join datosproveedor on datosproveedor.id_datoProveedor = proveedores.numero_proveedor and proveedores.id_proveedor = $valor";
            $result=mysqli_query($conexion2, $sql);
            $row=mysqli_fetch_assoc($result);
        
                require 'frontend/datosProveedorOrden.php';
    }else{
                 header('location: login.php');
    }

?>