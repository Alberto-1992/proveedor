<?php session_start();
    if(isset($_SESSION['rh'])) {
        header('location: moduloRh.php'); 
        
    }else{
        header('location: login.php');
    }


?>