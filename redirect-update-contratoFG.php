<?php session_start();
    if(isset($_SESSION['usuarioFG'])){
        require 'modelo/update-contrato-proveedorFG.php';
    
    }else{
        header ('location: index');
    }
        
?>