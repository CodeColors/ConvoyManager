<?php
    session_start();
    require('db.php');
    if(!(isset($_SESSION['id']))){
        header('Location: index.php');
    }
    if(!(isset($_GET['id']))){
        echo 'No paramaters url. Click <a href="admin_signin.php">here</a> to return on accounts page';
    }else{
        $bdd->query("DELETE FROM users WHERE id=".$_GET['id']);

        header('Location: admin_signin.php');
    }
?>