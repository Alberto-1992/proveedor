<?php session_start();
    if(isset($_SESSION['usuario'])){
        require 'frontend/objetoDeContratacion.php';
    }elseif(isset($_SESSION['usuarioFG'])){
        require 'frontend/objetoDeContratacionFG.php';
    }elseif(isset($_SESSION['usuarioAdmin'])){
        require 'frontend/objetoDeContratacion.php';
    }else{
        header ('location: index.php');
    }
        
?>