<?php session_start();
    if(isset($_SESSION['usuario'])){
        require 'frontend/entradaMedicamento.php';
    }else{
        header ('location: index.php');
    }
        
?>