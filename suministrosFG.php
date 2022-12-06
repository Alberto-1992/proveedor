<?php session_start();
    if(isset($_SESSION['usuarioFG'])) {
        require 'frontend/suministrosFG.php';
        
    }else{
        header('location: login');
    }


?>