<?php session_start();
    if(isset($_SESSION['externo'])){
        require 'frontend/maximosCubiertos.php';
    }else{
        header ('location: index.php');
    }
        
?>