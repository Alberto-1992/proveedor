<?php session_start();
    if(isset($_SESSION['usuario'])) {
        require 'frontend/ver-lista-proveedores.php';
        
    }elseif(isset($_SESSION['usuarioAdmin'])) {
        require 'frontend/ver-lista-proveedores.php';
        }else{
        header('location: login.php');
    }


?>