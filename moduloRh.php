<?php session_start();
    if(isset($_SESSION['rh'])){
        require 'frontend/principalRh.php';
    }else{
        header ('location: index.php');
    }
        
?>