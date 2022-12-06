<?php session_start();
    if(isset($_SESSION['usuario'])) {
        require 'frontend/controlMedicamento.php';
        
    }else{
        header('location: login.php');
    }


?>
