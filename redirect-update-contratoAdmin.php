<?php session_start();
    if(isset($_SESSION['usuarioAdmin'])){
        require 'modelo/update-contrato-proveedor.php';
    
    }else{
        header ('location: index');
    }
        
?>