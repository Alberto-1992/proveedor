<?php session_start();
    if(isset($_SESSION['usuario'])) {
        require 'frontend/eliminaMedicamento.php';
        
    }elseif(isset($_SESSION['usuarioFG'])){
        require 'frontend/eliminaMedicamento.php';
    }else{
        header('location: login.php');
    }


?>