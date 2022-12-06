<?php session_start();
    if(isset($_SESSION['usuario'])){
        require 'modelo/update-contrato-proveedor.php';
    
    }else{
        header ('location: index');
    }
        
?>