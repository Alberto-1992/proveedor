<?php session_start();
    if(isset($_SESSION['usuario'])){

        require 'frontend/entradasBodega.php';
    }else{
        header ('location: index.php');
    }
     
?>