<?php 

    session_start();
    
    if(!isset($_SESSION['idusuario']))
    {
        header("location: ../cadastro/index.php");
        exit;
    }
?>

BEEEEM VINDOOOO KARALHO!