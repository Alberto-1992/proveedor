<?php session_start();
    if(isset($_SESSION['controlados'])) {
        header('location: controlados'); 
        
    }else{
        header('location: login');
    }


?>