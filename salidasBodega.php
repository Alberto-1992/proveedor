<?php session_start();
    if(isset($_SESSION['usuario'])){

        require 'frontend/salidasBodega.php';
    }else{
        header ('location: index.php');
    }
     
?>