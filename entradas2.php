<?php session_start();
    if(isset($_SESSION['externo'])){
        require 'frontend/entradaMedicamento.php';
    }else{
        header ('location: index.php');
    }
        
?>