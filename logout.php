<?php
    session_start();
    if(!(isset($_SESSION['id']))){
        header('Location: index.php');
    }
    
    $_SESSION = array();
    session_destroy();
    header('Location: index.php');
?>