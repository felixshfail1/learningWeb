<?php 
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('Location: /FelixNoiseuxCom/administration/index.php');
        exit;
    }
    
?>