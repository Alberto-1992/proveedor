<?php session_start();
    if(isset($_SESSION['externo'])){
        require 'frontend/minimosCubiertos.php';
    }else{
        header ('location: index.php');
    }
        
?>