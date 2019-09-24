<?php
    session_start();
    if(isset($_SESSION["login"])){
        session_destroy();
        header('LOCATION: ./home.php');
    }
    if(isset($_COOKIE["login"])){
        setcookie("login", "", time()-3600);
        header('LOCATION: ./home.php');
    }
?>