<?php session_start();
    if(isset($_SESSION['usuario'])) {
        require 'Folios.php';
        
    }else{
        header('location: login.php');
    }


?>