<?php session_start();
    if(isset($_SESSION['usuario'])){
        
        require 'frontend/verListaMedicamento.php';
    }else{
        header ('location: index.php');
    }
        
?>