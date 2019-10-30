<?php
    session_start();
    if(!(isset($_SESSION['id']))){
        header('Location: index.php');
    }
    if(!(isset($_GET['id']))){
        echo 'No paramaters url. Click <a href="admin_signin.php">here</a> to return on accounts page';
    }else{
        $bdd = new PDO('mysql:host=localhost;dbname=convoyManager;charset=utf8', 'root', '');
        $bdd->query("DELETE FROM users WHERE id=".$_GET['id']);

        header('Location: admin_signin.php');
    }
?>