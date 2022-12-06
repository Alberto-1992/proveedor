<?php session_start();
    if(isset($_SESSION['usuario'])) {
        require 'frontend/medicamentos.php';
        
    }elseif(isset($_SESSION['usuarioAdmin'])) {
        require 'frontend/medicamentosGeneral.php';
    
    }else{
        header('location: login');
    }


?>